<?php

namespace App\Library\Controllers;

use App\Library\Models\BookModel;
use App\Library\Services\Book\BookDeleteService;
use App\Library\Services\Book\BookGetService;
use App\Library\Services\Book\BookPatchService;
use App\Library\Services\Book\BookPostService;
use App\Library\Services\Book\BookPutService;
use Responder\Base\Controllers\BaseController;
use Responder\Database\Driver\DatabaseDriver;
use Responder\Http\Request;
use Responder\Http\Response;

class BookController extends BaseController
{
    public function table(Request $request): Response
    {
        $driver = singleton(DatabaseDriver::class);
        
        $driver->statement('DROP TABLE IF EXISTS books');
        $driver->statement('
            CREATE TABLE books (
                id VARCHAR(36),
                name VARCHAR(32),
                author VARCHAR(64),
                pages INT,
                editions INT,
                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL
            );
        ');
        
        BookModel::create([
            BookModel::NAME => 'Name-01',
            BookModel::AUTHOR => 'Author-01',
            BookModel::PAGES => 850,
            BookModel::EDITIONS => 3
        ]);
        
        return Response::text('Done');
    }
    
    public function get(Request $request): Response
    {
        return Response::json((new BookGetService($request))->handle());
    }
    
    public function put(Request $request): Response
    {
        return Response::json((new BookPutService($request))->handle());
    }
    
    public function post(Request $request): Response
    {
        return Response::json((new BookPostService($request))->handle());
    }
    
    public function patch(Request $request): Response
    {
        return Response::json((new BookPatchService($request))->handle());
    }
    
    public function delete(Request $request): Response
    {
        return Response::json((new BookDeleteService($request))->handle());
    }
}