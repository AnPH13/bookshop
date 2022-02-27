<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $model;
    protected $data;

    protected $perPage;
    protected $view;
    protected $type;
    protected $user;

    protected $dataForeign;
    function __construct()
    {
        $this->perPage = 10;
        // return Auth::user();
        // $this->middleware(function ($request, $next) {
        //     $this->user= Auth::user();

        //     return $this->user;//$next($request);
        // });
    }
}
