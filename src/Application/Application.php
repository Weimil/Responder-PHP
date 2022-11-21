<?php

namespace Responder\Application;

use Exception;
use Responder\Application\Boot\ApplicationBoot;
use Responder\Http\Request;
use Responder\Http\Response;

class Application
{
    public string $basePath;
    
    public function boot(string $basePath): void
    {
        $this->basePath = $basePath;
        
        (new ApplicationBoot)->handle();
    }
    
    public function run(): void
    {
        try {
            $response = router()->resolveRequest(singleton(Request::class));
            server()->sendResponse($response);
        } catch (Exception $exception) {
            $response = Response::text("404 Not found\n" . $exception);
            $response->setStatus(404);
            server()->sendResponse($response);
        } finally {
            exit();
        }
    }
}
