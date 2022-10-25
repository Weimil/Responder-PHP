<?php

namespace Responder\Routing;

use Responder\Http\HttpMethod;
use Responder\Http\HttpNoActionFoundException;
use Responder\Http\Request;

class Router
{
    protected array $routes = [];

    public function __construct() {
        foreach (HttpMethod::cases() as $item) {
            $this->routes[$item->value] = [];
        }
    }

    public function resolve(Request $request) {
        $method = $request->getHttpMethod();
        $uri = $request->getUri();

        $action = $this->routes[$method][$uri] ?? null;

        if (is_null($action)) {
            throw new HttpNoActionFoundException();
        }

        return $action;
    }

    public function get(string $uri, callable $action) {
        $this->routes[HttpMethod::GET->value][$uri] = $action;
    }

    public function post(string $uri, callable $action) {
        $this->routes[HttpMethod::POST->value][$uri] = $action;
    }

    public function put(string $uri, callable $action) {
        $this->routes[HttpMethod::PUT->value][$uri] = $action;
    }

    public function patch(string $uri, callable $action) {
        $this->routes[HttpMethod::PATCH->value][$uri] = $action;
    }

    public function delete(string $uri, callable $action) {
        $this->routes[HttpMethod::DELETE->value][$uri] = $action;
    }
}