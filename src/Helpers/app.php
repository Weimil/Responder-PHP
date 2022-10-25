<?php

use Responder\Config\Config;
use Responder\Container\Container;

function singleton(string $class = 'none')
{
    return Container::singleton($class);
}

function application()
{
    return singleton(Application::class);
}

function env(string $variable, $default = null)
{
    return $_ENV[$variable] ?? $default;
}
function config(string $configuration)
{
    return Config::getConfig($configuration);
}
