<?php

namespace Helpers;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class FluentString
{
    private $str;
    private $ignoreCasing;

    public function __construct($str = null)
    {
        $this->str = $str;
        $this->ignoreCasing = false;
    }

    public function ignoreCasing()
    {
        $this->ignoreCasing = true;

        return $this;
    }

    public function __call($method, $oargs)
    {
        $str = $this->str;
        $args = $oargs;

        if ($str) {
            if ($this->ignoreCasing) {
                $str = strtolower($str);
                $args = [];

                foreach ($oargs as $arg) {
                    if (is_string($arg)) {
                        $arg = strtolower($arg);
                    }

                    $args[] = $arg;
                }
            }

            $args = Arr::prepend($args, $str);
        }

        return Str::$method(...$args);
    }
}
