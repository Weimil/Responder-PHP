# Responder Routes

Some code snippets and what the result.

Example for all HTTP Verbs:

```md
GET     http://example.com/users
POST    http://example.com/users
PUT     http://example.com/users/{id}
PATCH   http://example.com/users/{id}
DELETE  http://example.com/users/{id}
```

```php
Route::group(function () {
    Route::get('users', [UserController::class, 'get']);
    Route::post('users', [UserController::class, 'post']);
    Route::put('users/{id}', [UserController::class, 'put', ['id']]);
    Route::patch('users/{id}', [UserController::class, 'patch', ['id']]);
    Route::delete('users/{id}', [UserController::class, 'delete', ['id']]);
});

```

Example for all HTTP Verbs with nested paths:

```md
GET     http://example.com/prefix/users
POST    http://example.com/prefix/users
PUT     http://example.com/prefix/users/{id}
PATCH   http://example.com/prefix/users/{id}
DELETE  http://example.com/prefix/users/{id}
```

```php
Route::group(function () {
    Route::prefix('prefix')->group(function () {
        Route::get('users', [UserController::class, 'get']);
        Route::post('users', [UserController::class, 'post']);
        Route::put('users/{id}', [UserController::class, 'put', ['id']]);
        Route::patch('users/{id}', [UserController::class, 'patch', ['id']]);
        Route::delete('users/{id}', [UserController::class, 'delete', ['id']]);
    });
});

```

Example for all HTTP Verbs with nested paths that require being authenticated:

```md
GET     http://example.com/prefix/users
POST    http://example.com/prefix/users
PUT     http://example.com/prefix/users/{id}
PATCH   http://example.com/prefix/users/{id}
DELETE  http://example.com/prefix/users/{id}
```

```php
Route::middleware('auth')->group(function () {
    Route::prefix('prefix')->group(function () {
        Route::get('users', [UserController::class, 'get']);
        Route::post('users', [UserController::class, 'post']);
        Route::put('users/{id}', [UserController::class, 'put', ['id']]);
        Route::patch('users/{id}', [UserController::class, 'patch', ['id']]);
        Route::delete('users/{id}', [UserController::class, 'delete', ['id']]);
    });
});

```
