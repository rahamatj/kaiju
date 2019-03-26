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
    protected function getPackageProviders($app)
    {
        return [
            KaijuServiceProvider::class
        ];
    }
}