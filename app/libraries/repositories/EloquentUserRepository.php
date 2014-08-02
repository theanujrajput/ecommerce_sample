<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/13/14
 * Time: 1:15 PM
 */
class EloquentUserRepository implements iUserRepository
{
    /**
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param $password
     * @param bool $newsletters
     * @param bool $special_offers
     * @throws Exception
     * @return bool
     */
    public function createUser($first_name, $last_name, $email, $password, $newsletters, $special_offers)
    {

        try {

            $user = new User();
            $user->first_name = $first_name;
            $user->last_name = $last_name;
            $user->email = $email;
            $user->password = $password;
            $user->newsletters = $newsletters;
            $user->special_offers = $special_offers;
            $user->save();
            return $user;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }


    }

    /** add user address as well as updates users first_name,last_name,landline and mobile
     * @param int $user_id
     * @param string $line1 address line 1
     * @param string $line2 address line 2
     * @param string $state
     * @param string $city
     * @param string $landmark
     * @param int $pincode
     * @param string $first_name
     * @param string $last_name
     * @param int $landline
     * @param int $mobile
     * @throws Exception
     */
    public function addUserAddress($user_id, $line1, $line2, $state, $city, $landmark,
                                   $pincode, $first_name, $last_name, $landline, $mobile)
    {

        try {

            DB::beginTransaction();

            $address = new Address();
            $address->line1 = $line1;
            $address->line2 = $line2;
            $address->state = $state;
            $address->city = $city;
            $address->landmark = $landmark;
            $address->pincode = $pincode;
            $address->user_id = $user_id;
            $address->save();

            $user = User::find($user_id);
            $user->first_name = $first_name;
            $user->last_name = $last_name;
            $user->landline = $landline;
            $user->mobile = $mobile;
            $user->save();

            DB::commit();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function getUserAddress($user_id)
    {
        $result = Address::where('user_id', '=', $user_id)->get();
        return $result;
    }

    public function getUsers()
    {

    }

    /**
     * @param int $id user_id
     * @param string $email
     * @param int $phone
     * @return \Illuminate\Database\Eloquent\Model|null|static
     * @throws Exception
     */
    public function getUser($id, $email, $phone)
    {
        try {

            $query = User::with('addresses');
            if (DbUtil::checkDbNotNullValue($id)) {
                $query->where('id', '=', $id);
            } elseif (DbUtil::checkDbNullValue($id)) {
                $query->whereNull('id');
            }
            if (DbUtil::checkDbNotNullValue($email)) {
                $query->where('email', '=', $email);
            } elseif (DbUtil::checkDbNullValue($email)) {
                $query->whereNull('email');
            }
            if (DbUtil::checkDbNotNullValue($phone)) {
                $query->where('phone', '=', $phone);
            } elseif (DbUtil::checkDbNullValue($phone)) {
                $query->whereNull('phone');
            }

            return $query->first();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /**
     * @param $id
     * @param $first_name
     * @param $last_name
     * @param $pincode
     * @param $address_line1
     * @param $address_line2
     * @param $landmark
     * @param $city
     * @param $state
     * @param $landline
     * @param $mobile
     * @throws Exception
     */
    public function updateUser($id, $first_name, $last_name, $pincode, $address_line1, $address_line2, $landmark, $city, $state, $landline, $mobile)
    {
        try {

            DB::beginTransaction();

            $user = User::find($id);
            $user->first_name = $first_name;
            $user->last_name = $last_name;
            $user->landline = $landline;
            $user->mobile = $mobile;
            $user->save();

            $address = Address::where('user_id', '=', $id)->first();
            $address->pincode = $pincode;
            $address->line1 = $address_line1;
            $address->line2 = $address_line2;
            $address->landmark = $landmark;
            $address->city = $city;
            $address->state = $state;
            $address->save();

            DB::commit();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    /**
     * @param int $id
     * @param string $email
     * @param string $password hashed string
     * @return bool
     * @throws Exception
     */
    public function changePassword($id, $email, $password)
    {
        try {
            $query = User::query();
            if (DbUtil::checkDbNotNullValue($id)) {
                $query->where('id', '=', $id);
            } elseif (DbUtil::checkDbNullValue($id)) {
                $query->whereNull('id');
            }
            if (DbUtil::checkDbNotNullValue($email)) {
                $query->where('email', '=', $email);
            } elseif (DbUtil::checkDbNullValue($email)) {
                $query->whereNull('email');
            }

            $user = $query->first();

            if ($user->count() != 0) {
                $user->password = $password;
                $user->save();
                return true;

            } else {
                return false;
            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function forgotPassword($email, $password)
    {
        $user = User::where('email', '=', $email)->first();
        if ($user->count() != 0) {
            $user->password = $password;
            $user->save();
            return true;
        } else {
            return false;
        }
    }

    public function getUserRole($id)
    {
        $user = User::with("roles")->first();
        return $user;
    }


    public function getCityAndStateByPincode($pincode)
    {
        try {

            $location_data = Pincode::where('postal_code', '=', $pincode)->first();
            return $location_data;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

} 