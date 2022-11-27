<?php

namespace App\Library\Services\Book;

use App\Library\Models\BookModel;
use Responder\Http\Request;

class BookPutService
{
    protected Request $request;
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    public function handle(): array
    {

    }
}