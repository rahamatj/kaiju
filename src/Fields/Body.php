<?php

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