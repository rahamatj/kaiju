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
                'author' => $post['author'] ?? null,
                'date' => isset($post['date']) ? $post['date']->toDateTimeString() : null,
                'description' => $post['description'] ?? null,
                'body' => $post['body'],
                'extra' => $post['extra'] ?? null
            ]
        );
    }
}