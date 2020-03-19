<?php

namespace Helpers;

use Illuminate\Support\Arr;

class FluentArray
{
    private $arr;

    public function __construct($arr = [])
    {
        $this->arr = $arr;
    }

    public function __call($method, $args)
    {
        return Arr::$method($this->arr, ...$args);
    }
}
