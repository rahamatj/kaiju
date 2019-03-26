<?php
/**
 * Created by PhpStorm.
 * User: rahamatj
 * Date: 3/25/19
 * Time: 1:22 PM
 */

namespace Rahamatj\Kaiju\Fields;


abstract class Field
{
    public function process($field, $value) {
        return [
            $field => $value
        ];
    }
}