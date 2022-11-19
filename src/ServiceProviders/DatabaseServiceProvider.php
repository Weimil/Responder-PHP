<?php

namespace Responder\ServiceProviders;

use Responder\Database\Driver\DatabaseDriver;
use Responder\Database\Driver\PdoDriver;

class DatabaseServiceProvider implements ServiceProvider
{
    public function register(): void
    {
        $databaseDriver = singleton(DatabaseDriver::class, PdoDriver::class);
        $config = config('connections')[config('connections')['default']];
        
        $databaseDriver->connect(
            $config['driver'],
            $config['host'],
            $config['port'],
            $config['database'],
            $config['username'],
            $config['password'],
            $config['options']
        );
    }
}