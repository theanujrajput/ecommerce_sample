<?php

class DashboardProductAttributesController extends BaseController
{


    function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function getIndex($product_id)
    {
        try {

            $values_array = array();
            $product = $this->productService->getProductBasicInfo($product_id, null, null, null);
            $category_id = $product->category_id;

            $attributes = $this->categoryService->getCategoryAttributes($category_id, null, null, null);

            $values = $this->productService->getProductAttributesValue($product_id);
            if (isset($values['attribute_info'])) {
                foreach ($values['attribute_info'] as $row) {
                    $data = array(
                        "value" => $row['value'],
                        "notes" => $row['notes'],
                    );
                    $values_array[$row['id']] = $data;
                }
            } else {
                $values_array = null;
            }

            $data['active'] = 'attributes';
            $data['product'] = $product;
            $data['attributes'] = $attributes;
            $data['values_array'] = $values_array;
            return View::make('dashboard.productattributes.index', $data);

        } catch (Exception $ex) {
            Log::error($ex);
            echo "Product not found";
        }
    }


    public function postCreate($product_id)
    {
        $input_array = Input::all();
        $product = $this->productService->getProductBasicInfo($product_id, null, null, null);
        $category_id = $product->category_id;
        $attributes = $this->categoryService->getCategoryAttributes($category_id, null, null, null);

        $data = array();
        $attributes_id_array = array();

        foreach ($attributes as $key => $value) {

            $attribute_id = $value['id'];
            $custom_id = "id_$attribute_id";

            if (isset($input_array[$custom_id]) && trim($input_array[$custom_id]) != '') {

                $attribute_value = $input_array[$custom_id];
                $attributes_id_array[] = $value['id'];
                $notes = $input_array['notes_' . $attribute_id];
                $data[] = array(
                    'value' => trim($attribute_value),
                    'notes' => trim($notes)
                );
            }
        }

        $this->productService->createOrUpdateAttributes($product_id, $attributes_id_array, $data);
        return Redirect::to("dashboard/product-attributes/$product_id");

    }


    public function destroy($id)
    {
        //
    }

}
