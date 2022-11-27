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
        
        //        echo $this->requestDebug($request);
        
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
    
    protected function requestDebug(Request $request): string
    {
        $text['Path'] = $request->getUri();
        $text['Headers'] = $request->getHeaders();
        $text['Body'] = $request->getBodyData();
        $text['HttpMethod'] = $request->getHttpMethod();
        $text['QueryParameters'] = $request->getQueryParameters();
        
        if (array_key_exists('Authorization', $request->getHeaders())) {
            
            $encodedData = preg_replace('/Basic/', '', $request->getHeaders()['Authorization']);
            $decodedData = base64_decode($encodedData);
            $auth = explode(':', $decodedData);
            
            if ($auth !== ['']) {
                $text['Auth'] = [
                    'User' => $auth[0],
                    'Password' => $auth[1]
                ];
            }
        }
        
        return json_encode([$text]) . ',';
    }
}
