<?php

namespace Responder;

use Responder\Config\Config;
use Responder\Http\HttpNoActionFoundException;
use Responder\Http\Response;
use Responder\Http\Request;
use Responder\Routing\Router;
use Responder\Server\Server;

class Application
{
    const VERSION = '0.0.1';

    protected string $basePath;

    public Server $server;

    public Router $router;

    public Request $request;

    public Response $response;

    public function bootstrap(string $basePath): self
    {
        $this->basePath = $basePath;

        $this->loadConfig();
        $this->runServiceProviders('boot');
        $this->setHttpHandlers();
        $this->runServiceProviders('runtime');

        return $this;
    }

    protected function loadConfig(): void
    {
        Config::loadConfig($this->basePath);
    }

    protected function runServiceProviders(string $type): void
    {
        foreach (config('providers')[$type] as $item) {
            $item = new $item();
            $item->register();
        }
    }

    protected function setHttpHandlers(): void
    {
        $this->server = singleton(Server::class);
        $this->router = singleton(Router::class);
        $this->request = singleton(Request::class);
        $this->response = singleton(Response::class);
    }

    public function run(): void
    {
        try {
            $this->server->sendResponse($this->router->resolve($this->request));
        } catch (HttpNoActionFoundException) {
            http_response_code(404);
        }
    }

    public function getBasePath()
    {
        return $this->basePath;
    }
}
