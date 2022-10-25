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
            echo "-> isNull | {$class} | {$build} |\n";
    
            self::$instances[$class] = new $class();

            echo json_encode(self::$instances, JSON_PRETTY_PRINT) . "\n";

            return self::$instances[$class];
        }

        if (is_string($build)) {
            echo "-> isString | {$class} | {$build} |\n";
                                            
            self::$instances[$class] = new $build();

            echo json_encode(self::$instances, JSON_PRETTY_PRINT) . "\n";

            return self::$instances[$class];
        }

        if (is_callable($build)) {
            return self::$instances[$class] = $build();
        }
    }
}
