<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/17/14
 * Time: 7:07 PM
 */
class DashboardController extends BaseController
{

    public function getIndex()
    {
        return View::make('dashboard.index');
    }

} 