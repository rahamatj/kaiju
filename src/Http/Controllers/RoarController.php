<?php

namespace Rahamatj\Kaiju\Http\Controllers;

use Artisan;
use Rahamatj\Kaiju\Post;
use Illuminate\Routing\Controller;

class RoarController extends Controller
{
    public function index()
    {
        $exitCode = Artisan::call('kaiju:roar');

        return view('kaiju::roar', [
            'posts' => Post::orderBy('id', 'desc')->get()
        ]);
    }
}