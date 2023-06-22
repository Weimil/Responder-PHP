<?php

use Responder\Config\Config;

function config(string $configuration): array
{
    return Config::getConfig($configuration);
}

function loadConfig(string $basePath): void
{
    Config::loadConfig($basePath);
}

