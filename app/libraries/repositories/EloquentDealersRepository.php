<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/8/14
 * Time: 1:03 PM
 */

class EloquentDealersRepository implements iDealersRepository
{

    /**
     * @param $name
     * @param $address1
     * @param $address2
     * @param $city
     * @param $state
     * @param $pincode
     * @param $mobile
     * @param $phone
     * @return Dealer
     * @throws Exception
     */
    public function createDealer($name, $address1, $address2, $city, $state, $pincode, $mobile, $phone)
    {
        try {

            $dealer = new Dealer();
            $dealer->name = $name;
            $dealer->address1 = $address1;
            $dealer->address2 = $address2;
            $dealer->city = $city;
            $dealer->state = $state;
            $dealer->pincode = $pincode;
            $dealer->mobile = $mobile;
            $dealer->phone = $phone;
            $dealer->save();

            return $dealer;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /**
     * @param $city
     * @param $state
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @throws Exception
     */
    public function getDealers($city, $state)
    {
        try {

            $query = Dealer::query();
            if (DbUtil::checkDbNotNullValue($city)) {
                $query->where('city', '=', $city);
            } elseif (DbUtil::checkDbNullValue($city)) {
                $query->whereNull('city');
            }

            if (DbUtil::checkDbNotNullValue($state)) {
                $query->where('state', '=', $state);
            } elseif (DbUtil::checkDbNullValue($state)) {
                $query->whereNull('state');
            }

            return $query->get();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|mixed|static[]
     * @throws Exception
     */
    public function getDealer($id)
    {

        try {

            return Dealer::where('id', '=', $id)->get();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /**
     * @param $id
     * @param $name
     * @param $address1
     * @param $address2
     * @param $city
     * @param $state
     * @param $pincode
     * @param $mobile
     * @param $phone
     * @throws Exception
     */
    public function updateDealer($id, $name, $address1, $address2, $city, $state, $pincode, $mobile, $phone)
    {
        try {

            $dealer = Dealer::find($id);
            $dealer->name = $name;
            $dealer->address1 = $address1;
            $dealer->address2 = $address2;
            $dealer->city = $city;
            $dealer->state = $state;
            $dealer->pincode = $pincode;
            $dealer->mobile = $mobile;
            $dealer->phone = $phone;
            $dealer->save();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function deleteDealers($id = array())
    {
        Dealer::whereIn("id", $id)->delete();
    }

    public function getUniqueStates()
    {
        try {

            return Dealer::distinct("state")->get();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function getCitiesForState($state)
    {
        try {

            return Dealer::where("state", '=', $state)->get();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function getData($city, $state, $is_small_appliance, $is_large_appliance)
    {

        try {

            $query = Dealer::query();
            if (isset($city)) {
                $query->where("city", '=', $city);
            }
            if (isset($state)) {
                $query->where("state", '=', $state);
            }
            if ($is_small_appliance == true && $is_large_appliance == true) {
                $query->where("is_small_appliance", '=', true)
                    ->where("is_large_appliance", '=', true);
            } elseif ($is_small_appliance == true && $is_large_appliance == false) {
                $query->where("is_small_appliance", '=', true)
                    ->where("is_large_appliance", '=', false);
            } elseif ($is_small_appliance == false && $is_large_appliance == true) {
                $query->where("is_small_appliance", '=', false)
                    ->where("is_large_appliance", '=', true);
            }
            return $query->get();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }


    }

} 