<?php

namespace Responder\Container;

class Container
{
    public static $instances = [];

    protected function __construct()
    {
    }

    public static function singleton(string $class)
    {
        if (array_key_exists($class, self::$instances)) {
            return self::$instances[$class];
        }

        if ($class === 'none') {
            return null;
        }

        self::$instances[] = new $class();
        return self::$instances[$class];
    }
}
