<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{
    protected $model;
    protected $data;

    protected $perPage;
    protected $view;
    protected $type;

    protected $dataForeign;
    function __construct()
    {
        $this->perPage = 10;
    }
}
