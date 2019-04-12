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

    public function flush($posts)
    {
        $identifiers = array_map(function($item) {
            return $item['identifier'];
        }, $posts);
        
        $postsToBeFlushed = Post::whereNotIn('identifier', $identifiers)->get();
        
        $flushedPosts = [];
        foreach($postsToBeFlushed as $postToBeFlushed) {
            $flushedPosts[] = $postToBeFlushed->title;
            $postToBeFlushed->delete();
        }

        return $flushedPosts;
    }
}