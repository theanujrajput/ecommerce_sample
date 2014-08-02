<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/28/14
 * Time: 5:33 PM
 */
class AdminController extends BaseController
{

    function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getLogin()
    {
        return View::make('admin.login');
    }

    public function postLogin()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        $credentials = array('email' => $email, 'password' => $password);

        if (Auth::attempt($credentials)) {
            return Redirect::intended('dashboard');
        } else {
            Notification::error("The Email or Password you have entered is invalid");
            return Redirect::to('admin/login');
        }
    }

    public function getLogOut()
    {
        Auth::logout();
        return Redirect::to('admin/login');
    }

    public function getChangePassword()
    {
        return View::make('admin.changepassword');
    }


    public function getForgotPassword()
    {
        return View::make('admin.forgotpassword');
    }

    public function postForgotPassword()
    {

    }


} 