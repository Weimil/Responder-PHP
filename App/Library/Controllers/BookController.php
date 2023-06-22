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
    public function prepare(Request $request): Response
    {
        $driver = singleton(DatabaseDriver::class);

        $driver->statement('DROP TABLE IF EXISTS ' . BookModel::TABLE);
        
        $driver->statement('
            CREATE TABLE ' . BookModel::TABLE . '(
                ' . BookModel::ID . ' VARCHAR(36),
                ' . BookModel::NAME . ' VARCHAR(64),
                ' . BookModel::AUTHOR . ' VARCHAR(64),
                ' . BookModel::PAGES . ' INT,
                ' . BookModel::EDITIONS . ' INT,
                ' . BookModel::CREATED_AT . ' TIMESTAMP NULL,
                ' . BookModel::UPDATED_AT . ' TIMESTAMP NULL,
                
                CONSTRAINT PK_Id PRIMARY KEY (' . BookModel::ID . '),
                CONSTRAINT UQ_Author_Name UNIQUE (' . BookModel::NAME . ',' . BookModel::AUTHOR . ')
            );
        ');
        
        BookModel::create([
            BookModel::NAME => 'Book-01',
            BookModel::AUTHOR => 'Author-01',
            BookModel::PAGES => 756,
            BookModel::EDITIONS => 5
        ]);
        
        BookModel::create([
            BookModel::NAME => 'Book-02',
            BookModel::AUTHOR => 'Author-01',
            BookModel::PAGES => 756,
            BookModel::EDITIONS => 5
        ]);
        
        BookModel::create([
            BookModel::NAME => 'Book-01',
            BookModel::AUTHOR => 'Author-02',
            BookModel::PAGES => 429,
            BookModel::EDITIONS => 2
        ]);
        
        return Response::json(['code' => '200', 'date' => date("Y-m-d H:m:s")]);
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