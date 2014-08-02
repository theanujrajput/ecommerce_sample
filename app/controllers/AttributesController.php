<?php

class AttributesController extends BaseController
{

    function __construct(AttributeService $attributeService)
    {
        $this->attributeService = $attributeService;
    }

    public function index()
    {
        return View::make('attributes.index');
    }

    public function getDashboardAttributes()
    {
        $data['attributes'] = $this->attributeService->getAttributes();
        return View::make('attributes', $data);
    }

    public function create()
    {
        return View::make('attributes.create');
    }


    public function store()
    {
        $validation = new \services\Validators\AttributeValidator();
        if ($validation->passes()) {
            $name = Input::get('name');
            $code = Input::get('code');
            $attribute_category = Input::get('attribute_category');
            $description = Input::get('description');
            $category_id = Input::get('category_id');
            $is_comparable = Input::get('is_comparable');
            $is_filterable = Input::get('is_filterable');
            $attribute_value_type = Input::get('attribute_value_type');
            $options = Input::get('options');
            $active = Input::get('active');
            $sequence = Input::get('sequence');

            $sequence = AppUtil::getSequence($sequence);

            $this->attributeService->createAttribute($name, $code, $attribute_category, $description, $category_id
                , $is_comparable, $is_filterable, $attribute_value_type, $options, $active, $sequence);

            Session::flash("success", "Attribute has been created successfully");
            return Redirect::to('attributes/dashboard-attributes');

        } else {

            $error = $validation->getErrors();
            return Redirect::to('attributes/create')->withInput(Input::all())->withErrors($error);

        }
    }


    public function show($id)
    {
        return View::make('attributes.show');
    }


    public function edit($id)
    {
        try {

            $data['attribute'] = $this->attributeService->getAttribute($id, null);
            return View::make('attributes.edit', $data);


        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }


    public function update($id)
    {
        $validation = new \services\Validators\AttributeValidator();
        if ($validation->passes()) {
            $name = Input::get('name');
            $code = Input::get('code');
            $attribute_category = Input::get('attribute_category');
            $description = Input::get('description');
            $category_id = Input::get('category_id');
            $is_comparable = Input::get('is_comparable');
            $is_filterable = Input::get('is_filterable');
            $attribute_value_type = Input::get('attribute_value_type');
            $options = Input::get('options');
            $active = Input::get('active');
            $sequence = Input::get('sequence');

            $sequence = AppUtil::getSequence($sequence);

            $this->attributeService->updateAttribute($id, $name, $code, $attribute_category, $description, $category_id
                , $is_comparable, $is_filterable, $attribute_value_type, $options, $active, $sequence);

            Session::flash("success", "Attribute has been updated successfully");
            return Redirect::to('attributes/dashboard-attributes');

        } else {

            $error = $validation->getErrors();
            return Redirect::to("attributes/$id/edit")->withInput(Input::all())->withErrors($error);

        }

    }


    public function destroy($id)
    {
        try {

            $this->attributeService->deleteAttribute($id);
            Session::flash('alert', "Attribute has been deleted");
            return Redirect::to('attributes/dashboard-attributes');
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

}
