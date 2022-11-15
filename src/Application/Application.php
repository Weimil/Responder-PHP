<?php

namespace Responder\Application;

use Exception;
use Responder\Application\Boot\ApplicationBoot;
use Responder\Config\Config;
use Responder\Http\Request;
use Responder\Http\Response;
use Responder\Routing\Router;
use Responder\Server\Server;

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
            $response = router()->resolveRequest(request());
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
