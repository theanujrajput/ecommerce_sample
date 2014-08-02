<?php

class DashboardProductImagesController extends BaseController
{

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getIndex($product_id)
    {
        $data['active'] = 'images';
        $data['product'] = $this->productService->getProduct($product_id, null, null, null, null);
        return View::make('dashboard.productimages.index', $data);
    }

    public function getCreate($product_id)
    {
        $data['active'] = 'images';
        $data['product'] = $this->productService->getProduct($product_id, null, null, null, null);
        return View::make('dashboard.productimages.create', $data);
    }

    public function postCreate($product_id)
    {
        try {

            $validation = new \services\Validators\ImageValidator();
            if ($validation->passes()) {

                $name = Input::get('name');
                $title = Input::get('title');
                $caption = Input::get('caption');
                $notes = Input::get('notes', '');
                $is_primary = Input::get('primary', 0);
                $img = Input::file('img');

                //upload,resize and move image
                $img_info = AppUtil::resizeAndMoveImage($img);
                $path = $img_info['path'];

                $product_image = $this->productService->createProductImage($path, $name, $title, $caption, $notes, $is_primary, $product_id);
                $img_id = $product_image->id;

                if ($is_primary == 1) {
                    $this->productService->setProductPrimaryImage($product_id, $img_id);
                }

                Notification::success("Image has been added successfully");
                return Redirect::to("dashboard/product-images/$product_id");

            } else {
                $errors = $validation->getErrors();
                return Redirect::to("dashboard/product-images/create/$product_id")->withInput()->withErrors($errors);
            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function getEdit($product_id, $image_id)
    {
        $data['active'] = 'images';
        $data['product'] = $this->productService->getProduct($product_id, null, null, null, null);
        $data['image'] = $this->productService->getProductImage($product_id, $image_id);

        return View::make('dashboard.productimages.edit', $data);
    }

    public function postEdit($product_id, $image_id)
    {
        try {

            $validation = new \services\Validators\ImageValidator();
            $validation::$rules['img'] = 'mimes:jpeg,jpg,png';
            if ($validation->passes()) {

                $name = Input::get('name');
                $title = Input::get('title');
                $caption = Input::get('caption');
                $notes = Input::get('notes', '');
                $is_primary = Input::get('primary', 0);
                $img = Input::file('img');

                if (Input::hasFile('img')) {

                    //upload and move file
                    $img_info = AppUtil::resizeAndMoveImage($img);
                    $path = $img_info['path'];

                    $this->productService->updateProductImage($product_id, $image_id, $name, $title, $caption, $notes, $is_primary, $path);

                    if ($is_primary == 1) {
                        $this->productService->setProductPrimaryImage($product_id, $image_id);
                    }

                } else {
                    $this->productService->updateProductImage($product_id, $image_id, $name, $title, $caption, $notes, null, null);
                }

                return Redirect::to("dashboard/product-images/$product_id");

            } else {

                $errors = $validation->getErrors();
                return Redirect::to("dashboard/product-images/edit/$product_id/$image_id")->withInput(Input::all())->withErrors($errors);

            }


        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }


    public function getDestroy($product_id, $image_id)
    {
        $this->productService->deleteProductImage($product_id, array($image_id));
        return Redirect::to("dashboard/product-images/$product_id");
    }


    public function getSetPrimaryImage($product_id, $image_id)
    {
        $this->productService->setProductPrimaryImage($product_id, $image_id);
        return Redirect::to("dashboard/product-images/$product_id");
    }

}
