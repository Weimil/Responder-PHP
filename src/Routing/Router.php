<?php

namespace Responder\Routing;

use App\Library\Controllers\BookController;
use Responder\Http\HttpMethod;
use Responder\Http\HttpNoActionFoundException;
use Responder\Http\Request;
use Responder\Http\Response;

class Router
{
    protected array $routes = [];

    public function __construct()
    {
        foreach (HttpMethod::cases() as $item) {
            $this->routes[$item->value] = [];
        }
    }

    // ==============

    public function resolveRequest(Request $request): Response
    {
        $route = $this->resolveRoute($request);
        $request->setRoute($route);
        $action = $route->getAction();

        return $action();
    }

    // ==============

    protected function resolveRoute(Request $request): Route
    {
        foreach ($this->routes[$request->getHttpMethod()->value] as $route) {
            if ($request->getUri() === $route->getUri()) {
                echo json_encode(
                    [
                        $route->getUri(),
                        $route->getAction()
                    ],
                    JSON_PRETTY_PRINT
                ) . "\n";
                return $route;
            }
        }

        throw new HttpNoActionFoundException();
    }

    protected function registerRoute(HttpMethod $httpMethod, Route $route): Route
    {
        return $this->routes[$httpMethod->value][] = $route;
    }

    // ==============

    public function get(Route $route): Route
    {
        return $this->registerRoute(HttpMethod::GET, $route);
    }

    public function post(Route $route): Route
    {
        return $this->registerRoute(HttpMethod::POST, $route);
    }

    public function put(Route $route): Route
    {
        return $this->registerRoute(HttpMethod::PUT, $route);
    }

    public function patch(Route $route): Route
    {
        return $this->registerRoute(HttpMethod::PATCH, $route);
    }

    public function delete(Route $route): Route
    {
        return $this->registerRoute(HttpMethod::DELETE, $route);
    }
}
