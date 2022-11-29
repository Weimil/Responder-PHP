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

/*
 * +----------------------------------------------------------------
 * |
 * | A complete CRUD of a model.
 * | For this example I'm using a book, but it could be anything.
 * +----------------------------------------------------------------
 * |
 * | Retrieves a list of Books.
 * | Route::get('/books', [BookController::class, 'getAll']);
 * +----------------------------------------------------------------
 * |
 * | Retrieves the book with id: {id}.
 * | Route::get('/books/{id}', [BookController::class, 'get', ['id']]);
 * +----------------------------------------------------------------
 * |
 * | Creates a new Book.
 * | Route::post('/books', [BookController::class, 'post']);
 * +----------------------------------------------------------------
 * |
 * | Updates the book with id: {id}.
 * | Route::put('/books/{id}', [BookController::class, 'put', ['id']]);
 * +----------------------------------------------------------------
 * |
 * | Partially updates the book with id: {id}.
 * | Route::patch('/books/{id}', [BookController::class, 'patch', ['id']]);
 * +----------------------------------------------------------------
 * |
 * | Deletes the book with id: {id}.
 * | Route::delete('/books/{id}', [BookController::class, 'delete', ['id']]);
 * +----------------------------------------------------------------
*/


// * +----------------------------------------------------------------
// * |
// * | A complete CRUD of a model.
// * | For this example I'm using a book, but it could be anything.
// * +----------------------------------------------------------------
// * |
// * | Retrieves a list of Books.
Route::get('/books', [BookController::class, 'get']);
// * +----------------------------------------------------------------
// * |
// * | Retrieves the book with id: {id}.
// Route::get('/books', [BookController::class, 'get']);
// * +----------------------------------------------------------------
// * |
// * | Creates a new Book.
Route::post('/books', [BookController::class, 'post']);
// * +----------------------------------------------------------------
// * |
// * | Updates the book with id: {id}.
Route::put('/books', [BookController::class, 'put']);
// * +----------------------------------------------------------------
// * |
// * | Partially updates the book with id: {id}.
Route::patch('/books', [BookController::class, 'patch']);
// * +----------------------------------------------------------------
// * |
// * | Deletes the book with id: {id}.
Route::delete('/books', [BookController::class, 'delete']);
// * +----------------------------------------------------------------


Route::post('/books/prepare', [BookController::class, 'prepare']);

//Route::get('/book', [BookController::class, 'get']);
//Route::put('/book', [BookController::class, 'put']);
//Route::post('/test', [BookController::class, 'post']);
//Route::patch('/test', [BookController::class, 'patch']);
//Route::delete('/test', [BookController::class, 'delete']);
