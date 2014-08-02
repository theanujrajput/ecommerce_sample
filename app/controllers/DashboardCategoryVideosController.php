<?php

class DashboardCategoryVideosController extends BaseController
{

    function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getIndex($category_id)
    {
        $data['active'] = 'videos';
        $data['category'] = $this->categoryService->getCategoryVideos($category_id, null);
        return View::make('dashboard.categoryvideos.index', $data);
    }


    public function getCreate($category_id)
    {
        $data['active'] = 'videos';
        $data['category'] = $this->categoryService->getCategory($category_id, null, null);
        return View::make('dashboard.categoryvideos.create', $data);
    }

    public function postCreate($category_id)
    {
        $validation = new \services\Validators\VideoValidator();
        if ($validation->passes()) {

            $file = Input::file('file');
            $active = Input::get('active');
            $name = Input::get('name');
            $title = Input::get('title');
            $label = Input::get('label');
            $notes = Input::get('notes', '');

            //upload and move file
            $file_info = AppUtil::moveFile($file, 'category_video');
            $type = $file_info['type'];
            $path = $file_info['path'];

            $this->categoryService->createCategoryVideo($type, $path, $active, $label, $name, $title, $notes, $category_id);

            Notification::success("Video has been added successfully");
            return Redirect::to('dashboard/category-videos/' . $category_id);

        } else {
            $errors = $validation->getErrors();
            return Redirect::to('dashboard/category-videos/create' . $category_id)->withErrors($errors)->withInput(Input::all());
        }
    }


    public function getEdit($category_id, $video_id)
    {
        $data['active'] = 'videos';
        $data['category'] = $this->categoryService->getCategory($category_id, null, null);
        $data['video'] = $this->categoryService->getCategoryVideo($category_id, $video_id);

        return View::make('dashboard.categoryvideos.edit', $data);
    }

    public function postEdit($category_id, $video_id)
    {

        $validation = new \services\Validators\VideoValidator();

        $validation::$rules['file'] = "";

        if ($validation->passes()) {

            $name = Input::get('name');
            $title = Input::get('title');
            $label = Input::get('label');
            $notes = Input::get('notes', '');
            $active = Input::get('active');
            $file = Input::file('file');

            if (Input::hasFile('file')) {

                //upload and move file
                $file_info = AppUtil::moveFile($file, 'category_video');
                $type = $file_info['type'];
                $path = $file_info['path'];

                $this->categoryService->updateCategoryVideo($category_id, $video_id, $name, $title, $label, $notes, $active, $path, $type);
            } else {
                $this->categoryService->updateCategoryVideo($category_id, $video_id, $name, $title, $label, $notes, $active, null, null);
            }
            return Redirect::to("dashboard/category-videos/$category_id");

        } else {
            $errors = $validation->getErrors();
            return Redirect::to("dashboard/category-videos/edit/$category_id/$video_id")->withErrors($errors);
        }
    }

    public function destroy($id)
    {

    }


}
