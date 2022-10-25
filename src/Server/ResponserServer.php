<?php

namespace Responder\Server;

use Responder\Http\HttpMethod;
use Responder\Http\Request;
use Responder\Http\Response;
use Responder\Server\Server;

class ResponderServer implements Server
{
    /**
     * @inheritDoc
     */
    public function getRequest(): Request
    {
        $request = new Request();
        
        $request->setUri(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
        $request->setHttpMethod(HttpMethod::from($_SERVER["REQUEST_METHOD"]));
        
        return $request;
    }

    /**
     * @inheritDoc
     */
    public function sendResponse(Response $response): void
    {
    }
}
