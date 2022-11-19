<?php

namespace Responder\Application\Boot;

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