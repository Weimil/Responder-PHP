<?php

return [
    'providers' => [
        'boot' => [
            Responder\ServiceProviders\ServerServiceProvider::class
        ],
        'runtime' => [
            Responder\ServiceProviders\RouteServiceProvider::class
        ]
    ]
];
