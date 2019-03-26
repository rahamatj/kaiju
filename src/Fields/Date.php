<?php
/**
 * Created by PhpStorm.
 * User: rahamatj
 * Date: 3/25/19
 * Time: 1:03 PM
 */

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