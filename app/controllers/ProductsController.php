<?php

class ProductsController extends BaseController
{

    function __construct(ProductService $productService, CategoryService $categoryService, CartService $cartService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->cartService = $cartService;
    }

    public function getIndex($category, $product)
    {
        try {

            $product_id = explode('-', $product);
            $product_id = $product_id[1];
            $data['product'] = $this->productService->getProduct($product_id, null, null, null);
            $data['related_products'] = $this->productService->getRelatedProducts($product_id);
            $data['best_sellers'] = $this->productService->getProductsByTag("best_seller", 3);
            $data['combos'] = $this->productService->getProductCombos($product_id);
            $data['variants'] = $this->productService->getProductVariants($product_id);

            return View::make('frontoffice.product_info', $data);

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    // renders product comparison page
    public function getCompare()
    {
        try {
            $input = Input::all();
            if (isset($input['id'])) {
                $ids = explode(',', $input['id']);

                if (sizeof($ids) > 3) {
                    return Redirect::to('/');
                }
                //todo:check whether ancestors should be taken or just the above parent
                $data['categories'] = $this->productService->getProductAncestors($ids[0]);
                $data['products'] = $this->productService->compare($ids);
                return View::make('frontoffice.compare', $data);
            }
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function getAjaxProducts($category_id)
    {
        return $this->productService->getProducts($category_id, null, null, null, null, 1, null, null);
    }

    // remove product from product comparison page
    public function getRemoveCompareId()
    {
        try {

            $ids = explode(',', Input::get('id'));
            $remove_id = Input::get('remove');

            $ids = array_diff($ids, array($remove_id));
            $ids = implode(',', $ids);

            return Redirect::to("product/compare?id=$ids");


        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    //  returns the compare bar html
    public function getCompareBar($id)
    {
        try {

            if (!$this->isProductComparable($id)) {
                return "false";
            } else {
                Session::push('id', $id);
                $data = $this->productService->getCompareBarHtml();
                return $data;
            }
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    //    removes item from comparison list
    public function getRemoveItem($id)
    {
        $product_ids = Session::get('id');
        $key = array_search($id, $product_ids);
        unset($product_ids[$key]);
        Session::forget('id');

        if (sizeof($product_ids) != 0) {
            foreach ($product_ids as $row) {
                Session::push('id', $row);
            }
        }
    }


    public function getRemoveAllItems()
    {
        Session::forget('id');
    }

    /** check the product with currently existing product whether they are comparable
     * @param int $id product_id
     * @return bool
     */
    private function isProductComparable($id)
    {
        $existing_id = Session::get('id', null);
        if (!is_null($existing_id)) {

            //$existing_product = $this->productService->getProductTopCategory($existing_id[0]);
            $existing_product = $this->productService->getProductBasicInfo($existing_id[0], null, null, null);
            $existing_product_parent = $existing_product->category_id;

            $new_product = $this->productService->getProductBasicInfo($id, null, null, null);
            $new_product_parent = $new_product->category_id;
            if ($existing_product_parent == $new_product_parent) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }

    }

    public function getCreateCompareBarHtml()
    {
        return $this->productService->getCompareBarHtml();
    }


}
