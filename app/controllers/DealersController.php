<?php

class DealersController extends BaseController
{


    function __construct(DealersService $dealers)
    {
        $this->dealersService = $dealers;
    }

    public function index()
    {
        $data['dealers'] = $this->dealersService->getDealers(null, null);
        return View::make('dealers.index');
    }

    public function getDashboardDealers()
    {

    }

    public function create()
    {
        return View::make('dealers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return View::make('dealers.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        return View::make('dealers.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
