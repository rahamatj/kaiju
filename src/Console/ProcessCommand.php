<?php

namespace Rahamatj\Kaiju\Console;

use Str;
use Rahamatj\Kaiju\Post;
use Rahamatj\Kaiju\FileParse;
use Illuminate\Console\Command;
use Rahamatj\Kaiju\Facades\Kaiju;
use Rahamatj\Kaiju\Repositories\PostRepository;

class ProcessCommand extends Command
{
    protected $signature = 'kaiju:roar';

    protected $description = 'Update blog posts';

    public function handle(PostRepository $postRepository)
    {
        if(Kaiju::configNotPublished())
        {
            return $this->warn(
                'Please publish the config file by running \'php artisan vendor:publish --tag=kaiju-config\''
            );
        }

        try {
            $posts = Kaiju::driver()->fetchPosts();

            $this->info('Number of posts: ' . count($posts));

            foreach ($posts as $post) {
                $postRepository->save($post);
                $this->info('Post: ' . $post['title']);
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}