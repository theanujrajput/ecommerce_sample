<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/13/14
 * Time: 1:15 PM
 */
interface iUserRepository
{

    public function createUser($first_name, $last_name, $email, $password, $newsletters, $special_offers);

    public function addUserAddress($user_id, $line1, $line2, $state, $city, $landmark,
                                   $pincode, $first_name, $last_name, $landline, $mobile);

    public function getUserAddress($user_id);

    public function getUsers();

    public function getUser($id, $email, $phone);

    public function updateUser($id, $first_name, $last_name, $pincode, $address_line1, $address_line2, $landmark, $city, $state, $landline, $mobile);

    public function changePassword($id, $email, $password);

    public function forgotPassword($email, $password);

    public function getUserRole($id);

    public function getCityAndStateByPincode($pincode);

} 