<?php

namespace App\Library\Services\Book;
    
use Responder\Http\Request;

class BookDeleteService
{
    protected Request $request;
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    // Returns the data deleted
    public function handle(): array
    {
        return [];
    }
}