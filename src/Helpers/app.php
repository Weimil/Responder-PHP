<?php

use Responder\Application\Application;
use Responder\Http\Request;
use Responder\Http\Response;
use Responder\Routing\Router;
use Responder\Server\Server;

function application()
{
    return singleton(Application::class, Application::class);
}

function response()
{
    return singleton(Response::class, Response::class);
}

function request()
{
    return singleton(Request::class);
}

function router()
{
    return singleton(Router::class, Router::class);
}

function server()
{
    return singleton(Server::class, Server::class);
}
