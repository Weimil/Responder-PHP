<?php

namespace Responder\Server;

use Responder\Http\HttpMethod;
use Responder\Http\Request;
use Responder\Http\Response;

class PhpServer implements Server
{
    public function getRequest(): Request
    {
        $request = new Request();

        $request->setUri(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
        $request->setHttpMethod(HttpMethod::from($_SERVER["REQUEST_METHOD"]));

        return $request;
    }

    public function sendResponse(Response $response): void
    {
        header("Content-Type: None");
        header_remove("Content-Type");

        $response->prepare();
        http_response_code($response->getStatus());
        foreach ($response->getHeaders() as $header => $value) {
            header("$header: $value");
        }
        print($response->getContent());

    }
}
