<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function () {
    return Redirect::to('home');
});

//Route::get("{category}/{prouct_code}",function($category,$product_code){
//   //get by product code
//
//});
//Route::get("{category}-{product_code}-{product_id}", function () {
//    $request = Request::create('/', 'GET');
//    return Route::dispatch($request)->getContent();
//});

Route::get('category/test', "CategoryController@getTest");

Route::when('dashboard*', 'auth_admin');

Route::controller('test', "TestController");

Route::controller('dashboard/category', "DashboardCategoryController");
Route::controller("dashboard/products", "DashboardProductsController");
Route::controller("dashboard/tags", "DashboardTagsController");

Route::get("dashboard/category-documents/{category_id}", 'DashboardCategoryDocumentsController@getIndex');
Route::controller('dashboard/category-documents', "DashboardCategoryDocumentsController");

Route::get("dashboard/category-videos/{category_id}", 'DashboardCategoryVideosController@getIndex');
Route::controller('dashboard/category-videos', "DashboardCategoryVideosController");

Route::get("dashboard/category-attributes/{category_id}", 'DashboardCategoryAttributesController@getIndex');
Route::controller('dashboard/category-attributes', "DashboardCategoryAttributesController");

Route::get('dashboard/product-documents/{product_id}', "DashboardProductDocumentsController@getIndex");
Route::controller("dashboard/product-documents", "DashboardProductDocumentsController");

Route::get('dashboard/product-videos/{product_id}', "DashboardProductVideosController@getIndex");
Route::controller("dashboard/product-videos", "DashboardProductVideosController");

Route::get('dashboard/product-images/{product_id}', "DashboardProductImagesController@getIndex");
Route::controller("dashboard/product-images", "DashboardProductImagesController");

Route::get('dashboard/product-attributes/{product_id}', "DashboardProductAttributesController@getIndex");
Route::controller("dashboard/product-attributes", "DashboardProductAttributesController");

Route::get('dashboard/product-tags/{product_id}', "DashboardProductTagsController@getIndex");
Route::controller("dashboard/product-tags", "DashboardProductTagsController");

Route::get('dashboard/combo-products/{combo_id}', "DashboardComboProductsController@getIndex");
Route::controller("dashboard/combo-products", "DashboardComboProductsController");

Route::get('dashboard/variant/{product_id}', 'DashboardVariantController@getIndex');
Route::controller('dashboard/variant', 'DashboardVariantController');

Route::get('dashboard/product-specific-attributes/{product_id}', 'DashboardProductSpecificAttributes@getIndex');
Route::controller('dashboard/product-specific-attributes', 'DashboardProductSpecificAttributes');

Route::controller('dashboard/combo', 'DashboardComboController');


Route::controller("admin", "AdminController");
Route::controller('dashboard', 'DashboardController');


Route::controller('home', 'HomeController');
Route::controller('category', 'CategoryController');
Route::controller("cart", "CartController");
Route::controller("order", "OrderController");

//Route::get('/product/compare', 'ProductsController@getCompare');
//Route::get('/product/cart-items', 'ProductsController@getCartItems');
//Route::get('/product/remove-compare-id', 'ProductsController@getRemoveCompareId');

Route::pattern('product_id', '[0-9]+');
Route::get('/product/{product_id}', 'ProductsController@getIndex');
Route::controller('product', 'ProductsController');


Route::controller('user', 'UserController');

//route for inserting data
//Route::controller("insert", 'InsertController');


//route for building the link alongwith category name, product name and product id
Route::get("{category}/{product_code}", 'ProductsController@getIndex');

//bindings starts here
App::bind("iAttributeRepository", "EloquentAttributeRepository");
App::bind("iCategoryRepository", "EloquentCategoryRepository");
App::bind("iComboRepository", "EloquentComboRepository");
App::bind("iDealersRepository", "EloquentDealersRepository");
App::bind("iDocumentRepository", "EloquentDocumentRepository");
App::bind("iImageRepository", "EloquentImageRepository");
App::bind("iPageDataRepository", "EloquentPageDataRepository");
App::bind("iProductRepository", "EloquentProductRepository");
App::bind("iUserRepository", "EloquentUserRepository");
App::bind("iVideoRepository", "EloquentVideoRepository");
App::bind("iTagRepository", "EloquentTagRepository");
App::bind("iCartRepository", "EloquentCartRepository");


