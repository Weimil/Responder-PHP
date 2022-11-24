<?php

use Responder\Application\Application;
use Responder\Config\Config;
use Responder\Http\Request;
use Responder\Routing\Router;
use Responder\Server\PhpServer;
use Responder\Server\Server;

$application = singleton(Application::class);

$application->setBasePath(__DIR__ . '/..');

$application->server = singleton(Server::class, PhpServer::class);
$application->router = singleton(Router::class);
$application->request = singleton(Request::class, fn() => $application->server->getRequest());

Config::loadConfig($application->getBasePath());

foreach (config('providers') as $item) {
    (new $item())->register();
}

return $application;

