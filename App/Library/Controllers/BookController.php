<?php

namespace App\Library\Controllers;

use App\Library\Resources\BookResource;
use App\Library\Services\Book\BookGetService;
use Responder\Base\Controllers\BaseController;
use Responder\Http\Response;

class BookController extends BaseController
{
    public function get(): Response
    {
        return Response::json(['Result -> GET']);
//        return response()->json(new BookResource($service->handle()), self::HTTP_CODE_CREATED);
    }

    public function put(): Response
    {
        return Response::json(['Result -> PUT']);
    }

    public function post(): Response
    {
        return Response::json(['Result -> POST']);
    }

    public function patch(): Response
    {
        return Response::json(['Result -> PATCH']);
    }

    public function delete(): Response
    {
        return Response::json(['Result -> DELETE']);
    }
}