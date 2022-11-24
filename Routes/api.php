<?php

use App\Library\Controllers\BookController;
use Responder\Routing\Route;

 /*
    Route::prefix('library')->group(function () {
         Route::prefix('book')->group(function () {
             Route::get('get', [Controller::class, 'get']);
         });
         Route::prefix('books')->group(function () {
             Route::get('get', [Controller::class, 'get']);
         });
     });
 */
 /*
    Route::prefix('library')->group(function () {
         Route::prefix('book')->group(function () {
             Route::get('get/{id}', [Controller::class, 'get', ['id']]);
             Route::get('get/{?id}', [Controller::class, 'get', ['id']]);
         });
         Route::prefix('books')->group(function () {
             Route::get('get', [Controller::class, 'get']);
         });
     });
 */

Route::get('/create/book/table', [BookController::class, 'table']);
Route::get('/book', [BookController::class, 'get']);
Route::post('/test', [BookController::class, 'post']);
Route::patch('/test', [BookController::class, 'patch']);
Route::delete('/test', [BookController::class, 'delete']);
