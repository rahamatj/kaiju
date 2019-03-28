<?php

namespace Rahamatj\Kaiju\Fields;


abstract class Field
{
    public function process($field, $value) {
        return [
            $field => $value
        ];
    }
}