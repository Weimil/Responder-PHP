<?php

use Responder\Routing\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::prefix('library')->group(function () {
//     Route::prefix('book')->group(function () {
//         Route::get('get', [Controller::class, 'get']);
//     });
//     Route::prefix('books')->group(function () {
//         Route::get('get', [Controller::class, 'get']);
//     });
// });

Route::get('library/book/get', [BookController::class, 'get']);
Route::put('library/book/put', [BookController::class, 'put']);
Route::post('library/book/post', [BookController::class, 'post']);
Route::patch('library/book/patch', [BookController::class, 'patch']);
Route::delete('library/book/delete', [BookController::class, 'delete']);
