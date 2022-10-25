# Trash

Some trash from the old index.php

```php
use Responder\Http\HttpNoActionFoundException;
use Responder\Routing\Route;
use Responder\Routing\Router;
use Responder\App;

App::bootstrap()->run();

Route::get('/route_get', fn () => 'GET OKAY');

$router = new Router();

$router->get('/test', function () {
    return "GET OK";
});

$router->post('/test', function () {
    return "POST OK";
});

try {
    $action = $router->resolve($_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]);
    print($action());
} catch (HttpNoActionFoundException $e) {
    print("Not found");
    http_response_code(404);
}

```
