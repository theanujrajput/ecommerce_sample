<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/13/14
 * Time: 12:21 PM
 */
class UserController extends BaseController
{
    function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->beforeFilter('auth_user',
            array('except' => array('getLogin', 'postLogin', 'getRegister', 'postRegister', 'getForgotPassword', 'postForgotPassword', 'getLogout')));
    }

    public function getLogin()
    {
        if (AppUtil::isUserLoggedIn()) {
            return Redirect::to('/user/address');
        }
        return View::make('frontoffice.user.login');
    }

    public function postLogin()
    {
        $data = Input::all();
        $rules = array(
            'email' => 'required|email',
            'password' => 'required'
        );

        $validation = Validator::make($data, $rules);
        if ($validation->passes()) {
            $email = Input::get('email');
            $password = Input::get('password');

            $credentials = array('email' => $email, 'password' => $password);
            if (Auth::attempt($credentials)) {
                $user_id = Auth::user()->id;
                return Redirect::to("user/address/");
            } else {
                Notification::error("The Email or Password you have entered is incorrect");
                return Redirect::to('user/login');
            }

        } else {
            return Redirect::to('user/login')->withErrors($validation);
        }

    }

    public function getRegister()
    {
        if (AppUtil::isUserLoggedIn()) {
            return Redirect::to('/user/address');
        }
        try {
            $data['register_email'] = Input::get('register_email');
            if (isset($data['register_email'])) {
                $rules = array(
                    'register_email' => 'required|email|unique:users,email',
                );
                $validation = Validator::make($data, $rules);
                if ($validation->passes()) {
                    $data['email'] = Input::get('register_email');
                    return View::make('frontoffice.user.register', $data);
                } else {
                    return Redirect::to('user/login')->withErrors($validation)->withInput();
                }

            } else {
                return View::make('frontoffice.user.register', $data);
            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function postRegister()
    {
        try {
            $data = Input::all();
            $rules = array(
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'confirm_password' => 'required'
            );

            $validation = Validator::make($data, $rules);
            if ($validation->passes()) {
                $first_name = Input::get('first_name');
                $last_name = Input::get('last_name');
                $email = Input::get('email');
                $password = Hash::make(Input::get('password'));
                $newsletters = Input::get('newsletters', 0);
                $special_offers = Input::get('special_offers', 0);
                $user = $this->userService->createUser($first_name, $last_name, $email, $password, $newsletters, $special_offers);
                $user_id = $user->id;

                Event::fire('user.register', array('user_id', $user_id)); //fires user registration success event

                Auth::loginUsingId($user_id);
                return Redirect::to("user/address/");

            } else {
                return Redirect::to('user/register')->withInput($data)->withErrors($validation);
            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function getAddress()
    {
        try {

            $user_id = AppUtil::getCurrentUserId();

            //todo:check whether user will have multiple addresses or single, in the address view currently the address is retrieved by using [0]

            $user = $this->userService->getUser($user_id, null, null);
            if (!$user) {
                return Redirect::to("user/login");
            }
            $data['user'] = $user;
            return View::make("frontoffice.user.address", $data);

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function postAddress()
    {
        try {

            $user_id = AppUtil::getCurrentUserId();
            $data = Input::all();
            $rules = array(
                'first_name' => 'required',
                'last_name' => 'required',
                'address_line1' => 'required',
                'state' => 'required',
                'city' => 'required',
                'pincode' => 'required|numeric',
                'mobile' => 'required|numeric',
                'landline' => 'digits|numeric'
            );

            $validation = Validator::make($data, $rules);
            if ($validation->passes()) {

                $first_name = Input::get('first_name');
                $last_name = Input::get('last_name');
                $address_line1 = Input::get('address_line1');
                $address_line2 = Input::get('address_line2');
                $state = Input::get('state');
                $city = Input::get('city');
                $landmark = Input::get('landmark');
                $pincode = Input::get('pincode');
                $landline = Input::get('landline');
                $mobile = Input::get('mobile');

                //check whether the pincode is valid
                $existing_pincode = $this->userService->getCityAndStateByPincode($pincode);
                if (!isset($existing_pincode)) {
                    $validation->getMessageBag()->add('pincode', 'Delivery not available in this area.');
                    return Redirect::to("user/address/")->withErrors($validation);
                }

                if ($this->userService->isUserAddressExist($user_id)) {
                    $this->userService->updateUser($user_id, $first_name, $last_name, $pincode, $address_line1, $address_line2, $landmark, $city, $state, $landline, $mobile);
                    return Redirect::to('order');
                } else {
                    $this->userService->addUserAddress($user_id, $address_line1, $address_line2, $state, $city, $landmark,
                        $pincode, $first_name, $last_name, $landline, $mobile);
                    return Redirect::to('order');
                }

            } else {
                return Redirect::to("user/address/")->withErrors($validation);
            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }


    /** accepts pincode and returns the corresponding city and state
     * @param int $pincode
     * @return null
     */
    public function getAjaxCityAndState($pincode)
    {
        return $this->userService->getCityAndStateByPincode($pincode);
    }

    public function getChangePassword()
    {

    }

    public function postChangePassword($id)
    {
        try {
            $data = Input::all();
            $rules = array(
                'old_password' => 'required',
                'new_password' => 'required'
            );


            $validation = Validator::make($data, $rules);
            if ($validation->passes()) {

                $old_password = Input::get('old_password');
                $new_password = Input::get('new_password');

                $user = $this->userService->getUser($id, null, null);

                if ($user) {

                    $saved_password = $user->password;
                    if ($saved_password == $old_password) {

                        $new_password = Hash::make($new_password);
                        $this->userService->changePassword($id, null, $new_password);
                        Auth::logout();
                        Notification::success('responsemessages.change_password_success');
                        return Redirect::to("user/login");

                    } else {
                        Notification::error(Lang::get('responsemessages.change_password_error'));
                        return Redirect::to('user/change-password');
                    }
                } else {

                    //todo:send proper message to view here
                }

            } else {
                return Redirect::to('user/change-password')->withErrors($validation);
            }
        } catch (Exception $ex) {
            Log::error($ex);
        }
    }

    public function getForgotPassword()
    {
        return View::make('frontoffice.user.forgotpassword');
    }

    public function postForgotPassword()
    {
        $data = Input::all();
        $rules = array(
            'email' => 'required|email'
        );

        $validation = Validator::make($data, $rules);
        if ($validation->passes()) {

            $email = Input::get("email");
            $user = $this->userService->getUser(null, $email, null);

            if ($user) {

                $user_id = $user->id;
                $new_password = str_random(8);
                $new_password = Hash::make($new_password);
                //fires forgot password event
                Event::fire('user.forgot_password', array('password' => $new_password, 'email' => $email, 'user_id' => $user_id));
                Notification::success(Lang::get('responsemessages.new_password_email_sent'));
                return Redirect::to('user/login');

            } else {

                Notification::error(Lang::get('responsemessages.reset_password_error'));
                return Redirect::to("user/forgot-password");
            }


        } else {
            return Redirect::to('user/forgot-password')->withErrors($validation);
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

}