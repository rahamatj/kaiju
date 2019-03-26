<?php
/**
 * Created by PhpStorm.
 * User: rahamatj
 * Date: 3/26/19
 * Time: 8:32 AM
 */

namespace Rahamatj\Kaiju\Tests;

use Rahamatj\Kaiju\KaijuServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withFactories(__DIR__.'/../database/factories');

    }

    protected function getPackageProviders($app)
    {
        return [
            KaijuServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testdb');
        $app['config']->set('database.connections.testdb', [
            'driver' => 'sqlite',
            'database' => ':memory:'
        ]);
    }
}