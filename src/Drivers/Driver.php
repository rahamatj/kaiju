<?php

namespace Rahamatj\Kaiju\Drivers;

use Str;
use Rahamatj\Kaiju\FileParser;

abstract class Driver
{
    protected $config;
    protected $posts = [];

    public function __construct()
    {
        $this->setConfig();
        $this->validateSource();
    }

    public abstract function fetchPosts();

    protected function setConfig()
    {
        $this->config = config('kaiju.' . config('kaiju.driver'));
    }

    protected function validateSource()
    {
        return true;
    }

    protected function parse($content, $identifier)
    {
        $this->posts[] = array_merge(
            (new FileParser($content))->getData(),
            [
                'identifier' => Str::slug($identifier)
            ]
        );
    }
}