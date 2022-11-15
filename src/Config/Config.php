<?php

namespace Responder\Config;

class Config
{
    protected static array $config = [];

    public static function loadConfig(string $basePath): void
    {
        $configPath = $basePath . '/Config';

        foreach (array_diff(scandir($configPath), array('.', '..')) as $item) {
            self::$config += require_once $configPath . DIRECTORY_SEPARATOR . $item;
        }
    }

    public static function getConfig(string $string)
    {
        return self::$config[$string];
    }
}
