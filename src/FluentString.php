<?php

namespace Helpers;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class FluentString
{
    private $str;

    public function __construct($str = null)
    {
        $this->str = $str;
    }

    public function __call($method, $args)
    {
        if ($this->str) {
            $args = Arr::prepend($args, $this->str);
        }

        return Str::$method(...$args);
    }
}
