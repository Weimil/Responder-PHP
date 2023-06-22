<?php

namespace Responder\ServiceProviders;

use Responder\Routing\Route;

class RouteServiceProvider implements ServiceProvider
{
    public function register(): void
    {
        Route::load(application()->getBasePath() . '/Routes');
    }
}
