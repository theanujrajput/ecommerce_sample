<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/7/14
 * Time: 7:26 PM
 */
class OrderService
{

    function __construct(EloquentOrderRepository $orderRepo, EloquentProductRepository $productRepo)
    {
        $this->orderRepo = $orderRepo;
        $this->productRepo = $productRepo;
    }

    /** accepts order_info and order_item array, creates a new order and add the order items in order_items table
     * @param int $user_id
     * @param int|float $net_value
     * @param int|float $final_value
     * @param string $order_notes
     * @param array $order_items ['product_id','product_type','offer_price','list_price','qty','item_notes']
     * @throws Exception
     * @return order
     * @internal param string $status accepts new,open,closed
     * @internal param string $payment_status accepts paid,unpaid
     */
    public function createOrder($user_id, $net_value, $final_value, $order_notes, $order_items = array())
    {
        try {

            $order = $this->orderRepo->createOrder($user_id, $net_value, $final_value, $order_notes, $order_items);
            return isset($order) ? $order : false;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** accept order_id and returns the order info
     * @param int $id order_id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     * @throws Exception
     */
    public function getOrder($id)
    {
        try {

            $order = $this->orderRepo->getOrder($id);
            return isset($order) ? $order : null;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** return orders by user_id,status,payment_status
     * @param int $user_id
     * @param string $status accepts new,open,closed
     * @param string $payment_status accepts paid,unpaid
     * @param int $paginate
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Pagination\Paginator|null|static[]
     * @throws Exception
     */
    public function getOrders($user_id, $status, $payment_status, $paginate)
    {
        try {

            $orders = $this->orderRepo->getOrders($user_id, $status, $payment_status, $paginate);
            return AppUtil::returnResults($orders) ? $orders : null;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /**
     * @param int $id order_id
     */
    public function deleteOrder($id)
    {
        $this->orderRepo->deleteOrder($id);
    }

} 