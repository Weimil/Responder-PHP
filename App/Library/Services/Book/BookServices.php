<?php

namespace App\Library\Services\Book;

class BookServices
{
    const SERVICES = [
        'GET' => BookGetService::class,
        'PUT' => BookPutService::class,
        'POST' => BookPostService::class,
        'PATCH' => BookPatchService::class,
        'DELETE' => BookDeleteService::class
    ];
}