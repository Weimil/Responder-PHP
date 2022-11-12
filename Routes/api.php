<?php

use App\Library\Controllers\BookController;
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

Route::get('/test', [BookController::class, 'get']);
Route::put('/test', [BookController::class, 'put']);
Route::post('/test', [BookController::class, 'post']);
Route::patch('/test', [BookController::class, 'patch']);
Route::delete('/test', [BookController::class, 'delete']);
