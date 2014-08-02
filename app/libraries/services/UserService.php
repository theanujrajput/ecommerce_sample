<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/13/14
 * Time: 1:18 PM
 */
class UserService
{

    function __construct(iUserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param $password
     * @param bool $newsletters
     * @param bool $special_offers
     * @return mixed
     */
    public function createUser($first_name, $last_name, $email, $password, $newsletters, $special_offers)
    {
        return $this->userRepo->createUser($first_name, $last_name, $email, $password, $newsletters, $special_offers);

    }

    public function getUsers()
    {
        $users = $this->userRepo->getUsers();
        return AppUtil::returnResults($users);
    }

    /** returns user by user_id,email or phone
     * @param int $id user_id
     * @param string $email
     * @param string $phone
     * @return
     */
    public function getUser($id, $email, $phone)
    {
        $user = $this->userRepo->getUser($id, $email, $phone);
        return !is_null($user) ? $user : null;
    }

    /** add user address as well as updates users first_name,last_name,landline and mobile
     * @param $user_id
     * @param $line1
     * @param $line2
     * @param $state
     * @param $city
     * @param $landmark
     * @param $pincode
     * @param $first_name
     * @param $last_name
     * @param $landline
     * @param $mobile
     */
    public function addUserAddress($user_id, $line1, $line2, $state, $city, $landmark,
                                   $pincode, $first_name, $last_name, $landline, $mobile)
    {
        $this->userRepo->addUserAddress($user_id, $line1, $line2, $state, $city, $landmark,
            $pincode, $first_name, $last_name, $landline, $mobile);
    }


    public function isUserAddressExist($user_id)
    {
        $address = $this->userRepo->getUserAddress($user_id);
        return isset($address) && ($address->count() != 0) ? true : false;
    }


    public function updateUser($id, $first_name, $last_name, $pincode, $address_line1, $address_line2, $landmark, $city, $state, $landline, $mobile)
    {
        $this->userRepo->updateUser($id, $first_name, $last_name, $pincode, $address_line1, $address_line2, $landmark, $city, $state, $landline, $mobile);
    }

    /** change the password by email or by user_id
     * @param int $id user_id
     * @param string $email
     * @param string $password hashed password
     * @return mixed
     */
    public function changePassword($id, $email, $password)
    {
        return $this->userRepo->changePassword($id, $email, $password);
    }

    /**
     * @param string $email
     * @param string $password hashed password
     * @return mixed
     */
    public function forgotPassword($email, $password)
    {
        return $this->userRepo->forgotPassword($email, $password);
    }

    /** return the role of the user by user_id
     * @param $id
     */
    public function getUserRole($id)
    {
        return $this->userRepo->getUserRole($id);
    }


    /** accepts pincode and returns the city and state info
     * @param int $pincode
     * @return null
     */
    public function getCityAndStateByPincode($pincode)
    {
        $location_data = $this->userRepo->getCityAndStateByPincode($pincode);
        return AppUtil::returnResults($location_data);
    }
} 