<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/14/14
 * Time: 1:04 PM
 */
interface iCartRepository
{

    public function addItem($item_type, $item_id, $user_id, $qty, $price);

    public function getCartContents($user_id);

    public function getItem($item_type, $item_id, $user_id);

    public function updateCart($item_type, $item_id, $user_id, $qty, $price);

    public function removeItem($item_type, $item_id, $user_id);

    public function getTotalPrice($user_id);

    public function getTotalItems($user_id);


}