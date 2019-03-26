<?php
/**
 * Created by PhpStorm.
 * User: rahamatj
 * Date: 3/25/19
 * Time: 1:18 PM
 */

namespace Rahamatj\Kaiju\Fields;

use Rahamatj\Kaiju\MarkdownParser;

class Body extends Field
{
    public function process($field, $value)
    {
        return [
            $field => MarkdownParser::parse($value)
        ];
    }
}