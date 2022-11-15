<?php

use Responder\Container\Container;

function singleton(string $class, string|callable|null $build = null)
{
    return Container::singleton($class, $build);
}
