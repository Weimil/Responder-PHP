<?php

namespace Responder\Tests\Routing;

use PHPUnit\Framework\TestCase;
use Responder\Http\HttpMethod;
use Responder\Http\Request;
use Responder\Routing\Route;
use Responder\Routing\Router;

class RouterTest extends TestCase
{
    private function mockRequest(string $uri, HttpMethod $method): Request
    {
        $request = new Request();
        
        $request->setUri($uri);
        $request->setHttpMethod($method);
        
        return $request;
    }
    
    public function test_resolve_basic_route_with_callback_action()
    {
        $uri = '/test';
        $action = fn() => "test";
        $router = new Router();
        $router->get(new Route($uri, $action));
        
        $route = $router->resolveRoute($this->mockRequest($uri, HttpMethod::GET));
        
        $this->assertEquals($uri, $route->getUri());
        $this->assertEquals($action, $route->getAction());
    }
    
    public function test_resolve_multiple_basic_routes_with_callback_action()
    {
        $routes = [
            [HttpMethod::GET, '/test', fn () => 'getTest1'],
            [HttpMethod::GET, '/test/test', fn () => 'getTest2'],
            [HttpMethod::GET, '/test/test/test', fn () => 'getTest3'],
        
            [HttpMethod::POST, '/test', fn () => 'postTest1'],
            [HttpMethod::POST, '/test/test', fn () => 'postTest2'],
            [HttpMethod::POST, '/test/test/test', fn () => 'postTest3'],
        
            [HttpMethod::PUT, '/test', fn () => 'putTest1'],
            [HttpMethod::PUT, '/test/test', fn () => 'putTest2'],
            [HttpMethod::PUT, '/test/test/test', fn () => 'putTest3'],
        
            [HttpMethod::PATCH, '/test', fn () => 'pathTest1'],
            [HttpMethod::PATCH, '/test/test', fn () => 'pathTest2'],
            [HttpMethod::PATCH, '/test/test/test', fn () => 'pathTest3'],
        
            [HttpMethod::DELETE, '/test', fn () => 'deleteTest1'],
            [HttpMethod::DELETE, '/test/test', fn () => 'deleteTest2'],
            [HttpMethod::DELETE, '/test/test/test', fn () => 'deleteTest3'],
        ];
    
        $router = new Router();
    
        foreach ($routes as [$method, $uri, $action]) {
            $router->{$method->value}(new Route($uri, $action));
            
            $route = $router->resolveRoute($this->mockRequest($uri, $method));
    
            $this->assertEquals($uri, $route->getUri());
            $this->assertEquals($action, $route->getAction());
        }
    }
}
