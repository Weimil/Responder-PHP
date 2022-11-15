<?php

namespace Responder\Routing;

use Closure;

class Route
{
    protected string $uri;
    
    protected Closure|array $action;
    
    public function __construct(string $uri, Closure|array $action)
    {
        $this->uri = $uri;
        $this->action = $action;
    }
    
    public static function load(string $routesDirectory): void
    {
        require_once $routesDirectory . '/api.php';
    }
    
    public static function get(string $uri, Closure|array $action): Route
    {
        return router()->get(new Route($uri, $action));
    }
    
    public static function post(string $uri, Closure|array $action): Route
    {
        return router()->post(new Route($uri, $action));
    }
    
    public static function put(string $uri, Closure|array $action): Route
    {
        return router()->put(new Route($uri, $action));
    }
    
    public static function patch(string $uri, Closure|array $action): Route
    {
        return router()->patch(new Route($uri, $action));
    }
    
    public static function delete(string $uri, Closure|array $action): Route
    {
        return router()->delete(new Route($uri, $action));
    }
    
    public function getUri(): string
    {
        return $this->uri;
    }
    
    public function setUri(string $uri): void
    {
        $this->uri = $uri;
    }
    
    public function getAction(): Closure|array
    {
        return $this->action;
    }
    
    public function setAction(Closure|array $action): void
    {
        $this->action = $action;
    }
}
