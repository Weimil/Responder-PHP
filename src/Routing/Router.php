<?php

namespace Responder\Routing;

use Responder\Http\HttpMethod;
use Responder\Http\HttpNoActionFoundException;
use Responder\Http\Request;

class Router
{
    protected array $routes = [];

    public function __construct()
    {
        foreach (HttpMethod::cases() as $item) {
            $this->routes[$item->value] = [];
        }
    }

    public function resolve(Request $request)
    {
        // echo json_encode($this->routes, JSON_PRETTY_PRINT) . "\n";

        $method = $request->getHttpMethod()->value;
        $uri = $request->getUri();

        $action = $this->routes[$method][$uri] ?? null;

        if (is_null($action)) {
            throw new HttpNoActionFoundException();
        }

        return $action;
    }

    protected function registerRoute(HttpMethod $httpMethod, Route $route)
    {
        $this->routes[$httpMethod->value][$route->getUri()] = $route->getAction();
    }

    public function get(Route $route)
    {
        $this->registerRoute(HttpMethod::GET, $route);
    }

    public function post(Route $route)
    {
        $this->registerRoute(HttpMethod::POST, $route);
    }

    public function put(Route $route)
    {
        $this->registerRoute(HttpMethod::PUT, $route);
    }

    public function patch(Route $route)
    {
        $this->registerRoute(HttpMethod::PATCH, $route);
    }

    public function delete(Route $route)
    {
        $this->registerRoute(HttpMethod::DELETE, $route);
    }
}
