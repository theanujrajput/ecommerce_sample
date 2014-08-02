<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/27/14
 * Time: 12:00 PM
 */
class CategoryController extends BaseController
{
    public static $sort = null;
    public static $price_filter = null;

    function __construct(CategoryService $categoryService, ProductService $productService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    public function getIndex()
    {
        //return View::make('frontoffice.chimneys.designer_chimneys');
//        return View::make('frontoffice.chimneys.island_chimneys');
//        return View::make('frontoffice.chimneys.split_chimneys');
        //  return View::make('frontoffice.chimneys.straight_line_chimneys');
        // return View::make('frontoffice.built_in_series.microwave_oven');
        //return View::make('frontoffice.built_in_series.induction_hob');
        //return View::make('frontoffice.built_in_series.glass_hob');
//        return View::make('frontoffice.cooking_appliances.cooking_range');
        // return View::make('frontoffice.cooking_appliances.glass_and_induction_cooktops');
        // return View::make('frontoffice.cooking_appliances.platinum_cooktops');
        //return View::make('frontoffice.cooking_appliances.stainless_steel_cooktops');
        //return View::make('frontoffice.small_appliances.air_fryer');
//        return View::make('frontoffice.small_appliances.heaters');
        // return View::make('frontoffice.small_appliances.iron');
        // return View::make('frontoffice.kitchen_appliances.food_preparations.chopper_blender_and_grinder');
        // return View::make('frontoffice.kitchen_appliances.food_preparations.food_processors');
        // return View::make('frontoffice.kitchen_appliances.food_preparations.hand_mixer');
        //  return View::make('frontoffice.kitchen_appliances.food_preparations.juicer_mixer_grinder');
        //  return View::make('frontoffice.kitchen_appliances.food_preparations.mixer_grinders');
        // return View::make('frontoffice.kitchen_appliances.kettles_and_tea_maker');
//        return View::make('frontoffice.kitchen_appliances.oven_toaster_grillers');
//        return View::make('frontoffice.kitchen_appliances.cooking_appliances.bread_maker');
//        return View::make('frontoffice.kitchen_appliances.cooking_appliances.glass_grill');
//        return View::make('frontoffice.kitchen_appliances.cooking_appliances.induction_cookers');
//        return View::make('frontoffice.kitchen_appliances.cooking_appliances.rice_cookers');
//        return View::make('frontoffice.kitchen_appliances.cooking_appliances.sandwich_makers');
//        return View::make('frontoffice.kitchen_appliances.cooking_appliances.steam_cooker');
        return View::make('frontoffice.chimneys.designer_chimneys');
    }

    public function getTest()
    {
        try {

            $category_id = 27;
            $input = Input::all();
            $filter = array();
            $filter_param = array();
            $products_ids = array();

            if (sizeof($input) != 0 && isset($input['filter'])) { //if the url has filters
                if (isset($input['filter']) && $input['filter'] == 'true') {

                    //removing unnecessary variables
                    unset($input['filter']);
                    unset($input['page']);

                    foreach ($input as $key => $value) {
                        if ($key == 'sort' || $key == "price") {
                            continue;
                        }
                        $key = str_replace('_', ' ', $key);
                        $filter[$key] = $value;
                    }
                }
                $sort_by = isset($input['sort']) ? $input['sort'] : null;
                $price = isset($input['price']) ? $input['price'] : null;
                $products = $this->productService->getFilteredProducts($filter, $price, $category_id, $sort_by, null);
                $filter_param['sort'] = $sort_by;
                $filter_param['price'] = $price;
            } else {
                $products = $this->productService->getProducts($category_id, Constants::NULL_VALUE, null, null, null, 1, null, null);
            }

            if (!is_null($products)) {
                foreach ($products as $product) {
                    $products_ids[] = $product->id;
                }
            } else {
                $products = null;
            }

            //get the filters according to the products
            if (!is_null($products) && sizeof($products_ids) != 0) {
                $data['filters_html'] = $this->productService->getProductsFilterHtml($products_ids, $filter, $filter_param);
                $data['products'] = $products;
            } else {
                $data['filters_html'] = "";
                $data['products'] = null;
            }

            $data['sort'] = isset($filter_param['sort']) ? $filter_param['sort'] : null;

            //creation of filter for html
            $data['input'] = sizeof($input) != 0 ? $input : null;

            return View::make('frontoffice.chimneys.designer_chimneys', $data);
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    private function getFilteredProducts()
    {

    }
}