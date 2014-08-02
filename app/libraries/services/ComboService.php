<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/14/14
 * Time: 5:25 PM
 */
class ComboService
{

    function __construct(iComboRepository $comboRepo)
    {
        $this->comboRepo = $comboRepo;
    }

    /**
     * @param string $name
     * @param string $description
     * @param string $type
     * @param $start_date
     * @param $end_date
     * @param int|float $combo_price
     * @param array $combo_products_array contains product_id and combo_price
     */
    public function createCombo($name, $description, $type, $start_date, $end_date, $combo_price, $combo_products_array = array())
    {
        $this->comboRepo->createCombo($name, $description, $type, $start_date, $end_date, $combo_price, $combo_products_array);
    }

    public function getCombo($id)
    {
        $combo = $this->comboRepo->getCombo($id);
        return isset($combo) ? $combo : null;
    }


    /** returns all the combos
     * @param $paginate
     * @return array|null
     */
    public function getCombos($paginate)
    {
        $combo_array = array();
        $combos = $this->comboRepo->getCombos($paginate);

        if ($combos->count() != 0) {
            foreach ($combos as $i => $combo) {

                $combo_data = array(
                    'name' => $combo->name,
                    'description' => $combo->description,
                    'type' => $combo->type,
                    'start_date' => $combo->start_date,
                    'end_date' => $combo->end_date,
                    'combo_price' => $combo->combo_price
                );
                $combo_array['combo_info'][$i] = $combo_data;

                if ($combo->products->count() != 0) {

                    foreach ($combo->products as $j => $product) {

                        $product_data = array(
                            'name' => $product->name,
                            'code' => $product->code,
                            'description' => $product->description,
                            'description_Secondary' => $product->description_Secondary,
                            'list_price' => $product->list_price,
                            'offer_price' => $product->offer_price
                        );
                        $combo_array['products'][$j] = $product_data;

                    }

                } else {
                    $combo_array['products'] = null;
                }
            }
            return $combo_array;
        } else {
            return null;
        }

    }

    public function updateCombo($id, $name, $description, $type, $start_date, $end_date, $combo_price)
    {
        $this->comboRepo->updateCombo($id, $name, $description, $type, $start_date, $end_date, $combo_price);
    }

    public function getCombosBasicInfo($paginate)
    {
        $combos = $this->comboRepo->getCombos($paginate);
        return AppUtil::returnResults($combos);
    }

    public function deleteCombo($id)
    {
        $this->comboRepo->deleteCombo($id);
    }

    public function createComboProduct($combo_id, $product_id, $combo_price)
    {
        $this->comboRepo->createComboProduct($combo_id, $product_id, $combo_price);
    }

    public function getComboProducts($combo_id)
    {
        $result = $this->comboRepo->getComboProducts($combo_id);
        return AppUtil::returnResults($result);
    }

    public function getComboProduct($combo_id, $product_id)
    {
        $result = $this->comboRepo->getComboProduct($combo_id, $product_id);
        return isset($result) ? $result : null;
    }

    public function updateComboProduct($combo_id, $product_id, $combo_price)
    {
        $this->comboRepo->updateComboProduct($combo_id, $product_id, $combo_price);
    }

    public function deleteComboProduct($combo_id, $product_id)
    {
        $this->comboRepo->deleteComboProduct($combo_id, $product_id);
    }


}