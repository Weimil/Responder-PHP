<?php

namespace Responder\Routing\Tests;

use PHPUnit\Framework\TestCase;
use Responder\Http\HttpMethod;
use Responder\Routing\Router;

class RouterTest extends TestCase {
    public function test_resolve_basic_routes_with_get_http_method() {
        $routes = [
            ['/test', fn () => 'test1'],
            ['/test/test', fn () => 'test2'],
            ['/test/test/test', fn () => 'test3'],
        ];

        $router = new Router();

        foreach ($routes as [$uri, $action]) {
            $router->get($uri, $action);
        }

        foreach ($routes as [$uri, $action]) {
            $this->assertEquals($action, $router->resolve($uri, HttpMethod::GET->value));
        }
    }

    public function test_resolve_basic_routes_with_all_http_method() {
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
            $router->{$method->value}($uri, $action);
        }

        foreach ($routes as [$method, $uri, $action]) {
            $this->assertEquals($action, $router->resolve($uri, $method->value));
        }
    }
}