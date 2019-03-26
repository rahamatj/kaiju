<?php
/**
 * Created by PhpStorm.
 * User: rahamatj
 * Date: 3/26/19
 * Time: 8:29 AM
 */

namespace Rahamatj\Kaiju;


use Illuminate\Support\ServiceProvider;

class KaijuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerResources();
    }

    public function register()
    {
        
    }

    private function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}