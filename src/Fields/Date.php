<?php

namespace Rahamatj\Kaiju\Fields;

use Carbon\Carbon;

class Date extends Field
{
    public function process($field, $value)
    {
        return [
            $field => Carbon::parse($value)
        ];
    }
}