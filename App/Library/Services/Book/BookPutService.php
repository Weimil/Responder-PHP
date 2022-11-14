<?php

namespace App\Library\Services\Book;

use Responder\Http\Request;

class BookPutService
{
    protected Request $request;
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    // Returns the data updated
    public function handle(): array
    {
        return [];
    }
}