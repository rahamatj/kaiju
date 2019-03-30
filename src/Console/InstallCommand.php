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
        $this->callSilent('vendor:publish', [ '--tag' => 'kaiju-config' ]);

        $this->info('Publishing routes ...');
        $this->callSilent('vendor:publish', [ '--tag' => 'kaiju-routes' ]);

        $this->info('Publishing assets ...');
        $this->callSilent('vendor:publish', [ '--tag' => 'kaiju-assets' ]);

        $this->info('Publishing posts ...');
        $this->callSilent('vendor:publish', [ '--tag' => 'kaiju-posts' ]);

        $this->info('Creating database ...');
        $env = File::get('.env');
        File::put('.env', str_replace(
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
        touch('database/database.sqlite');

        $this->info('Migrating database ...');
        $this->callSilent('migrate');

        $this->info('Roaring ...');
        $this->callSilent('kaiju:roar');

        $this->info('');
        $this->info('Installation complete! Enjoy!');
    }
}