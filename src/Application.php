<?php

namespace Responder;

use Exception;
use Responder\Config\Config;
use Responder\Http\Request;
use Responder\Http\Response;
use Responder\Routing\Router;
use Responder\Server\Server;

class Application
{
    protected string $basePath;

    public Server $server;

    public Router $router;

    public Request $request;

    public Response $response;

    public function boot(string $basePath): void
    {
        $this->basePath = $basePath;

        $this->loadConfig();
        $this->runServiceProviders('boot');
        $this->setHttpHandlers();
        $this->runServiceProviders('runtime');
    }

    protected function loadConfig(): void
    {
        Config::loadConfig($this->basePath);
    }

    protected function runServiceProviders(string $type): void
    {
        foreach (config('providers')[$type] as $item) {
            (new $item())->register();
        }
    }

    protected function setHttpHandlers(): void
    {
        $this->server = singleton(Server::class);
        $this->router = singleton(Router::class);
        $this->request = singleton(Request::class, fn () => $this->server->getRequest());
    }


    public function run(): void
    {
        try {
            $response = $this->router->resolveRequest($this->request);
            $this->terminate($response);
        } catch (Exception $exception) {
            $response = Response::text("404 Not found\n" . $exception);
            $response->setStatus(404);
            $this->terminate($response);
        }
    }
    
    protected function terminate(Response $response): void
    {
        $this->server->sendResponse($response);
        exit();
    }
    
    public function getBasePath(): string
    {
        return $this->basePath;
    }
}
