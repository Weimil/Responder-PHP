<?php

namespace Responder\Container;

class Container
{
    protected static array $instances = [];
    
    public static function singleton(string $class, string|callable|null $build = null): mixed
    {
        if (array_key_exists($class, self::$instances)) {
            return self::$instances[$class];
        }
        
        match (true) {
            is_null($build) => self::$instances[$class] = new $class(),
            is_string($build) => self::$instances[$class] = new $build(),
            is_callable($build) => self::$instances[$class] = $build()
        };
        
        return self::$instances[$class];
    }
    
    public static function remove(string $class): void
    {
        if (array_key_exists($class, self::$instances)){
            unset(self::$instances[$class]);
        }
    }
}
