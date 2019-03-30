<?php

namespace Rahamatj\Kaiju;

use Route;

class Routes
{
    public static function register(array $config)
    {
        Route::group($config, function() {
            include(__DIR__.'/../routes/web.php');
        });
    }

}