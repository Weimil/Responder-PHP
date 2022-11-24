<?php

use Responder\Application\Application;
use Responder\Http\Response;

function application(): Application
{
    return singleton(Application::class);
}

function response(): Response
{
    return singleton(Response::class);
}
