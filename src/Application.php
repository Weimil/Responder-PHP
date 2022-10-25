<?php

namespace Responder;

use Responder\Config\Config;
use Responder\Http\HttpNoActionFoundException;
use Responder\Http\Response;
use Responder\Http\Request;
use Responder\Routing\Router;
use Responder\Server\PhpServer;
use Responder\Server\Server;

class Application
{
    const VERSION = '0.0.1';

    protected string $basePath;

    public Server $server;

    public Router $router;

    public Request $request;

    public Response $response;

    public function __construct()
    {
        //
    }

    public function bootstrap(string $basePath): self
    {
        $app = singleton(self::class);

        $app->basePath = $basePath;

        return $app
            ->loadConfig()
            ->runServiceProviders('boot')
            ->setHttpHandlers()
            ->runServiceProviders('runtime');
    }

    protected function loadConfig(): self
    {
        Config::loadConfig($this->basePath);

        return $this;
    }

    protected function runServiceProviders(string $type): self
    {
        foreach (config('providers')[$type] as $item) {
            $item = new $item();
            $item->register();
        }

        return $this;
    }

    protected function setHttpHandlers(): self
    {
        $this->server = singleton(Server::class);
        $this->router = singleton(Router::class);
        $this->request = singleton(Request::class);
        $this->response = singleton(Response::class);

        return $this;
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
