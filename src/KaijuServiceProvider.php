<?php

namespace Rahamatj\Kaiju;

use Route;
use Rahamatj\Kaiju\Facades\Kaiju;
use Illuminate\Support\ServiceProvider;

class KaijuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if($this->app->runningInConsole())
        {
            $this->registerPublishing();
        }

        $this->registerResources();
    }

    public function register()
    {
        $this->commands([
            Console\ProcessCommand::class
        ]);
    }

    protected function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'kaiju');

        $this->registerFacades();
        $this->registerRoutes();
    }

    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__.'/../config/kaiju.php' => config_path('kaiju.php')
        ], 'kaiju-config');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function() {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => Kaiju::path(),
            'namespace' => 'Rahamatj\Kaiju\Http\Controllers'
        ];
    }

    protected function registerFacades()
    {
        $this->app->singleton('Kaiju', function ($app) {
            return new \Rahamatj\Kaiju\Kaiju;
        });
    }
}