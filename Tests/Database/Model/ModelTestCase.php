<?php

namespace Responder\Tests\Database\Model;

use PHPUnit\Framework\TestCase;
use Responder\Database\Driver\DatabaseDriver;
use Responder\Database\Driver\PdoDriver;
use Responder\Database\Model;

class ModelTestCase extends TestCase
{
    protected function setUp(): void
    {
        Model::setDatabaseDriver(singleton(DatabaseDriver::class, PdoDriver::class));
    
        $this->driver = singleton(DatabaseDriver::class);
    
        $this->driver->connect(
            'mysql',
            '127.0.0.1',
            33060,
            'testing',
            'weimil',
            'Aa1.1234'
        );
    
        $this->driver->statement('DROP TABLE IF EXISTS models');
        $this->driver->statement('
            CREATE TABLE models(
                id VARCHAR(36),
                name VARCHAR(32),
                surname VARCHAR(64),
                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL
            );
        ');
    }
}
