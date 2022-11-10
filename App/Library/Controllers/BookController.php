<?php

namespace App\Library\Controllers;

use App\Library\Resources\BookResource;
use App\Library\Services\Book\BookGetService;
use Responder\Base\Controllers\BaseController;

class BookController extends BaseController
{
    public function get(BookGetService $service)
    {
        return response()->json(new BookResource($service->handle()), self::HTTP_CODE_CREATED);
    }

    public function put()
    {
        return 'PUT OKAY';
    }

    public function post()
    {
        return 'POST OKAY';
    }

    public function patch()
    {
        return 'PATCH OKAY';
    }

    public function delete()
    {
        return 'DELETE OKAY';
    }
}