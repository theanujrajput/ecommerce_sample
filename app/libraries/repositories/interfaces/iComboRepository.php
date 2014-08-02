<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/9/14
 * Time: 10:56 AM
 */
interface iComboRepository
{

    public function createCombo($name, $description, $type, $start_date, $end_date, $combo_price, $combo_products_array = array());

    public function getCombos($paginate);

    public function getCombo($id);


    public function updateCombo($id, $name, $description, $type, $start_date, $end_date, $combo_price);

    public function deleteCombo($id);


    public function createComboProduct($combo_id, $product_id, $combo_price);

    public function getComboProducts($combo_id);

    public function getComboProduct($combo_id, $product_id);

    public function getCombosIdByProductId($product_id);

    public function updateComboProduct($combo_id, $product_id, $combo_price);

    public function deleteComboProduct($combo_id, $product_id);


}