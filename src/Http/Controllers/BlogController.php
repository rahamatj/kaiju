<?php

namespace Rahamatj\Kaiju\Http\Controllers;

use Rahamatj\Kaiju\Post;
use Illuminate\Routing\Controller;
use Illuminate\Pagination\Paginator;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();

        $posts = $posts->filter(function($post) {
            return ! $post->extra()->is_project;
        });

        $posts = new Paginator($posts, 10);

        return view('kaiju::posts.index', [
            'type' => 'Blog',
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('kaiju::posts.show', [
            'post' => $post
        ]);
    }
}