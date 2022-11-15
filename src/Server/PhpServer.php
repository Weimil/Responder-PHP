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
        $request->setHeaders(getallheaders());
        $request->setBodyData($this->requestData());
        $request->setQueryParameters($_GET);
    
//        echo json_encode([
//                $request->getUri(),
//                $request->getHeaders(),
//                $request->getBodyData(),
//                $request->getHttpMethod(),
//                $request->getQueryParameters()
//            ]) . ",";

        return $request;
    }

    public function sendResponse(Response $response): void
    {
        $response->prepare();
    
        print $response->getContent();
    }
    
    protected function requestData(): array
    {
        $headers = getallheaders();
        $isJson = isset($headers["Content-Type"]) && $headers["Content-Type"] === "application/json";
        
        if ($isJson) {
            return json_decode(file_get_contents("php://input"), true);
        }
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            return $_POST;
        }
    
        parse_str(file_get_contents("php://input"), $data);
    
        return $data;
    }
}
