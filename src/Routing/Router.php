<?php

namespace Responder\Routing;

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
    
    /**
     * @throws HttpNoActionFoundException
     */
    public function resolveRequest(Request $request): Response
    {
        $route = $this->resolveRoute($request);
        $action = $route->getAction();
        
        if (is_array($action)) {
            $action[0] = new $action[0]();
        }
        
        return $action($request);
    }
    
    /**
     * @throws HttpNoActionFoundException
     */
    public function resolveRoute(Request $request): Route
    {
        foreach ($this->routes[$request->getHttpMethod()->value] as $route) {
            if ($request->getUri() === $route->getUri()) {
                return $route;
            }
        }
        
        throw new HttpNoActionFoundException();
    }
    
    // ==============
    
    protected function registerRoute(HttpMethod $httpMethod, Route $route): Route
    {
        return $this->routes[$httpMethod->value][] = $route;
    }
    
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
