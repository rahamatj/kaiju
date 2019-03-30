<?php

namespace Rahamatj\Kaiju\Console;

use Str;
use Illuminate\Console\Command;
use Rahamatj\Kaiju\Facades\Kaiju;
use Rahamatj\Kaiju\Repositories\PostRepository;

class RoarCommand extends Command
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

        $this->info('Roaring ...');

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