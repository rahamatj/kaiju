<?php

namespace Rahamatj\Kaiju\Http\Controllers;

use Rahamatj\Kaiju\Post;
use Illuminate\Routing\Controller;

class BlogController extends Controller
{
    public function index()
    {
        return view('kaiju::blog.index', [
            'posts' => Post::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function show(Post $post)
    {
        return view('kaiju::blog.show', [
            'post' => $post
        ]);
    }
}