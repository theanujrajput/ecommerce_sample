<?php

class DashboardProductVideosController extends BaseController
{

    function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function getIndex($product_id)
    {
        $data['active'] = 'videos';
        $data['product'] = $this->productService->getProduct($product_id, null, null, null);
        return View::make('dashboard.productvideos.index', $data);
    }

    public function getCreate($product_id)
    {
        $data['active'] = 'videos';
        $data['product'] = $this->productService->getProductBasicInfo($product_id, null, null, null);
        return View::make('dashboard.productvideos.create', $data);
    }

    public function postCreate($product_id)
    {
        try {

            $validation = new \services\Validators\VideoValidator();
            if ($validation->passes()) {

                $file = Input::file('file');
                $active = Input::get('active');
                $name = Input::get('name');
                $title = Input::get('title');
                $label = Input::get('label');
                $notes = Input::get('notes', '');

                //upload and move file
                $file_info = AppUtil::moveFile($file, 'product_video');
                $type = $file_info['type'];
                $path = $file_info['path'];

                $this->productService->createProductVideo($type, $path, $active, $label, $name, $title, $notes, $product_id);
                Notification::success("Video has been added successfully");
                return Redirect::to("dashboard/product-videos/$product_id");

            } else {

                $errors = $validation->getErrors();
                return Redirect::to("dashboard/product-videos/create/$product_id")->withInput()->withErrors($errors);
            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    public function getEdit($product_id, $video_id)
    {
        $data['active'] = 'videos';
        $data['product'] = $this->productService->getProductBasicInfo($product_id, null, null, null);
        $data['video'] = $this->productService->getProductVideo($product_id, $video_id);
        return View::make('dashboard.productvideos.edit', $data);

    }

    public function postEdit($product_id, $video_id)
    {
        try {

            $validation = new \services\Validators\VideoValidator();
            $validation::$rules['file'] = 'mimes:mp4,flv,mkv,mov,avi';

            if ($validation->passes()) {

                $name = Input::get('name');
                $title = Input::get('title');
                $label = Input::get('label');
                $notes = Input::get('notes', '');
                $active = Input::get('active');
                $file = Input::file('file');

                if (Input::hasFile('file')) {

                    //upload and move file
                    $file_info = AppUtil::moveFile($file, 'product_video');
                    $type = $file_info['type'];
                    $path = $file_info['path'];

                    $this->productService->updateProductVideo($product_id, $video_id, $name, $title, $label, $notes, $active, $path, $type);
                } else {
                    $this->productService->updateProductVideo($product_id, $video_id, $name, $title, $label, $notes, $active, null, null);
                }

                return Redirect::to("dashboard/product-videos/$product_id");

            } else {
                $errors = $validation->getErrors();
                return Redirect::to("dashboard/product-videos/edit/$product_id/$video_id")->withErrors($errors);
            }
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function getActivateOrDeactivate($product_id, $video_id, $status)
    {
        $this->categoryService->activateOrDeactivateVideo($video_id, $status);
        return Redirect::to("dashboard/product-videos/$product_id");
    }

    public function getDelete($product_id, $video_id)
    {
        $this->productService->deleteProductVideo($product_id, array($video_id));
        return Redirect::to("dashboard/product-videos/$product_id");
    }
}
