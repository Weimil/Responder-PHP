<?php

namespace App\Library\Controllers;

use App\Library\Services\Book\BookDeleteService;
use App\Library\Services\Book\BookGetService;
use App\Library\Services\Book\BookPatchService;
use App\Library\Services\Book\BookPostService;
use App\Library\Services\Book\BookPutService;
use Responder\Base\Controllers\BaseController;
use Responder\Http\Request;
use Responder\Http\Response;

class BookController extends BaseController
{
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