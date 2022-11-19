<?php

namespace Responder\Database;

use Exception;

abstract class Model
{
    const CONNECTION = 'null';
    
    const TABLE = 'null';
    
    const ID = 'null';
    
    protected string $connection = self::CONNECTION;
    
    protected string $table = self::TABLE;
    
    protected string $primaryKey = self::ID;
    
    protected array $attributes = [];
    
    protected array $fillables = [];
    
    public function __set(string $name, $value): void
    {
        $this->attributes[$name] = $value;
    }
    
    public function __get(string $name)
    {
        return $this->attributes[$name] ?? null;
    }
    
    /**
     * @throws Exception
     */
    protected function massAssign(array $attributes): static
    {
        if (count($this->fillables) === 0) {
            throw new Exception();
        }
        
        foreach ($attributes as $key => $value) {
            if (in_array($key, $this->fillables)) {
                $this->__set($key, $value);
            }
        }
        
        return $this;
    }
    
    public function save(): static
    {
        
        
        return $this;
    }
    
    /**
     * @throws Exception
     */
    public static function create(array $attributes): static {
        return (new static())->massAssign($attributes)->save();
    }
}