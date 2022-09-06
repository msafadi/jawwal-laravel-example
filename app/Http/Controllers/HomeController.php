<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Actions (methods): must return response
    // view, redirect, json, ...
    public function index()
    {
        return view('welcome');
    }

    public function indexOverride()
    {
        return 'Index Override';
    }

    public function show($page)
    {
        return view($page);
    }

    public function contact()
    {
        echo 'Contact us!';
    }
}
