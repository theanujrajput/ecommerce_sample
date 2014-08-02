<?php

class DashboardCategoryDocumentsController extends BaseController
{


    function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getIndex($category_id)
    {

        $data['active'] = 'documents';
        $data['category'] = $this->categoryService->getCategoryDocuments($category_id, null);
        return View::make('dashboard.categorydocuments.index', $data);
    }


    public function getCreate($category_id)
    {
        $data['active'] = 'documents';
        $data['category'] = $this->categoryService->getCategory($category_id, null, null);
        return View::make('dashboard.categorydocuments.create', $data);
    }

    public function postCreate($category_id)
    {
        $validation = new \services\Validators\DocumentValidator();
        if ($validation->passes()) {

            $file = Input::file('file');
            $active = Input::get('active');
            $name = Input::get('name');
            $title = Input::get('title');
            $label = Input::get('label');
            $notes = Input::get('notes', '');

            //upload and move file
            $file_info = AppUtil::moveFile($file, 'category_document');
            $type = $file_info['type'];
            $path = $file_info['path'];

            $this->categoryService->createCategoryDocuments($type, $path, $active, null, $label, $name, $title, $notes, $category_id);

            Notification::success("Document has been added successfully");
            return Redirect::to('dashboard/category-documents/' . $category_id);

        } else {
            $errors = $validation->getErrors();
            return Redirect::to('dashboard/category-documents/create' . $category_id)->withErrors($errors)->withInput(Input::all());
        }
    }


    public function getEdit($category_id, $document_id)
    {
        $data['active'] = 'documents';
        $data['category'] = $this->categoryService->getCategory($category_id, null, null);
        $data['document'] = $this->categoryService->getCategoryDocument($category_id, $document_id);
        return View::make('dashboard.categorydocuments.edit', $data);
    }

    public function postEdit($category_id, $document_id)
    {

        $validation = new \services\Validators\DocumentValidator();

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
                $file_info = AppUtil::moveFile($file, 'category_document');
                $type = $file_info['type'];
                $path = $file_info['path'];

                $this->categoryService->updateCategoryDocument($category_id, $document_id, $name, $title, $label, $notes, $active, $path, $type);

            } else {
                $this->categoryService->updateCategoryDocument($category_id, $document_id, $name, $title, $label, $notes, $active, null, null);
            }

            return Redirect::to("dashboard/category-documents/$category_id");

        } else {
            $errors = $validation->getErrors();
            return Redirect::to("dashboard/category-documents/edit/$category_id/$document_id")->withErrors($errors);
        }
    }

    public function getActivateOrDeactivate($category_id, $document_id, $status)
    {
        $this->categoryService->activateOrDeactivateDocument($document_id, $status);
        return Redirect::to("dashboard/category-documents/$category_id");
    }

    public function getDestroy($category_id, $document_id)
    {
        $this->categoryService->deleteCategoryDocument($category_id, $document_id);
        return Redirect::to("dashboard/category-documents/$category_id");
    }


}
