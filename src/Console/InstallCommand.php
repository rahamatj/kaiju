<?php

namespace Rahamatj\Kaiju\Console;

use File;
use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'kaiju:install';

    protected $description = 'Installs kaiju';

    public function handle()
    {
        $this->info('Publishing config ...');
        $this->callSilent('vendor:publish', [ '--tag' => 'kaiju-config', '--force' => true ]);

        $this->info('Publishing routes ...');
        $this->callSilent('vendor:publish', [ '--tag' => 'kaiju-routes', '--force' => true ]);

        $this->info('Publishing assets ...');
        $this->callSilent('vendor:publish', [ '--tag' => 'kaiju-assets', '--force' => true ]);

        $this->info('Publishing posts ...');
        $this->callSilent('vendor:publish', [ '--tag' => 'kaiju-posts', '--force' => true ]);

        $this->info('Creating database ...');
        $env = File::get(base_path('.env'));
        File::put(base_path('.env'), str_replace(
            [
                'DB_CONNECTION=mysql',
                'DB_HOST=127.0.0.1',
                'DB_PORT=3306',
                'DB_DATABASE=homestead',
                'DB_USERNAME=homestead',
                'DB_PASSWORD=secret'
            ],
            [
                'DB_CONNECTION=sqlite',
                '',
                '',
                '',
                '',
                ''
            ],
            $env
        ));

        if(! File::exists(base_path('database/database.sqlite'))) {
            touch(base_path('database/database.sqlite'));
        }

        $this->info('');
        $this->info('Roar! Kaiju installed successfully! Enjoy!');
        $this->info('Run \'php artisan migrate\' to migrate database.');
    }
}