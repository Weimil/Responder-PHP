<?php

namespace Responder\Container;

class Container
{
    public static array $instances = [];

    public static function singleton(string $class, string|callable|null $build = null)
    {
        if (array_key_exists($class, self::$instances)) {
            return self::$instances[$class];
        }

        if (is_null($build)) {
            return self::$instances[$class] = new $class();
        }

        if (is_string($build)) {
            return self::$instances[$class] = new $build();
        }

        if (is_callable($build)) {
            return self::$instances[$class] = $build();
        }
    }
}
