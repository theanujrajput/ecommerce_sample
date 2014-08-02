<?php

class PageDataController extends BaseController
{

    function __construct(PageDataService $pageDataService)
    {

        $this->pageDataService = $pageDataService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['pages_data'] = $this->pageDataService->getPagesData();
        return View::make('pagedata.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('pagedata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data = Input::all();
        $rules = array(
            'name' => 'required|unique',
            'value' => 'required'
        );

        $validation = Validator::make($data, $rules);
        if ($validation->passes()) {

            $name = Input::get('name');
            $value = Input::get('value');
            $meta_title = Input::get('meta_title');
            $meta_description = Input::get('meta_description');
            $meta_keywords = Input::get('meta_keywords');

            $this->pageDataService->createPageData($name, $value, $meta_title, $meta_description, $meta_keywords);

        } else {

        }
    }


    public function show($id)
    {

    }

    public function edit($id)
    {
        $data['page_data'] = $this->pageDataService->getPageData($id, null);
        return View::make('pagedata.edit', $data);

    }


    public function update($id)
    {
        try {

            $data = Input::all();
            $rules = array(
                'name' => 'required|unique',
                'value' => 'required'
            );

            $validation = Validator::make($data, $rules);
            if ($validation->passes()) {

                $name = Input::get('name');
                $value = Input::get('value');
                $meta_title = Input::get('meta_title');
                $meta_description = Input::get('meta_description');
                $meta_keywords = Input::get('meta_keywords');
                $this->pageDataService->updatePageData($id, $name, $value, $meta_title, $meta_description, $meta_keywords);

            } else {

            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function destroy($id)
    {
        try {
            $this->pageDataService->deletePageData(array($id));

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

}
