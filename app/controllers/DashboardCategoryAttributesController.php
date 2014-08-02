<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/13/14
 * Time: 5:40 PM
 */
class DashboardCategoryAttributesController extends BaseController
{

    function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;

    }

    public function getIndex($category_id)
    {
        try {

            $data['active'] = 'attributes';
            $data['category'] = $this->categoryService->getCategory($category_id, null, null);
            $data['attributes'] = $this->categoryService->getCategoryAttributes($category_id, null, null, null, null);
            return View::make('dashboard.categoryattributes.index', $data);

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function getCreate($category_id)
    {

        $data['active'] = 'attributes';
        $data['category'] = $this->categoryService->getCategory($category_id, null, null);
        return View::make('dashboard.categoryattributes.create', $data);

    }

    public function postCreate($category_id)
    {
        try {

            $validation = new \services\Validators\AttributeValidator();
            if ($validation->passes()) {

                $name = Input::get('name');
                $code = Input::get('code');
                $attribute_category = Input::get('attribute_category');
                $description = Input::get('description');
                $is_comparable = Input::get('comparable');
                $is_filterable = Input::get('filterable');
                $attribute_value_type = Input::get('attribute_value_type');
                $options = Input::get('options');
                $active = Input::get('active');
                $sequence = Input::get('sequence');

                $sequence = AppUtil::getSequence($sequence); //sequence should be "top","bottom" or int


                $this->categoryService->createCategoryAttributes($name, $code, $attribute_category, $description,
                    $category_id, $is_comparable, $is_filterable, $attribute_value_type, $options, $active, $sequence);

                Notification::success("Feature has been created successfully");
                return Redirect::to("dashboard/category-attributes/$category_id");

            } else {

                $errors = $validation->getErrors();
                return Redirect::to("dashboard/category/create/$category_id")->with($errors)->withInput();
            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function getEdit($category_id, $attribute_id)
    {
        try {

            $data['active'] = 'attributes';
            $data['category'] = $this->categoryService->getCategory($category_id, null, null);
            $data['attributes'] = $this->categoryService->getCategoryAttributes($category_id, null, null, null, null);
            $data['attribute'] = $this->categoryService->getCategoryAttribute($category_id, $attribute_id);
            $data['sequence'] = $this->categoryService->getCategoryAttributePosition($attribute_id);

            return View::make("dashboard.categoryattributes.edit", $data);

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function postEdit($category_id, $attribute_id)
    {

        try {

            $validation = new \services\Validators\AttributeValidator();
            $validation::$rules['name'] .= ",$attribute_id";
            $validation::$rules['code'] .= ",$attribute_id";
            if ($validation->passes()) {

                $name = Input::get('name');
                $code = Input::get('code');
                $attribute_category = Input::get('attribute_category');
                $description = Input::get('description');
                $is_comparable = Input::get('comparable');
                $is_filterable = Input::get('filterable');
                $attribute_value_type = Input::get('attribute_value_type');
                $options = Input::get('options');
                $active = Input::get('active');
                $sequence = Input::get('sequence');

                if ($sequence == 'after') {
                    $sequence = Input::get('after');
                }

                $sequence = AppUtil::getSequence($sequence); //sequence should be "top","bottom" or int
                $this->categoryService->updateCategoryAttribute($attribute_id, $name, $code, $attribute_category,
                    $description, $category_id, $is_comparable, $is_filterable, $attribute_value_type, $options, $active, $sequence);

                return Redirect::to("dashboard/category-attributes/$category_id");

            } else {
                $errors = $validation->getErrors();
                return Redirect::to("dashboard/category-attributes/edit/$category_id/$attribute_id")->withErrors($errors)->withInput();

            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function getActivateOrDeactivate($category_id, $attribute_id, $status)
    {
        $this->categoryService->activateOrDeactivateCategoryAttribute($attribute_id, $status);
        return Redirect::to("dashboard/category-attributes/$category_id");
    }

} 