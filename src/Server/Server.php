<?php

namespace Responder\Server;

use Responder\Http\Request;
use Responder\Http\Response;

interface Server {
    /**
     * Get the request sended by the client.
     *
     * @return Request
     */
    public function getRequest(): Request;

    /**
     * Send the response to the client.
     *
     * @param Response $response
     * @return void
     */
    public function sendResponse(Response $response): void;
}