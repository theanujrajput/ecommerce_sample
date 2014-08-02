<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/7/14
 * Time: 4:16 PM
 */
class EloquentOrderRepository implements iOrderRepository
{


    /** accepts order_info and order_item array, creates a new order and add the order items in order_items table
     * @param int $user_id
     * @param int|float $net_value
     * @param int|float $final_value
     * @param string $order_notes
     * @param array $order_items ['product_id','product_type','offer_price','list_price','qty','item_notes']
     * @throws Exception
     * @return Order
     */
    public function createOrder($user_id, $net_value, $final_value, $order_notes, $order_items = array())
    {
        try {

            DB::beginTransaction();
            $order = new Order();
            $order->user_id = $user_id;
            $order->net_value = $net_value;
            $order->final_value = $final_value;
            $order->notes = $order_notes;
            $order->save();

            $order_id = $order->id;
            $item = new OrderItem();

            foreach ($order_items as $single_item) {
                $item->order_id = $order_id;
                $item->product_id = $single_item['product_id'];
                $item->product_type = $single_item['product_type'];
                $item->offer_price = $single_item['offer_price'];
                $item->list_price = $single_item['list_price'];
                $item->qty = $single_item['qty'];
                $item->notes = isset($single_item['item_notes']) ? $single_item['item_notes'] : null;
                $item->save();
            }

            DB::commit();
            return $order;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }


    }

    /** accept order_id and returns the order info
     * @param int $id order_id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getOrder($id)
    {
        $order = Order::with('items')->where('id', '=', $id)->first();
        return $order;
    }

    /**
     * @param int $user_id
     * @param string $status accepts new,open,closed
     * @param string $payment_status accepts paid,unpaid
     * @param int $paginate
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Pagination\Paginator|static[]
     * @throws Exception
     */
    public function getOrders($user_id, $status, $payment_status, $paginate)
    {
        try {
            $query = Order::with('items');
            if (DbUtil::checkDbNotNullValue($user_id)) {
                $query->where('user_id', '=', $user_id);
            } elseif (DbUtil::checkDbNullValue($user_id)) {
                $query->whereNull('user_id');
            }

            if (DbUtil::checkDbNotNullValue($status)) {
                $query->where('status', '=', $status);
            } elseif (DbUtil::checkDbNullValue($status)) {
                $query->whereNull('status');
            }

            if (DbUtil::checkDbNotNullValue($payment_status)) {
                $query->where('payment_status', '=', $payment_status);
            } elseif (DbUtil::checkDbNullValue($payment_status)) {
                $query->whereNull('payment_status');
            }

            if (!is_null($paginate)) {
                return $query->paginate($paginate);
            }

            return $query->get();
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /** deletes the order by order_id
     * @param int $id order_id
     */
    public function deleteOrder($id)
    {
        Order::find($id)->delete();
    }
}