<?php

namespace Rahamatj\Kaiju\Http\Controllers;

use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('kaiju::index');
    }
}