<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/7/14
 * Time: 4:17 PM
 */

interface iOrderRepository
{

    public function createOrder($user_id, $net_value, $final_value, $order_notes, $order_items = array());

    public function getOrder($id);

    public function getOrders($user_id, $status, $payment_status, $paginate);

    public function deleteOrder($id);

} 