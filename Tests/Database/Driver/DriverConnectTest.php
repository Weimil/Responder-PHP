<?php

namespace Responder\Tests\Database\Driver;

use PHPUnit\Framework\TestCase;
use Responder\Database\Driver\DatabaseDriver;
use Responder\Database\Driver\PdoDriver;

class DriverConnectTest extends TestCase
{
    public function test_driver_connect()
    {
        $driver = singleton(DatabaseDriver::class, PdoDriver::class);
    
        $driver->connect(
            'mysql',
            '127.0.0.1',
            33060,
            'testing',
            'weimil',
            'Aa1.1234',
        );
    
        // TODO: \*/
        $this->assertTrue(true);
    }
}
