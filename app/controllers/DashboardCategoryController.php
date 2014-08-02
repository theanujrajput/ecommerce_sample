<?php

class DashboardCategoryController extends BaseController
{

    function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }


    public function getIndex()
    {
        try {

            $categories = $this->categoryService->getCategories(null, null, null, null, Constants::DASHBOARD_CATEGORIES_PAGE_COUNT);
            $data['categories'] = $categories;
            return View::make('dashboard.category.index', $data);

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getCreate()
    {
        $data['categories'] = $this->categoryService->getCategories(null, null, null, null, null);
        return View::make('dashboard.category.create', $data);
    }

    public function postCreate()
    {
        try {

            $validation = new \services\Validators\CategoryValidator();

            if ($validation->passes()) {
                $name = Input::get('name');
                $shortcode = Input::get('shortcode');
                $description = Input::get('description');
                $description_secondary = Input::get('description_secondary', '');
                $sequence = Input::get('sequence');
                $parent_category_id = Input::get('parent_category');
                $parent_category_id = ($parent_category_id == 0) ? null : $parent_category_id;
                $active = Input::get('active');
                $is_delivered = Input::get('delivered');
                $is_ltw = Input::get('ltw');
                $is_cod = Input::get('cod');
                $warranty = Input::get('warranty');
                $meta_title = Input::get('meta_title');
                $meta_description = Input::get('meta_description');
                $meta_keywords = Input::get('meta_keywords');

                if ($sequence == 'after') {
                    $sequence = Input::get('after');
                }

                $sequence = AppUtil::getSequence($sequence);

                $category = $this->categoryService->createCategory($name, $shortcode, $description, $description_secondary, $sequence,
                    $parent_category_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty, $meta_title, $meta_description, $meta_keywords);

                $category_id = $category->id;

                Notification::success("Category has been created successfully");
                return Redirect::to('dashboard/category');

            } else {
                $errors = $validation->getErrors();
                return Redirect::to('dashboard/category/create')->withInput(Input::all())->withErrors($errors);
            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }


    public function getEdit($id)
    {

        try {

            $data['active'] = 'category_info';
            $data['category'] = $this->categoryService->getCategory($id, null, null);
            $data['categories'] = $this->categoryService->getCategories(null, null, null, null, null);
            $data['sequence'] = $this->categoryService->getCategoryPosition($id);
            return View::make('dashboard.category.edit', $data);

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function postEdit($id)
    {
        try {
            $validation = new \services\Validators\CategoryValidator();
            $validation::$rules['shortcode'] .= ",$id";

            if ($validation->passes()) {
                $name = Input::get('name');
                $shortcode = Input::get('shortcode');
                $description = Input::get('description');
                $description_secondary = Input::get('description_secondary');
                $sequence = Input::get('sequence');
                $parent_category_id = Input::get('parent_category_id');
                $parent_category_id = ($parent_category_id == 0) ? null : $parent_category_id;
                $active = Input::get('active');
                $is_delivered = Input::get('delivered');
                $is_ltw = Input::get('ltw');
                $is_cod = Input::get('cod');
                $warranty = Input::get('warranty');
                $meta_title = Input::get('meta_title');
                $meta_description = Input::get('meta_description');
                $meta_keywords = Input::get('meta_keywords');

                if ($sequence == 'after') {
                    $sequence = Input::get('after');
                }

                $sequence = AppUtil::getSequence($sequence);

                $this->categoryService->updateCategory($id, $name, $shortcode, $description, $description_secondary, $sequence,
                    $parent_category_id, $active, $is_delivered, $is_ltw, $is_cod, $warranty, $meta_title, $meta_description, $meta_keywords);

                Notification::success("Category has been updated successfully");
                return Redirect::to("dashboard/category");

            } else {

                $errors = $validation->getErrors();
                return Redirect::to("dashboard/category/edit/$id")->withInput(Input::all())->withErrors($errors);
            }
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }


    public function getDestroy($id)
    {
        try {
            $this->categoryService->deleteCategory($id);
            Notification::error("Category has been deleted");
            return Redirect::to('dashboard/categories');
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getActivateOrDeactivate($id, $status)
    {
        $this->categoryService->activateOrDeactivateCategory($id, $status);
        return Redirect::to('dashboard/category');
    }
}
