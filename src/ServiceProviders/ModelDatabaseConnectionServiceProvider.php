<?php

namespace Responder\ServiceProviders;

use Responder\Database\Driver\DatabaseDriver;
use Responder\Database\Model;

class ModelDatabaseConnectionServiceProvider implements ServiceProvider
{
    public function register(): void
    {
        Model::setDatabaseDriver(singleton(DatabaseDriver::class));
    }
}