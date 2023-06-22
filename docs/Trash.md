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

```php
$driver->statement('
    CREATE TABLE ' . BookModel::TABLE . '(
        ' . BookModel::ID . ' VARCHAR(36),
        ' . BookModel::AUTHOR_ID . ' VARCHAR(36),
        ' . BookModel::NAME . ' VARCHAR(64),
        ' . BookModel::PAGES . ' INT,
        ' . BookModel::EDITIONS . ' INT,
        ' . BookModel::CREATED_AT . ' TIMESTAMP NULL,
        ' . BookModel::UPDATED_AT . ' TIMESTAMP NULL,

        CONSTRAINT PK_Id PRIMARY KEY (' . BookModel::ID . '),
        CONSTRAINT FK_Author FOREIGN KEY (' . BookModel::AUTHOR_ID . ') REFERENCES ' . AuthorModel::TABLE . '(' . AuthorModel::ID . '),
        CONSTRAINT UQ_Author_Name UNIQUE (' . BookModel::NAME . ',' . BookModel::AUTHOR . ')
    );
');
```


