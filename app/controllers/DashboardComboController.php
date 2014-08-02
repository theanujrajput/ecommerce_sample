<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/28/14
 * Time: 5:02 PM
 */
class DashboardComboController extends BaseController
{

    function __construct(ProductService $productService, ComboService $comboService)
    {
        $this->productService = $productService;
        $this->comboService = $comboService;
    }

    public function getIndex()
    {
        $data['combos'] = $this->comboService->getCombosBasicInfo(Constants::COMBOS_PAGE_COUNT);
        return View::make('dashboard.combos.index', $data);
    }

    public function getAjaxProducts()
    {
        return $this->productService->getProducts(null, null, null, null, null, 1, null, null);
    }

    public function getCreate()
    {
        $data['products'] = $this->productService->getProducts(null, null, null, null, null, 1, null, null);
        return View::make('dashboard.combos.create', $data);
    }

    public function postCreate()
    {

        $combo_products_array = array();
        $data = Input::all();
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'combo_price' => 'required|numeric'
        );

        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {

            $name = Input::get('name');
            $description = Input::get('description');
            $type = Input::get('type');
            $combo_price = Input::get('combo_price');
            $start_date = Input::get('start_date');
            $end_date = Input::get('end_date');
            $product = Input::get('product');
            $price = Input::get('price');

            function filter($value)
            {
                if (trim($value) == '') {
                    return false;
                } else {
                    return $value;
                }
            }


            $filtered_products = array_filter($product, 'filter');

            foreach ($filtered_products as $i => $row) {

                if (isset($price[$i]) && trim($price[$i]) != '' && is_numeric($price[$i])) {
                    $combo_products_array[] = array(
                        'price' => $price[$i],
                        'product_id' => $row
                    );
                } else {
                    continue;
                }

            }

            $this->comboService->createCombo($name, $description, $type, $start_date, $end_date,
                $combo_price, $combo_products_array);

            Notification::success('Combo has been created successfully');
            return Redirect::to('dashboard/combo');

        } else {

            return Redirect::to('dashboard/combo/create')->withErrors($validator)->withInput();

        }

    }

    public function getEdit($combo_id)
    {
        $data['combo'] = $this->comboService->getCombo($combo_id);
        return View::make('dashboard.combos.edit', $data);
    }

    public function postEdit($combo_id)
    {
        $data = Input::all();
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'combo_price' => 'required|numeric'
        );

        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {

            $name = Input::get('name');
            $description = Input::get('description');
            $type = Input::get('type');
            $combo_price = Input::get('combo_price');
            $start_date = Input::get('start_date');
            $end_date = Input::get('end_date');

            $this->comboService->updateCombo($combo_id, $name, $description, $type, $start_date, $end_date, $combo_price);
            Notification::success('Combo has been updated successfully');
            return Redirect::to("dashboard/combo/edit/$combo_id");

        } else {
            return Redirect::to("dashboard/combo/edit/$combo_id")->withErrors($validator)->withInput();
        }
    }

    public function getDelete($combo_id)
    {
        $this->comboService->deleteCombo($combo_id);
    }
}