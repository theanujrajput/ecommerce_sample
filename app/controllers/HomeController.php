<?php

class HomeController extends BaseController
{

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    function __construct(CategoryService $categoryService, ProductService $productService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;

    }


    public function getIndex()
    {
        //get latest offers
        $data['latest_offers'] = $this->productService->getProductsByTag("latest_offers",6);
        //get featured products
        $data['featured_products'] = $this->productService->getProductsByTag("featured_products",4);

        return View::make('frontoffice.home', $data);
    }
}