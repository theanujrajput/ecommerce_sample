<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 3/31/14
 * Time: 5:27 PM
 */
class DashboardProductSpecificAttributes extends BaseController
{

    function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getIndex($product_id)
    {
        try {

            $data['active'] = 'specific_attributes';
            $data['product'] = $this->productService->getProductBasicInfo($product_id, null, null, null);
//            $data['specific_attributes'] = $this->productService->getProductSpecificAttributes($product_id);
            return View::make('dashboard.productspecificattributes.index', $data);

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getCreate($product_id)
    {
        try {

            $data['active'] = 'specific_attributes';
            $data['product'] = $this->productService->getProductBasicInfo($product_id, null, null, null);
            return View::make('dashboard.productspecificattributes.create', $data);

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function postCreate($product_id)
    {
        try {

            $data = Input::all();
            $rules = array(
                'name' => 'required',
                'value' => 'required'
            );

            $validator = Validator::make($data, $rules);
            if ($validator->passes()) {

                $name = Input::get('name');
                $value = Input::get('value');
                $notes = Input::get('notes');
                $this->productService->createProductSpecificAttribute($product_id, $name, $value, $notes);
                Notification::success('Product specific attribute has been created successfully.');
                return Redirect::to("dashboard/product-specific-attributes/$product_id");
            } else {

                return Redirect::to("dashboard/product-specific-attributes/create/$product_id")->withErrors($validator)->withInput($rules);

            }


        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getEdit($specific_attribute_id)
    {
        try {

            $data['active'] = 'specific_attributes';
            $specific_attribute = $this->productService->getProductSpecificAttribute($specific_attribute_id);
            $data['product'] = $this->productService->getProduct($specific_attribute->product_id, null, null, null);
            $data['specific_attribute'] = $specific_attribute;
            return View::make('dashboard.productspecificattributes.edit', $data);

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function postEdit($specific_attribute_id)
    {
        try {

            $product_specific_attribute = $this->productService->getProductSpecificAttribute($specific_attribute_id);
            $product_id = $product_specific_attribute->product_id;

            $data = Input::all();
            $rules = array(
                'name' => 'required',
                'value' => 'required'
            );

            $validator = Validator::make($data, $rules);
            if ($validator->passes()) {

                $name = Input::get('name');
                $value = Input::get('value');
                $notes = Input::get('notes');

                $this->productService->updateProductSpecificAttribute($specific_attribute_id, $name, $value, $notes);


                Notification::success('Product specific attribute has been created successfully.');
                return Redirect::to("dashboard/product-specific-attributes/$product_id");
            } else {

                return Redirect::to("dashboard/product-specific-attributes/edit/$product_id")->withErrors($validator)->withInput($rules);

            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getDelete($specific_attribute_id)
    {
        try {


            $product_specific_attribute = $this->productService->getProductSpecificAttribute($specific_attribute_id);
            $product_id = $product_specific_attribute->product_id;
            $this->productService->deleteProductSpecificAttribute($specific_attribute_id);
            return Redirect::to("dashboard/product-specific-attributes/$product_id");

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }
} 