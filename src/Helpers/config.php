<?php

use Responder\Config\Config;

function config(string $configuration)
{
    return Config::getConfig($configuration);
}

function loadConfig(string $basePath): void
{
    Config::loadConfig($basePath);
}

