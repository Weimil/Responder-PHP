<?php

use Responser\Base\Controllers\BaseController;

class BookController extends BaseController
{
    public function get()
    {
        return 'GET OKAY';
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