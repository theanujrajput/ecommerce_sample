<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 3/19/14
 * Time: 7:45 PM
 */
class DashboardComboProductsController extends BaseController
{

    function __construct(ProductService $productService, ComboService $comboService)
    {
        $this->productService = $productService;
        $this->comboService = $comboService;
    }

    public function getIndex($combo_id)
    {
        $data['products'] = $this->productService->getProducts(null, null, null, null, null, 1, null, null);
        $data['combo'] = $this->comboService->getComboProducts($combo_id);
        return View::make('dashboard.comboproducts.index', $data);
    }

    public function getDelete($combo_id, $product_id)
    {
        $this->comboService->deleteComboProduct($combo_id, $product_id);
        return Redirect::to("dashboard/combo-products/$combo_id");
    }

    public function postAddComboProduct($combo_id)
    {
        $product_id = Input::get('product_id');
        $price = Input::get('price');
        $combo = $this->comboService->getComboProduct($combo_id, $product_id);
        if ($combo) {
            $this->comboService->updateComboProduct($combo_id, $product_id, $price);
        } else {
            $this->comboService->createComboProduct($combo_id, $product_id, $price);
        }
        return Redirect::to("dashboard/combo-products/$combo_id");
    }
}