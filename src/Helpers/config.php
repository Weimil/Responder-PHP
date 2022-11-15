<?php

use Responder\Config\Config;

function config(string $configuration)
{
    return Config::getConfig($configuration);
}

function loadConfig(string $configuration)
{
    return Config::getConfig($configuration);
}

