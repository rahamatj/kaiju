<?php

namespace Rahamatj\Kaiju\Http\Controllers;

use File;
use Artisan;
use Illuminate\Routing\Controller;

class InstallController extends Controller
{
    public function install()
    {
        Artisan::call('kaiju:install');

        return view('kaiju::install.install');
    }

    public function migrate()
    {
        $exitCode = Artisan::call('migrate');

        $config = File::get(base_path('config/kaiju.php'));
        File::put(base_path('config/kaiju.php'), str_replace(
            "'block-installation-route' => false,",
            "'block-installation-route' => true,",
            $config
        ));

        return view('kaiju::install.migrate');
    }
}