<?php

function str($str = null)
{
    return new \Helpers\FluentString($str);
}

function arr($arr = [])
{
    return new \Helpers\FluentArray($arr);
}
