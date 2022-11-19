<?php

namespace Responder\ServiceProviders;

use Responder\Server\PhpServer;
use Responder\Server\Server;

class ServerServiceProvider implements ServiceProvider
{
    public function register(): void
    {
        singleton(Server::class, PhpServer::class);
    }
}
