<?php

namespace Rahamatj\Kaiju;

use Route;
use Rahamatj\Kaiju\Facades\Kaiju;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class KaijuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPublishing();
        $this->registerResources();
    }

    public function register()
    {
        $this->commands([
            Console\RoarCommand::class,
            Console\InstallCommand::class
        ]);

        $this->app->booting(function() {
            $loader = AliasLoader::getInstance();
            $loader->alias('Kaiju', Kaiju::class);
        });
    }

    protected function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'kaiju');

        $this->registerFacades();
        $this->registerFields();
        Kaiju::installRoutes();
    }

    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__.'/../config/kaiju.php' => config_path('kaiju.php')
        ], 'kaiju-config');

        $this->publishes([
            __DIR__.'/../stubs/KaijuServiceProvider.stub' => app_path('Providers/KaijuServiceProvider.php')
        ], 'kaiju-provider');

        $this->publishes([
            __DIR__.'/../stubs/web.stub' => base_path('routes/web.php')
        ], 'kaiju-routes');

        $this->publishes([
            __DIR__.'/../public/assets' => public_path('vendor/kaiju/assets'),
        ], 'kaiju-assets');

        $this->publishes([
            __DIR__.'/../kaiju' => base_path('kaiju'),
        ], 'kaiju-posts');

        $this->publishes([
            __DIR__.'/../database/migrations' => base_path('database/migrations'),
        ], 'kaiju-migrations');
    }

    protected function registerFacades()
    {
        $this->app->singleton('kaiju-routes', function ($app) {
            return new \Rahamatj\Kaiju\Routes;
        });

        $this->app->singleton('kaiju', function ($app) {
            return new \Rahamatj\Kaiju\Kaiju;
        });
    }

    protected function registerFields()
    {
        Kaiju::fields([
            // Fields\Author::class,
            Fields\Body::class,
            // Fields\Date::class,
            Fields\Description::class,
            Fields\Extra::class,
            Fields\Title::class,
        ]);
    }
}