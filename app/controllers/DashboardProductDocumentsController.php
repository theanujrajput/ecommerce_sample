<?php

class DashboardProductDocumentsController extends BaseController
{

    function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }


    public function getIndex($product_id)
    {
        $data['active'] = 'documents';
        $data['product'] = $this->productService->getProduct($product_id, null, null, null);
        $data['documents'] = $this->productService->getProductDocuments($product_id);
        return View::make('dashboard.productdocuments.index', $data);
    }

    public function getDetail($product_id, $document_id)
    {

        return $this->productService->getProductDocument($product_id, $document_id);
    }

    public function getCreate($product_id)
    {
        $data['active'] = 'documents';
        $data['product'] = $this->productService->getProduct($product_id, null, null, null);
        return View::make('dashboard.productdocuments.create', $data);
    }

    public function postCreate($product_id)
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
            $file_info = AppUtil::moveFile($file, 'product_document');
            $type = $file_info['type'];
            $path = $file_info['path'];

            $this->productService->createProductDocument($type, $path, $active, null, $label, $name, $title, $notes, $product_id);

            Notification::success("Document has been added successfully");
            return Redirect::to("dashboard/product-documents/$product_id");
        } else {

            $errors = $validation->getErrors();
            return Redirect::to("dashboard/product-documents/create/$product_id")->withInput()->withErrors($errors);
        }
    }


    public function getEdit($product_id, $document_id)
    {
        $data['document'] = $this->productService->getProductDocument($product_id, $document_id);
        $data['product'] = $this->productService->getProduct($product_id, null, null, null, null);
        return View::make('dashboard.productdocuments.edit', $data);
    }


    public function postEdit($product_id, $document_id)
    {
        $validation = new \services\Validators\DocumentValidator();
        $validation::$rules['file'] = '';

        if ($validation->passes()) {

            $name = Input::get('name');
            $title = Input::get('title');
            $label = Input::get('label');
            $notes = Input::get('notes', '');
            $active = Input::get('active');
            $file = Input::file('file');

            if (Input::hasFile('file')) {

                //upload and move file
                $file_info = AppUtil::moveFile($file, 'product_document');
                $type = $file_info['type'];
                $path = $file_info['path'];

                $this->productService->updateProductDocument($product_id, $document_id, $name, $title, $label, $notes, $active, $path, $type);
            } else {
                $this->productService->updateProductDocument($product_id, $document_id, $name, $title, $label, $notes, $active, null, null);

            }

            Notification::success('Document has been updated successfully');
            return Redirect::to("dashboard/product-documents/$product_id");
        } else {
            $errors = $validation->getErrors();
            return Redirect::to("dashboard/products/edit/$product_id,$document_id")->withErrors($errors);
        }

    }

    public function getActivateOrDeactivate($product_id, $document_id, $status)
    {
        $this->categoryService->activateOrDeactivateDocument($document_id, $status);
        return Redirect::to("dashboard/product-documents/$product_id");
    }

    public function getDelete($product_id, $document_id)
    {
        $this->productService->deleteProductDocument($product_id, array($document_id));
        return Redirect::to("dashboard/product-documents/$product_id");
    }

}
