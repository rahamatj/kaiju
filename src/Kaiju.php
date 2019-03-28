<?php

namespace Rahamatj\Kaiju;

use Str;

class Kaiju
{
    protected $fields = [];

    public function configNotPublished()
    {
        return is_null(config('kaiju'));
    }

    public function driver()
    {
        $driver = Str::title(config('kaiju.driver'));
        $class = "Rahamatj\\Kaiju\\Drivers\\{$driver}Driver";

        return new $class;
    }

    public function path()
    {
        return config('kaiju.path', 'blogs');
    }

    public function fields($fields)
    {
        $this->fields = array_merge($this->fields, $fields);
    }

    public function availableFields()
    {
        return array_reverse($this->fields);
    }
}