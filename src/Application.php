<?php

namespace Responder;

use Responder\Config\Config;
use Responder\Http\HttpNoActionFoundException;
use Responder\Http\Response;
use Responder\Http\Request;
use Responder\Routing\Router;
use Responder\Server\ResponderServer;

class Application
{
    const VERSION = '0.0.1';

    protected string $basePath;

    public ResponderServer $responderServer;

    public Router $router;

    public Request $request;

    public Response $response;

    public function __construct(string $basePath)
    {
        $this->basePath = $basePath;
        singleton(self::class);
    }

    public function bootstrap(): void
    {
        $this->loadConfig();
        $this->setHttpHandlers();
        $this->runServiceProviders();
    }

    protected function loadConfig(): void
    {
        Config::loadConfig($this->basePath);
    }

    protected function setHttpHandlers(): void
    {
        $this->responderServer = singleton(ResponderServer::class);
        $this->router = singleton(Router::class);
        $this->request = singleton(Request::class);
        $this->response = singleton(Response::class);
    }

    protected function runServiceProviders(): void
    {
        foreach (config('providers') as $item) {
            (new $item())->registerServices();
        }
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
