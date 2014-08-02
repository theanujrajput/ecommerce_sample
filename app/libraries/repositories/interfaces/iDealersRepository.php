<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/8/14
 * Time: 1:01 PM
 */

interface iDealersRepository
{
    public function createDealer($name, $address1, $address2, $city, $state, $pincode, $mobile, $phone);

    public function getDealers($city, $state);

    public function getDealer($id);

    public function updateDealer($id, $name, $address1, $address2, $city, $state, $pincode, $mobile, $phone);

    public function deleteDealers($id = array());

    public function getUniqueStates();

    public function getCitiesForState($state);

    public function getData($city, $state, $is_small_appliance, $is_large_appliance);
} 