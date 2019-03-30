<?php

namespace Rahamatj\Kaiju;

use Route;

class Routes
{
    public function routePrefix()
    {
        return config('kaiju.route-prefix', '/');
    }

    public function routeConfig()
    {
        return [
            'prefix' => $this->routePrefix(),
            'namespace' => '\Rahamatj\Kaiju\Http\Controllers'
        ];
    }

    public function register($routeFile)
    {
        Route::group($this->routeConfig(), function() use ($routeFile) {
            include(__DIR__.'/../routes/' . $routeFile . '.php');
        });
    }

}