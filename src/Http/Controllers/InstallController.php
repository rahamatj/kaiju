<?php

namespace Rahamatj\Kaiju\Http\Controllers;

use Artisan;
use Illuminate\Routing\Controller;

class InstallController extends Controller
{
    public function index()
    {
        $exitCode = Artisan::call('kaiju:install');

        return view('kaiju::install');
    }
}