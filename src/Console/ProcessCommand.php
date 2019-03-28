<?php

namespace Rahamatj\Kaiju\Console;

use Str;
use Rahamatj\Kaiju\Post;
use Rahamatj\Kaiju\FileParse;
use Illuminate\Console\Command;
use Rahamatj\Kaiju\Facades\Kaiju;

class ProcessCommand extends Command
{
    protected $signature = 'kaiju:roar';

    protected $description = 'Update blog posts';

    public function handle()
    {
        if(Kaiju::configNotPublished())
        {
            return $this->warn(
                'Please publish the config file by running \'php artisan vendor:publish --tag=kaiju-config\''
            );
        }

        try {
            $posts = Kaiju::driver()->fetchPosts();

            foreach ($posts as $post) {
                Post::create([
                    'identifier' => $post['identifier'],
                    'slug' => Str::slug($post['title']),
                    'title' => $post['title'],
                    'author' => $post['author'] ?? null,
                    'date' => isset($post['date']) ? $post['date']->toDateTimeString() : null,
                    'description' => $post['description'] ?? null,
                    'body' => $post['body'],
                    'extra' => $post['extra'] ?? null
                ]);
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}