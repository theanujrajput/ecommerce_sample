<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 3/26/14
 * Time: 1:16 PM
 */
class DashboardVariantController extends BaseController
{
    function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function getCreate($product_id)
    {
        $data['active'] = 'product_info';
        $data['product'] = $this->productService->getProduct($product_id, null, null, null);
        $data['categories'] = $this->categoryService->getCategories(null, null, null, null, null);
//        $data['sequence'] = $this->productService->getProductPosition($id);
        $data['products'] = $this->productService->getProducts(null, null, null, null, null, null, null, null);
        return View::make('dashboard.variant.index', $data);

    }

    public function postCreate($product_id)
    {
        try {

            $validation = new \services\Validators\ProductValidator();
            $validation::$rules['category'] = '';
            $validation::$rules['base_diff_text'] = 'required'; //base diff text is compulsory while creating variant

            if ($validation->passes()) {

                $name = Input::get('name');
                $code = Input::get('code');
                $shortcode = Input::get('shortcode');
                $description = Input::get('description');
                $description_secondary = Input::get('description_secondary');
                $active = Input::get('active');
                $is_delivered = Input::get('delivered');
                $is_ltw = Input::get('ltw');
                $is_cod = Input::get('cod');
                $warranty = Input::get('warranty');
                $list_price = Input::get('list_price');
                $offer_price = Input::get('offer_price');
                $weight = Input::get('weight');
                $sequence = Input::get('sequence');
                $base_product_id = $product_id; //base product id is same as the product
                $base_diff_text = Input::get('base_diff_text');
                $popularity = Input::get('popularity');
                $meta_title = Input::get('meta_title');
                $meta_description = Input::get('meta_description');
                $meta_keywords = Input::get('meta_keywords');

                $sequence = AppUtil::getSequence($sequence);

                $product = $this->productService->getProductBasicInfo($product_id, null, null, null);
                $category_id = $product->category_id;


                $variant_product = $this->productService->createProduct($name, $code, $shortcode, $description, $description_secondary,
                    $category_id, $base_product_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty, $list_price
                    , $offer_price, $weight, $sequence, $base_diff_text, $popularity, $meta_title, $meta_description, $meta_keywords);

                $variant_product_id = $variant_product->id;
                Notification::success("Variant has been created successfully");
                return Redirect::to("dashboard/products/edit/$variant_product_id")->with(array('variant_product_id' => $variant_product_id, 'product_id' => $product_id));

            } else {

                $error = $validation->getErrors();
                return Redirect::to("dashboard/variant/$product_id")->withInput()->withErrors($error);
            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    public function store()
    {
        //
    }


} 