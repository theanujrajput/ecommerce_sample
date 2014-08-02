<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/14/14
 * Time: 1:06 PM
 */
class EloquentCartRepository implements iCartRepository
{
    /**
     * @param string $item_type adds item is product or combo
     * @param int $item_id product_id or combo_id
     * @param int $user_id
     * @param int $qty
     * @param int|float $price
     * @throws Exception
     * @internal param float|int $subtotal
     * @return DbCart
     */
    public function addItem($item_type, $item_id, $user_id, $qty, $price)
    {

        try {

            DB::beginTransaction();
            $cart = new DbCart();
            $cart->item_type = $item_type;
            $cart->item_id = $item_id;
            $cart->user_id = $user_id;
            $cart->qty = $qty;
            $cart->price = $price;
            $cart->subtotal = $qty * $price;
            $cart->save();
            DB::commit();
            return $cart;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /** retrieves all cart content by user_id
     * @param int $user_id
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @throws Exception
     */
    public function getCartContents($user_id)
    {
        try {
            $query = DbCart::query();
            if (DbUtil::checkDbNotNullValue($user_id)) {
                $query->where('user_id', '=', $user_id);
            } else if (DbUtil::checkDbNullValue($user_id)) {
                $query->whereNull('user_id');
            }

            return $query->get();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }


    public function getItem($item_type, $item_id, $user_id)
    {
        try {

            $item = DbCart::where('item_type', '=', $item_type)->where('item_id', '=', $item_id)
                ->where('user_id', '=', $user_id)->first();
            return $item;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** updates the cart item
     * @param string $item_type
     * @param int $item_id
     * @param int $user_id
     * @param int $qty
     * @param int|float $price
     * @throws Exception
     */
    public function updateCart($item_type, $item_id, $user_id, $qty, $price)
    {
        try {

            DB::beginTransaction();
            $cart = DbCart::where('item_type', '=', $item_type)
                ->where('item_id', '=', $item_id)->where('user_id', '=', $user_id)->first();
            $cart->qty = $qty;
            $cart->subtotal = $qty * $price;
            $cart->save();
            DB::commit();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    public function removeItem($item_type, $item_id, $user_id)
    {

        try {

            DbCart::where('item_type', '=', $item_type)
                ->where('item_id', '=', $item_id)->where('user_id', '=', $user_id)->delete();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /** get the total cart price for corresponding user
     * @param int $user_id
     * @return mixed
     * @throws Exception
     */
    public function getTotalPrice($user_id)
    {
        try {

            return DbCart::where('user_id', '=', $user_id)->sum('subtotal');

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getTotalItems($user_id)
    {
        try {
            return DbCart::where('user_id', '=', $user_id)->count();
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }
} 