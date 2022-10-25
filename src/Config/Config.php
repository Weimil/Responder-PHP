<?php

namespace Responder\Config;

class Config
{
    protected static array $config = [];

    public static function loadConfig(string $basePath)
    {
        $configPath = $basePath . '/Config';

        foreach (array_diff(scandir($configPath), array('.', '..')) as $item) {
            if (is_dir($configPath . DIRECTORY_SEPARATOR . $item)) {
                continue;
            }
    
            if (!mb_ereg_match('$\.php', $item)) {
                continue;
            }
    
            $config[] = require_once $item;
        }
    }

    public static function getConfig(string $string)
    {
        return self::$config[$string];
    }
}