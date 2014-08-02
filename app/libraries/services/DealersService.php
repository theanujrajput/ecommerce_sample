<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/8/14
 * Time: 1:04 PM
 */

class DealersService
{


    function __construct(iDealersRepository $dealersRepo)
    {
        $this->dealersRepo = $dealersRepo;
    }

    /** creates a new dealer
     * @param string $name
     * @param string $address1
     * @param string $address2
     * @param string $city
     * @param string $state
     * @param int $pincode
     * @param int $mobile
     * @param int $phone
     * @return mixed
     */
    public function createDealer($name, $address1, $address2, $city, $state, $pincode, $mobile, $phone)
    {
        $dealer = $this->dealersRepo->createDealer($name, $address1, $address2, $city, $state, $pincode, $mobile, $phone);
        return $dealer;
    }

    /**return dealers by city or state
     * @param string $city
     * @param string $state
     * @return null
     */
    public function getDealers($city, $state)
    {
        $dealers = $this->dealersRepo->getDealers($city, $state);
        return AppUtil::returnResults($dealers);
    }

    /** return a dealer by dealer id
     * @param int $id
     * @return null
     */
    public function getDealer($id)
    {
        $dealer = $this->dealersRepo->getDealer($id);
        return isset($dealer) ? $dealer : null;

    }

    /** updates a dealer info
     * @param int $id
     * @param string $name
     * @param string $address1
     * @param string $address2
     * @param string $city
     * @param string $state
     * @param int $pincode
     * @param int $mobile
     * @param int $phone
     */
    public function updateDealer($id, $name, $address1, $address2, $city, $state, $pincode, $mobile, $phone)
    {
        $this->dealersRepo->updateDealer($id, $name, $address1, $address2, $city, $state, $pincode, $mobile, $phone);
    }

    /** accept dealer id and deletes the dealers
     * @param array $id
     */
    public function deleteDealers($id = array())
    {
        $this->dealersRepo->deleteDealers($id);
    }

    /** returns all the unique states
     * @return mixed
     */
    public function getUniqueStates()
    {
        $states = $this->dealersRepo->getUniqueStates();
        return AppUtil::returnResults($states);
    }

    /** accepts the state name and return the cities for that corresponding state
     * @param string $state name of the state
     * @return mixed
     */
    public function getCitiesForState($state)
    {
        return $this->dealersRepo->getCitiesForState($state);
    }

    /** accepts city,state,is_small_appliance or is_large appliance and return all the dealers
     * @param string $city
     * @param string $state
     * @param bool $is_small_appliance
     * @param bool $is_large_appliance
     * @return mixed
     */
    public function getData($city, $state, $is_small_appliance, $is_large_appliance)
    {
        return $this->dealersRepo->getData($city, $state, $is_small_appliance, $is_large_appliance);
    }
} 