<?php

namespace Responder\Config;

class Config
{
    protected static array $config = [];

    public static function loadConfig(string $basePath): void
    {
        $configPath = $basePath . '/Config';

        foreach (array_diff(scandir($configPath), array('.', '..')) as $item) {
            if (is_dir($configPath . DIRECTORY_SEPARATOR . $item)) {
                continue;
            }

            $values = require_once $configPath . DIRECTORY_SEPARATOR . $item;
            self::$config += $values;
        }
    }

    public static function getConfig(string $string)
    {
        return self::$config[$string];
    }
}
