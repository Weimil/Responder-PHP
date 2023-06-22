<?php

namespace Responder\Application;

use Exception;
use PDOException;
use Responder\Http\HttpNoActionFoundException;
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
        } catch (PDOException $e) {
            $response = Response::error("403 SQL Error | " . $e->getMessage());
        } catch (HttpNoActionFoundException $e) {
            $response = Response::error("405 End point unknown | " . $e->getMessage());
        } catch (Exception $e) {
            $response = Response::error("404 Not found | " . $e->getMessage());
        }
        
        $this->server->sendResponse($response);
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
