<?php

namespace Responder\Application\Boot;

use Responder\Database\Driver\DatabaseDriver;
use Responder\Database\Driver\PdoDriver;
use Responder\Database\Model;
use Responder\Http\Request;
use Responder\Routing\Router;
use Responder\Server\Server;

class ApplicationBoot
{
    public function handle(): void
    {
        $this->loadConfig();
        $this->runServiceProviders();
        $this->setHttpHandlers();
        Model::setDatabaseDriver(singleton(DatabaseDriver::class));
    }
    
    protected function loadConfig(): void
    {
        loadConfig(application()->basePath);
    }
    
    protected function runServiceProviders(): void
    {
        foreach (config('providers') as $item) {
            (new $item())->register();
        }
    }
    
    protected function setHttpHandlers(): void
    {
        singleton(Server::class);
        singleton(Router::class);
        singleton(Request::class, fn () => server()->getRequest());
    }
}