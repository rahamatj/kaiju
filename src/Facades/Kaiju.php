<?php

namespace Rahamatj\Kaiju\Facades;

use Illuminate\Support\Facades\Facade;

class Kaiju extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Kaiju';
    }
}