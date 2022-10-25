<?php

use Responder\Application;

/*
    ╔══════════════════════════════════════════════════════════════════════════════╗
    ║  Create The Application                                                      ║
    ╠══════════════════════════════════════════════════════════════════════════════╣
    ║                                                                              ║
    ║   The first thing we will do is create a new Responder application           ║
    ║   instance which is the root of Responder, every thing in controlled         ║
    ║   by it. The application is a singleton because only one application         ║
    ║   can be running at the same time.                                           ║
    ║                                                                              ║
    ╚══════════════════════════════════════════════════════════════════════════════╝
*/

$application = new Application($_ENV['APP_BASE_PATH'] ?? dirname(__DIR__ . '/..'));

$application->bootstrap();

return $application;