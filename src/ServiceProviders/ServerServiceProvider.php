<?php

namespace Responder\ServiceProviders;

use Responder\Server\PhpServer;
use Responder\Server\Server;

class ServerServiceProvider implements ServiceProvider
{
    public function register()
    {
        singleton(Server::class, PhpServer::class);
    }
}