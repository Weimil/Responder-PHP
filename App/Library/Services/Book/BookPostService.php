<?php

namespace App\Library\Services\Book;

use Responder\Http\Request;

class BookPostService
{
    protected Request $request;
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    // Returns the data inserted
    public function handle(): array
{
    return [];
}
}