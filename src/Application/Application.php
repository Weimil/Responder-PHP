<?php

namespace Responder\Application;

use Exception;
use Responder\Http\Request;
use Responder\Http\Response;
use Responder\Routing\Router;
use Responder\Server\Server;

class Application
{
    protected string $basePath;
    
    public Router $router;
    
    public Server $server;
    
    public Request $request;
    
    public function run(): void
    {
        try {
            $response = $this->router->resolveRequest($this->request);
            $this->server->sendResponse($response);
        } catch (Exception $exception) {
            $response = Response::text("404 Not found\n" . $exception);
            $response->setStatus(404);
            $this->server->sendResponse($response);
        }
        
        exit();
    }
    
    public function setBasePath(string $basePath): void
    {
        $this->basePath = $basePath;
    }
    
    public function getBasePath(): string
    {
        return $this->basePath;
    }
}
