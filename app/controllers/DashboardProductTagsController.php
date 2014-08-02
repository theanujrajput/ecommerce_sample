<?php

class DashboardProductTagsController extends BaseController
{

    function __construct(ProductService $productService, TagService $tagService)
    {
        $this->productService = $productService;
        $this->tagService = $tagService;
    }

    public function getIndex($product_id)
    {
        $data['active'] = 'tags';
        $data['product'] = $this->productService->getProduct($product_id, null, null, null);
        return View::make('dashboard.producttags.index', $data);
    }

    public function getCreate($product_id)
    {
        $data['active'] = 'tags';
        $data['product'] = $this->productService->getProduct($product_id, null, null, null);
        $data['tags'] = $this->productService->getUnassignedProductTags($product_id);
        return View::make('dashboard.producttags.create', $data);
    }

    public function postCreate($product_id)
    {
        try {
            $data = Input::all();
            $rules = array(
                'tag' => 'required',
                'offer_price' => 'required|numeric'
            );
            $validation = Validator::make($data, $rules);
            if ($validation->passes()) {
                $tag_id = Input::get('tag');
                $offer_price = Input::get('offer_price');

                $this->productService->createProductTag($product_id, $tag_id, $offer_price);

                Notification::success("Tag has been assigned successfully");
                return Redirect::to("dashboard/product-tags/$product_id");

            } else {
                return Redirect::to("dashboard/product-tags/create/$product_id")->withInput()->withErrors($validation);
            }
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getEdit($product_id, $tag_id)
    {
        try {

            $data['active'] = 'tags';
            $data['product'] = $this->productService->getProduct($product_id, null, null, null);
            $data['tag'] = $this->productService->getProductTag($product_id, $tag_id);
            return View::make('dashboard.producttags.edit', $data);

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function postEdit($product_id, $tag_id)
    {
        try {
            $validation = new \services\Validators\TagValidator();
            $validation::$rules['code'] .= ",$tag_id";
            if ($validation->passes()) {
                $name = Input::get('name');
                $code = Input::get('code');
                $description = Input::get('description', '');
                $offer_price = Input::get('offer_price');

                $this->productService->updateProductTag($product_id, $tag_id, $name, $code, $description, $offer_price);

                Notification::success('Tag has been updated successfully');
                return Redirect::to("dashboard/product-tags/$product_id");

            } else {

                $errors = $validation->getErrors();
                return Redirect::to("dashboard/product-tags/edit/$product_id/$tag_id")->withErrors($errors);

            }
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getDestroy($product_id, $tag_id)
    {
        $this->productService->deleteProductTag($product_id, array($tag_id));
        return Redirect::to("dashboard/product-tags/$product_id");
    }

}
