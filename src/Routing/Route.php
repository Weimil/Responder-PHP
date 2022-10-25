<?php

namespace Responder\Routing;

class Route
{
    public static function load(string $routesDirectory) {
        require_once $routesDirectory . '/api.php';
    }

    public static function get(string $uri, callable|array $action): Route {
        return application()->router->get($uri, $action);
    }

    public static function post(string $uri, callable|array $action): Route {
        return application()->router->post($uri, $action);
    }

    public static function put(string $uri, callable|array $action): Route {
        return application()->router->put($uri, $action);
    }

    public static function patch(string $uri, callable|array $action): Route {
        return application()->router->patch($uri, $action);
    }

    public static function delete(string $uri, callable|array $action): Route {
        return application()->router->delete($uri, $action);
    }    
}
