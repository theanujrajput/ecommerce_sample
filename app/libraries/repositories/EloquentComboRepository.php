<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/9/14
 * Time: 10:56 AM
 */
class EloquentComboRepository implements iComboRepository
{

    //todo:check whether combo_price of combo products table should also be saved
    public function createCombo($name, $description, $type, $start_date, $end_date, $combo_price, $combo_products_array = array())
    {
        try {

            DB::beginTransaction();

            $combo = new Combo();
            $combo->name = $name;
            $combo->description = $description;
            $combo->type = $type;
            $combo->start_date = $start_date;
            $combo->end_date = $end_date;
            $combo->combo_price = $combo_price;
            $combo->save();

            $combo_id = $combo->id;

            if (sizeof($combo_products_array) != 0) {
                foreach ($combo_products_array as $row) {

                    $product_id = $row['product_id'];
                    $price = $row['price'];
                    $combo->products()->attach($combo_id, array('product_id' => $product_id, 'combo_price' => $price));
                }
            }

            DB::commit();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** return all the combos
     * @param $paginate
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Pagination\Paginator|static[]
     * @throws Exception
     */
    public function getCombos($paginate)
    {
        try {

            $combo = Combo::with('products');

            if (!is_null($paginate) && $paginate == true) {
                return $combo->orderBy('created_at', 'DESC')->paginate(Constants::COMBOS_PAGE_COUNT);
            }

            return $combo->get();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** accepts combo by combo_id
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|static
     * @throws Exception
     */
    public function getCombo($id)
    {
        try {

            $combo = Combo::find($id);
            return $combo;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    /** updates the combo
     * @param int $id combo_id
     * @param string $name
     * @param string $description
     * @param string $type
     * @param $start_date
     * @param $end_date
     * @param int|float $combo_price
     * @throws Exception
     */
    public function updateCombo($id, $name, $description, $type, $start_date, $end_date, $combo_price)
    {

        try {

            $combo = Combo::find($id);
            $combo->name = $name;
            $combo->description = $description;
            $combo->type = $type;
            $combo->start_date = $start_date;
            $combo->end_date = $end_date;
            $combo->combo_price = $combo_price;
            $combo->save();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /** accepts the combo_id and deletes the combo
     * @param int $id
     * @throws Exception
     */
    public function deleteCombo($id)
    {
        try {

            Combo::find($id)->delete();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    /** add a product in the existing combo
     * @param int $combo_id
     * @param int $product_id
     * @param int|float $combo_price
     */
    public function createComboProduct($combo_id, $product_id, $combo_price)
    {
        $combo = new ComboProduct();
        $combo->combo_id = $combo_id;
        $combo->product_id = $product_id;
        $combo->combo_price = $combo_price;
        $combo->save();

    }


    /** accepts the combo id and return the corresponding products
     * @param int $combo_id
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     * @throws Exception
     */
    public function getComboProducts($combo_id)
    {
        try {

            return Combo::with('products')->where('id', '=', $combo_id)->first();
//            return ComboProduct::where('combo_id', '=', $combo_id)->orderBy('created_at', 'DESC')->get();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    public function getComboProduct($combo_id, $product_id)
    {

        try {

            return ComboProduct::where('combo_id', '=', $combo_id)->where('product_id', '=', $product_id)->first();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /** return the combos by product_id
     * @param int $product_id
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     * @throws Exception
     */
    public function getCombosIdByProductId($product_id)
    {
        try {

            return ComboProduct::where('product_id', '=', $product_id)->get(array('combo_id'));

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** update the product info of combo
     * @param int $combo_id
     * @param int $product_id
     * @param int $combo_price
     * @throws Exception
     */
    public function updateComboProduct($combo_id, $product_id, $combo_price)
    {
        try {

            ComboProduct::where('combo_id', '=', $combo_id)
                ->where('product_id', '=', $product_id)->update(array('combo_price' => $combo_price));

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    /** deletes the product combo relation
     * @param int $combo_id
     * @param int $product_id
     * @throws Exception
     */
    public function deleteComboProduct($combo_id, $product_id)
    {
        try {
            $combo = Combo::find($combo_id);
            $combo->products()->detach($product_id);
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


}