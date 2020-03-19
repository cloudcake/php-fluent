<?php

namespace Helpers;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class FluentString
{
    private $str;
    private $produce;
    private $ignoreCasing;

    public function __construct($str = null)
    {
        $this->str = $str;
        $this->produce = 1;
        $this->ignoreCasing = false;
    }

    public function ignoreCasing()
    {
        $this->ignoreCasing = true;

        return $this;
    }

    public function produce($count)
    {
        $this->produce = $count;

        return $this;
    }

    private function getArgsAsLowercase($oargs)
    {
        $args = [];

        foreach ($oargs as $arg) {
            if (is_string($arg)) {
                $arg = strtolower($arg);
            }

            $args[] = $arg;
        }

        return $args;
    }

    public function __call($method, $oargs)
    {
        $str = $this->str;
        $args = $oargs;

        if ($str) {
            if ($this->ignoreCasing) {
                $str = strtolower($str);
                $args = $this->getArgsAsLowercase($oargs);
            }

            $args = Arr::prepend($args, $str);
        }

        if ($this->produce < 2) {
            return $this->bridge($method, $args);
        }

        $results = [];

        for ($i = 0; $i < $this->produce; $i++) {
            $result = $this->bridge($method, $args);

            if (method_exists($result, '__toString')) {
                $result = $result->__toString();
            }

            $results[] = $result;
        }

        return $results;
    }

    private function bridge($method, $args)
    {
        return Str::$method(...$args);
    }
}
