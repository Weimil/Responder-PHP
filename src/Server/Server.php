<?php

namespace Responder\Server;

use Responder\Http\Request;
use Responder\Http\Response;

interface Server
{
    public function getRequest(): Request;

    public function sendResponse(Response $response): void;
}
