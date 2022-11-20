<?php

namespace Responder\Database;

use Exception;
use Responder\Database\Driver\DatabaseDriver;
use Responder\Database\Driver\PdoDriver;

abstract class Model
{
    protected string $connection;
    
    protected string $table;
    
    protected string $primaryKey;
    
    protected DatabaseDriver $driver;
    
    protected array $attributes = [];
    
    protected array $fillables = [];
    
    public function __construct()
    {
        $this->setDatabaseDriver();
    }
    
    public function setDatabaseDriver(): void
    {
        $this->driver = singleton(DatabaseDriver::class, PdoDriver::class);
    }
    
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
        $columns = implode(',', array_keys($this->attributes));
        $values = implode(',', array_fill(0, count($this->attributes), '?'));
        
        $this->driver->statement("INSERT INTO $this->table ($columns) VALUES ($values);", array_values($this->attributes));
        
        return $this;
    }
    
    /**
     * @throws Exception
     */
    public static function create(array $attributes): static {
        return (new static())->massAssign($attributes)->save();
    }
}