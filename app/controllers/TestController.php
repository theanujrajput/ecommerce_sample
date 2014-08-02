<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 12/30/13
 * Time: 4:30 PM
 */
class TestController extends BaseController
{
    function __construct(ProductService $productRepo, CategoryService $categoryService,
                         UserService $userService, EloquentComboRepository $comboRepo,
                         EloquentTagRepository $tagRepo, EloquentImageRepository $imageRepo, CartService $cartService)
    {
        $this->productRepo = $productRepo;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
        $this->comboRepo = $comboRepo;
        $this->tagRepo = $tagRepo;
        $this->imageRepo = $imageRepo;
        $this->cartService = $cartService;

    }

    function getAttribute()
    {
        $result = Attribute::where('name', '<=', 'size')->get();
        $productRepo = new EloquentProductRepository();

    }

    function getCategoryAttributes()
    {
        //$result = $this->categoryService->getCategoryAttributesWithValues(1,null,null,null);
        //$result = $this->categoryService->getCategoryAttributes(1, null, null, null);
        //$result= $this->categoryService->getCategoryParent(3);
        $this->categoryService->deleteCategoryVideo(1, array(1, 2));
        //dd($result);
    }

    function getCompare()
    {
//        $result = $this->productRepo->compare(array(1, 2, 3));
//        dd($result);
//        $result = $this->productRepo->getProductTopCategory(9);
//        dd($result);
        Session::flush();
        $session = [1, 2, 3];
        foreach ($session as $row) {

        }
        $result = Session::get('id');
        dd($result);
//        Session::flush();


    }


    function getProduct()
    {
        $data['tree'] = $this->categoryService->getCategoryTreeHtml();
        //$this->categoryService->getCategoryFilters($)
//        $results = $this->productRepo->getProducts(1, null, null, null, null, null, null, 10);
        //$result = $this->productRepo->getProductTopCategory(2);
        //$product = new EloquentProductRepository();
        //$result = $product->getProducts(1, null, null, null, null, null, null, null);
        //$result = $this->productRepo->getProduct(3, null, null, null);
        return View::make('test', $data);
    }

    function getProductAttributes()
    {

        //$this->productRepo->createProductAttributes(1, 2, 50, "weight is 50kg");
        $this->productRepo->createOrUpdateProductAttributes(2, 2, 90);
        //$this->productRepo->deleteProductAttribute(2, array(1));
//        $result = $this->productRepo->getProductAttributesValue(2);
//        dd($result);
    }

    function getGenerateHash()
    {
        $file1 = public_path("video.mkv");
        $file2 = public_path("testsong2.mp3");
        $hash1 = AppUtil::generateDocumentHash($file1);
        $hash2 = AppUtil::generateDocumentHash($file2);

        var_dump($hash1);
        var_dump($hash2);

    }

    public function getPrimaryImage()
    {
//        $result = AppUtil::getProductPrimaryImage(1);
//        dd(($result));
        //$this->productRepo->setProductPrimaryImage(1, 2);

    }

    public function getProductDocuments()
    {
        // $result = $this->productRepo->getProductDocuments(1);
        $result = $this->productRepo->getProductDocument(1, 1);
        return $result;
    }

    public function getProductTag()
    {

    }

    public function getDeleteDocument()
    {
        $this->productRepo->deleteProductDocument(1, 1);
    }


    public function getUserRole()
    {
        $result = $this->userService->getUserRole(1);
        dd($result);
    }

    public function getLoggedInUser()
    {
        $result = AppUtil::getUserEmail();
        dd($result);
    }

    public function getRelatedProducts()
    {
        $result = $this->productRepo->getRelatedProducts(1);
        dd($result);
    }

    public function getFilters()
    {
        $final_array = [];
        $array = array(
            'size' => 123,
        );
        $results = $this->productRepo->getFilteredProducts($array, null, 3, null, null);
        dd($results);
        if (!is_null($results)) {
            foreach ($results as $i => $row) {
                if ($row->images->count() != 0) {
                    $image_path = $row->images[0]->path;
                } else {
                    $image_path = "";
                }

                if ($row->combos->count() != 0) {
                    $combo = "true";
                } else {
                    $combo = 'false';
                }

                $data = array(
                    'name' => $row->name,
                    'image' => $image_path,
                    'combo' => $combo
                );
                $final_array[$i] = $data;
            }

            dd($final_array);

        } else {
            return null;
        }

    }


    //return products after filtering
    public function getFilteredProducts()
    {
        $array = array(
            'size' => 123,
            'air_flow' => 200,
        );

        $category_id = 1;

        $price = array('min' => 10, 'max' => 100);

        $array_size = sizeof($array);

        $result = ProductAttribute::join("products", 'productattributes.product_id', '=', 'products.id', 'left')
            ->join("attributes", 'productattributes.attribute_id', '=', 'attributes.id', 'left')
            ->where(function ($query) use ($array) {

                foreach ($array as $key => $value) {

                    $query->orwhere(function ($inner) use ($key, $value) {

                        $inner->where("attributes.name", '=', $key)->where("productattributes.value", '=', $value);
                    });
                }
            })
            ->groupBy("product_id")->havingRaw("COUNT(product_id)=$array_size")
            ->where(function ($query) use ($price) {

                if (sizeof($price) != 0) {
                    $query->where('list_price', '>=', $price['min'])->where('list_price', '<=', $price['max']);
                }

            })->where('products.category_id', '=', $category_id)->get();


        dd($result);
        //dd(DB::getQueryLog());
        foreach ($result as $row) {

            var_dump($row);
        }
    }


    public function getCreateCombo()
    {
        $product_id = array(1, 2);
        $this->comboRepo->createCombo("mixer", "this combo has mixer", "cool offer", "2013-02-05", "2013-02-20", 10, $product_id);
    }

    public function getProductCombos()
    {
        $result = $this->productRepo->getProductCombos(1);
        dd($result);
    }

    public function getTag()
    {
        $productrepo = new EloquentProductRepository();
        //$productrepo->createProductTag('bad offer', "BAD", "this is bad offer", '10', 2);
        //$productrepo->updateProductTag(1, 4, 'cool offer', 'COOL', 'this is cool offer', '200');
        //$productrepo->deleteProductTag(array(7));
    }

    public function getSequence()
    {

//        $this->productRepo->createProduct("grinder", "GRIND895", "GRID", "this is grinder", 'grinder secondary desc', 1, null,
//            true, true, true, true, 1, 200, 150, 50, 20, 'it grinds',5);

        $sequence = AppUtil::getSequence(50);

        //dd($sequence);
        $this->productRepo->updateProduct(2, "chimney_beauty", "qwerty", "CHM987", "this is test chimeny 2",
            'secondary description', 2, 2, true, true, true, true, 1, 500, 10, 100, $sequence, 'this chimney is beautiful', 2);

    }

    public function postUploadImage()
    {

        $image = Input::file("image");
        $name = Input::get('name');
        $title = Input::get('title');
        $caption = Input::get('caption');
        $notes = Input::get('notes');
        $is_primary = true;


        $ext = $image->getClientOriginalExtension();
        $file_name = $name . "." . $ext;
        $path = public_path("uploads/products/img/org/");

        $image->move($path, $file_name);

        $product = new EloquentProductRepository();
        $result = $product->createProductImage($path, $name, $title, $caption, $notes, $is_primary, 1);

        $image_path = public_path("uploads/products/img/org/$file_name");
        $image_id = $result->id;
        AppUtil::resizeImage($image_path, $image_id);


    }

    public function getImage()
    {
        $result = AppUtil::getProductPrimaryImage(1);
        dd($result);
//        $productrepo = new EloquentProductRepository();
//        $productrepo->createProductImage("fake_path1", "prodcut name 1", "product title 1",
//            "product caption 1", "this is notes", true, 1);
//
//        $productrepo->createProductImage("fake_path2", "prodcut name 2", "product title 2",
//            "product caption 1", "this is notes", true, 2);
    }

    public function getCategoryDocuments()
    {
        //$this->categoryService->getCategoryDocuments(1, null);
        $this->categoryService->createCategoryDocuments('pdf', 'fakepath', 1, null, 'test_label', 'custom name', 'title', 'tyest notes', 1);
    }

    public function getCart()
    {
//        echo Hash::make("asdf1234");
//        $this->cartService->destroy();
//        $this->cartService->addProduct(1, 2, 53.69);
//        $this->cartService->addcombo(2, 4, 20.56);

        //       $this->cartService->destroy();

        //    Cart::add(array('id' => 'combo_1', 'name' => 'combo 1', 'qty' => 1, 'price' => 9.99));
//        $this->cartService->addProduct(1, 3);
//        $this->cartService->addProduct(2, 2);
//         $this->cartService->updateProduct(7, 3);

        var_dump($this->cartService->getCartContents());
        //       echo $this->cartService->getCartItemsHtml();
//        $this->cartService->addCombo(2, 2);
//        $row_id = Cart::search(array("id" => 'product_1'));
//        var_dump($row_id);
        //$content = Cart::content();
        //var_dump($content);
        //var_dump(Cart::count(false));
        //dd(Cart::total());
        //Session::set('name', "test");
        //Session::save();
        //echo Session::get("name");

        //$data = array('one', 'toe', 'threee');
        // Event::fire('order.success', array('data'=>$data));

    }

    public function postValidation()
    {
        $validation = new \services\Validators\ProductValidator();
        if ($validation->passes()) {
            echo "success";
        } else {
            dd($validation->getErrors());
        }
    }

    public function getDealer()
    {
        $dealer = new EloquentDealersRepository();
        $result = $dealer->getDealers(null, null);
        dd(AppUtil::returnResults($result));
    }

    public function getTree()
    {
        $result = $this->getCategoryTree();
        dd($result);
        //return View::make('test');
    }

    public function getImages()
    {
        for ($i = 1; $i <= 7; $i++) {
            $image = new Image();
            $image->path = "http://placehold.it/300x300";
            $image->save();
        }
    }

    public function getHtml()
    {
        $tree = $this->getCategoryTreeHtml();
        echo $tree;
    }

    /** returns the formatted html of the category tree
     * @return string
     */
    public function getCategoryTreeHtml()
    {

        $tree = "";

        $array = $this->categoryService->getCategoryTree();
        foreach ($array as $i => $row) {

            $tree = $tree . '<li> <i class="fa-li fa fa-arrow-circle-o-right"> </i>' . $row['name'];
            if (isset($row['children'])) {
                $tree = $this->buildChildHtml($row['children'], $tree);
            }
            $tree = $tree . '</li>';

        }

        $data['tree'] = $tree;
        return View::make('test', $data);

    }


    private function buildChildHtml($category, $tree)
    {
        $tree = $tree . '<ul class=fa-ul>';
        foreach ($category as $i => $row) {

            $tree = $tree . '<li class="hide child"> <i class="fa-li fa fa-arrow-circle-o-right"> </i>' . $row['name'];
            if (isset($row['children'])) {
                $tree = $this->buildChildHtml($row['children'], $tree);
            }
            $tree = $tree . '</li>';
        }
        $tree = $tree . '</ul>';
        return $tree;
    }


    public function getTest()
    {
        $result = $this->productRepo->getProductsFilterHtml(array(1, 2));
        echo $result;
        exit;


        $filter_array = array();
        $attribute_value = array();
        $price = array();

        $attributes = $this->productRepo->getProductsFilter(array(1, 2));
        $min_price_product = Product::whereIn('id', array(1, 2))->min('list_price');
        $max_price_product = Product::whereIn('id', array(1, 8))->max('list_price');

        $price_range = $this->getPriceRange($min_price_product, $max_price_product);

        if (!is_null($attributes)) {
            foreach ($attributes as $attribute) {
                if ($attribute->products->count() != 0) {

                    $products = $attribute->products;
                    $attribute_id = $attribute->id;
                    $attribute_name = $attribute->name;
                    foreach ($products as $product) {
                        $attribute_value[] = trim($product->pivot->value);
                        $price[] = $product->list_price;
                    }
                    $data = array('id' => $attribute_id, 'values' => array_unique($attribute_value));
                    $filter_array[$attribute_name] = $data;
                    $attribute_value = array();
                }
            }
        } else {
            $filter_array = null;
        }

        dd(array_merge($filter_array, $price_range));
    }

    public function getLatestOffers()
    {
        $limit = null;
        $query = Product::query();
        $query->select(DB::raw('*, `list_price` - `offer_price` as remaining'))
            ->having('remaining', '>=', 100)->orderBy('created_at', "DESC");

        if (!is_null($limit)) {
            return $query->limit($limit);
        } else {
            $results = $query->get();
            $image = $results[1]->images;

            dd($image);
        }

    }

    private function getPriceRange($min_price_product, $max_price_product)
    {
        $price_range = array();
        $remainder = floor($min_price_product) % 10;
        $min_price_product = $min_price_product - $remainder;

        $range = Constants::PRICE_RANGE;

        for ($i = $min_price_product; $i < $max_price_product; $i = $i + $range) {

            $max = $min_price_product + $range;
            $price_range['price']['id'] = 0;
            $price_range['price']['values'][] = (int)$min_price_product . '-' . (int)$max;
            $min_price_product = $max;
        }
        return $price_range;
    }

    public function getSession()
    {

    }

    public function content()
    {
        $items = Cart::content();
        return $items;
    }

    public function getProductAncestors($id)
    {
//        $result = $this->productRepo->getProductAncestors($id);
//        Log::error("test");
//        dd($result);
    }


}
