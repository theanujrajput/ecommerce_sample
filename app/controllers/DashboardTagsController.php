<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/28/14
 * Time: 11:14 AM
 */
class DashboardTagsController extends BaseController
{
    function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function getIndex()
    {
        try {

            $data['tags'] = $this->tagService->getTags(null, Constants::DASHBOARD_TAGS_PAGE_COUNT);
            return View::make('dashboard.tags.index', $data);

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getCreate()
    {
        return View::make('dashboard.tags.create');
    }

    public function postCreate()
    {
        try {

            $validation = new \services\Validators\TagValidator();
            if ($validation->passes()) {
                $name = Input::get('name');
                $code = Input::get('code');
                $description = Input::get('description', '');
                $this->tagService->createTag($name, $code, $description);

                Notification::success("Tag has been created successfully");
                return Redirect::to("dashboard/tags");

            } else {
                $errors = $validation->getErrors();
                return Redirect::to("dashboard/tags/create")->withInput()->withErrors($errors);
            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getEdit($id)
    {
        $data['tag'] = $this->tagService->getTag($id, null, null);
        return View::make('dashboard.tags.edit', $data);
    }

    public function postEdit($id)
    {
        try {

            $validation = new \services\Validators\TagValidator();
            $validation::$rules['name'] .= ",$id";
            $validation::$rules['code'] .= ",$id";
            if ($validation->passes()) {
                $name = Input::get("name");
                $code = Input::get("code");
                $description = Input::get("description");
                $this->tagService->updateTag($id, $name, $code, $description);
                Notification::success("Tag has been updated successfully");
                return Redirect::to('dashboard/tags');

            } else {

                $errors = $validation->getErrors();
                return Redirect::to("dashboard/tags/edit/$id")->withInput()->withErrors($errors);
            }


        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function getDelete($id)
    {
        $this->tagService->deleteTag($id);
        return Redirect::to("dashboard/tags");
    }
} 