<?php

use Responder\Database\DataBase;

abstract class Migration
{
    protected string $connection = 'default';
    
    public abstract function create(): void;
    
    public abstract function update(): void;
    
    public abstract function delete(): void;
}

abstract class MigrationExample extends Migration
{
    protected string $connection = 'example';
}

return new class extends MigrationExample
{
    public function create(): void
    {
        DataBase::name('table_name')->create(
            function (Blueprint $table) {
                // Fields
            }
        );
    }
    
    public function update(): void
    {
        DataBase::name('table_name')->update(
            function (Blueprint $table) {
                // Fields
            }
        );
    }
    
    public function delete(): void
    {
        DataBase::name('table_name')->drop();
    }
};
