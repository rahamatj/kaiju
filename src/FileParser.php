<?php

namespace Rahamatj\Kaiju;

use Str;
use File;
use ReflectionClass;
use Rahamatj\Kaiju\Facades\Kaiju;
use Rahamatj\Kaiju\Fields\Processor;

class FileParser
{
    protected $data;
    protected $rawData;
    protected $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
        
        $this->splitFile();
        $this->explodeData();
        $this->processFields();
    }

    public function getData()
    {
        return $this->data;
    }

    public function getRawData()
    {
        return $this->rawData;
    }

    protected function splitFile()
    {
        preg_match(
            '/^\-{3}(.*?)\-{3}(.*)/s',
            File::exists($this->filename) ? File::get($this->filename) : $this->filename,
            $this->rawData
        );
    }

    protected function explodeData()
    {
        foreach (explode("\n", trim($this->rawData[1])) as $fieldString) {
            preg_match('/(.*)\s?:\s?(.*)/', $fieldString, $fieldArray);
            $this->data[$fieldArray[1]] = $fieldArray[2];
        }

        $this->data['body'] = trim($this->rawData[2]);
    }

    protected function processFields()
    {
        $extraData = [];
        foreach ($this->data as $field => $value) {
            $fieldClass = $this->getFieldClass($field);

            if(class_exists($fieldClass)) {
                $processor = new Processor(new $fieldClass);

                $this->data = array_merge(
                    $this->data,
                    $processor->process($field, $value)
                );
            } else {
                $extra = new \Rahamatj\Kaiju\Fields\Extra;
                $extraData = array_merge(
                    $extraData,
                    $extra->process($field, $value)
                );
                unset($this->data[$field]);
            }
        }

        if(!empty($extraData)) {
            $this->data['extra'] = json_encode($extraData);
        }
    }

    /**
     * @param $field
     * @return mixed
     */
    protected function getFieldClass($field)
    {
        foreach (Kaiju::availableFields() as $availableField) {
            $class = new ReflectionClass($availableField);

            if($class->getShortName() == Str::title($field))
            {
                return $class->getName();
            }
        }
    }
}