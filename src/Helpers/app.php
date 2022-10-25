<?php

use Responder\Application;
use Responder\Config\Config;
use Responder\Container\Container;

function singleton(string $class, string|callable|null $build = null)
{
    return Container::singleton($class, $build);
}

function application()
{
    return singleton(Application::class, Application::class);
}

function config(string $configuration)
{
    return Config::getConfig($configuration);
}

function env(string $variable, $default = null)
{
    return $_ENV[$variable] ?? $default;
}
