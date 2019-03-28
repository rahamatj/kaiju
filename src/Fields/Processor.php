<?php

namespace Rahamatj\Kaiju\Fields;

class Processor
{
    protected $field;

    function __construct(Field $field)
    {
        $this->field = $field;
    }

    public function process($field, $value)
    {
        return $this->field->process($field, $value);
    }
}