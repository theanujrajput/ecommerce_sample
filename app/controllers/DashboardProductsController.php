<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/12/14
 * Time: 3:14 PM
 */
class DashboardProductsController extends BaseController
{

    function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }


    public function getIndex()
    {
        try {

            $data['products'] = $this->productService->getProducts(null, null, null, null, null, null, null, Constants::DASHBOARD_PRODUCTS_PAGE_COUNT);
            return View::make('dashboard.products.index', $data);

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getCreate()
    {
        $data['products'] = $this->productService->getProducts(null, null, null, null, null, null, null, null);
        $data['categories'] = $this->categoryService->getCategories(1, null, null, null, null);
        return View::make('dashboard.products.create', $data);
    }


    public function postCreate()
    {
        try {

            $validation = new \services\Validators\ProductValidator();
            if ($validation->passes()) {

                $name = Input::get('name');
                $code = Input::get('code');
                $shortcode = Input::get('shortcode');
                $description = Input::get('description');
                $description_secondary = Input::get('description_secondary');
                $category_id = Input::get('category');
//                $base_product_id = Input::get('base_product');
//                $base_product_id = $base_product_id == 0 ? null : $base_product_id;
                $base_product_id = null;
                $active = Input::get('active');
                $is_delivered = Input::get('delivered');
                $is_ltw = Input::get('ltw');
                $is_cod = Input::get('cod');
                $warranty = Input::get('warranty');
                $list_price = Input::get('list_price');
                $offer_price = Input::get('offer_price');
                $weight = Input::get('weight');
                $sequence = Input::get('sequence');
//                $base_diff_text = Input::get('base_diff_text', '');
                $base_diff_text = '';
                $popularity = Input::get('popularity');
                $meta_title = Input::get('meta_title');
                $meta_description = Input::get('meta_description');
                $meta_keywords = Input::get('meta_keywords');

                if ($sequence == 'after') {
                    $sequence = Input::get('after');
                }

                $sequence = AppUtil::getSequence($sequence);

                $this->productService->createProduct($name, $code, $shortcode, $description, $description_secondary,
                    $category_id, $base_product_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty, $list_price
                    , $offer_price, $weight, $sequence, $base_diff_text, $popularity, $meta_title, $meta_description, $meta_keywords);


                Notification::sucess('Product has been created successfully');
                return Redirect::to('dashboard/products');

            } else {

                $error = $validation->getErrors();
                return Redirect::to('dashboard/products/create')->withInput(Input::all())->withErrors($error);
            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    public function getEdit($id)
    {
        $data['active'] = 'product_info';

        $product = $this->productService->getProduct($id, null, null, null);
        $category = $this->productService->getProductImmediateCategory($product->id);

        $data['product'] = $product;
        $data['categories'] = $this->categoryService->getCategories(null, null, null, null, null);
        $data['sequence'] = $this->productService->getProductPosition($id);
        $data['products'] = $this->productService->getProducts(null, null, null, null, null, null, null, null);
        $data['base_products'] = $this->productService->getProducts($category->category_id, Constants::NULL_VALUE, null, null, null, null, null, null);
        return View::make('dashboard.products.edit', $data);
    }


    public function postEdit($id)
    {
        try {

            $product = $this->productService->getProductBasicInfo($id, null, null, null);
            $saved_base_product_id = $product->base_product_id;

            $validation = new \services\Validators\ProductValidator();
            $validation::$rules['name'] .= ",$id";
            $validation::$rules['shortcode'] .= ",$id";
            $validation::$rules['code'] .= ",$id";

            //if the product is variant validate base_diff_text also
            if (isset($saved_base_product_id)) {
                $validation::$rules = array_merge($validation::$rules, array('base_diff_text' => 'required'));
            }

            if ($validation->passes()) {

                $name = Input::get('name');
                $code = Input::get('code');
                $shortcode = Input::get('shortcode');
                $description = Input::get('description');
                $description_secondary = Input::get('description_secondary');
                $category_id = Input::get('category');
                $base_product_id = Input::get('base_product', null);
                $active = Input::get('active');
                $is_delivered = Input::get('delivered');
                $is_ltw = Input::get('ltw');
                $is_cod = Input::get('cod');
                $warranty = Input::get('warranty');
                $list_price = Input::get('list_price');
                $offer_price = Input::get('offer_price');
                $weight = Input::get('weight');
                $sequence = Input::get('sequence');
                $base_diff_text = Input::get('base_diff_text', '');
                $popularity = Input::get('popularity');
                $meta_title = Input::get('meta_title');
                $meta_description = Input::get('meta_description');
                $meta_keywords = Input::get('meta_keywords');

                if ($sequence == 'after') {
                    $sequence = Input::get('after');
                }

                $sequence = AppUtil::getSequence($sequence);

                $this->productService->updateProduct($id, $name, $code, $shortcode, $description, $description_secondary,
                    $category_id, $base_product_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty, $list_price
                    , $offer_price, $weight, $sequence, $base_diff_text, $popularity, $meta_title, $meta_description, $meta_keywords);

                Notification::success('Product has been updated successfully');
                return Redirect::to('dashboard/products');

            } else {
                $error = $validation->getErrors();
                return Redirect::to("dashboard/products/edit/$id")->withInput(Input::all())->withErrors($error);
            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getActivateOrDeactivate($id, $status)
    {
        $this->productService->activateOrDeactivateProduct($id, $status);
        return Redirect::to('dashboard/products');
    }

    public function getProducts($category_id)
    {
        $products = $this->productService->getProducts($category_id, null, null, null, null, 1, null, null);
        return $products;
    }

} 