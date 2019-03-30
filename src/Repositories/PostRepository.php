<?php

namespace Rahamatj\Kaiju\Repositories;

use Str;
use Rahamatj\Kaiju\Post;

class PostRepository
{
    public function save($post)
    {
        Post::updateOrCreate(
            [
                'identifier' => $post['identifier'],
            ],
            [
                'slug' => Str::slug($post['title']),
                'title' => $post['title'],
                'description' => $post['description'] ?? null,
                'body' => $post['body'],
                'extra' => $post['extra'] ?? null
            ]
        );
    }
}