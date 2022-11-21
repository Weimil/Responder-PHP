<?php

namespace Responder\Database;

use Exception;
use Responder\Database\Driver\DatabaseDriver;

abstract class Model
{
    protected static DatabaseDriver $driver;
    
    protected string $table;
    
    protected string $primaryKey;
    
    protected array $attributes = [];
    
    protected array $fillables = [];
    
    // ════════════════════════════════════════
    
    public static function setDatabaseDriver(DatabaseDriver $driver): void
    {
        self::$driver = $driver;
    }
    
    public function __get(string $name)
    {
        return $this->attributes[$name] ?? null;
    }
    
    public function __set(string $name, $value): void
    {
        $this->attributes[$name] = $value;
    }
    
    // ════════════════════════════════════════
    
    public function save(): static
    {
        $this->attributes[$this->primaryKey] = uuid();
        $this->attributes['created_at'] = date("Y-m-d H:m:s");
        $this->attributes['updated_at'] = null;
        
        $columns = implode(',', array_keys($this->attributes));
        $values = implode(',', array_fill(0, count($this->attributes), '?'));
        
        self::$driver->statement("INSERT INTO $this->table ($columns) VALUES ($values);", array_values($this->attributes));
        
        return $this;
    }
    
    public function update(): static
    {
        $this->attributes['updated_at'] = date("Y-m-d H:m:s");
        
        $columns = array_keys($this->attributes);
        $preparedSql = implode(",", array_map(fn($column) => "$column = ?", $columns));
        
        $id = $this->attributes[$this->primaryKey];
        
        self::$driver->statement(
            "UPDATE {$this->table} SET {$preparedSql} WHERE {$this->primaryKey} = '{$id}'",
            array_values($this->attributes)
        );
        
        return $this;
    }
    
    public function delete(): static
    {
        $id = $this->attributes[$this->primaryKey];
        
        self::$driver->statement(
            "DELETE FROM {$this->table} WHERE {$this->primaryKey} = '{$id}'"
        );
        
        return $this;
    }
    
    // ════════════════════════════════════════
    
    public static function create(array $attributes): static
    {
        return (new static())->setFillableAttributes($attributes)->save();
    }
    
    public static function all(): array
    {
        $model = new static();
        $result = self::$driver->statement("SELECT * FROM {$model->table}");
        
        $models = [];
        
        for ($i = 0; $i < count($result); $i++){
            $models[] = (new static())->setAllAttributes($result[$i]);
        }
        
        return $models;
    }
    
    public static function first(): ?static
    {
        $model = new static();
        $result = self::$driver->statement("SELECT * FROM {$model->table} LIMIT 1");
        
        if (count($result) === 0) {
            return null;
        }
        
        return $model->setAllAttributes($result[0]);
    }
    
    // ════════════════════════════════════════
    
    protected function setAllAttributes(array $attributes): static
    {
        foreach ($attributes as $key => $value) {
            $this->__set($key, $value);
        }
        
        return $this;
    }
    
    protected function setFillableAttributes(array $attributes): static
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
}