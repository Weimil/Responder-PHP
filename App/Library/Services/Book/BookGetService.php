<?php

namespace App\Library\Services\Book;

use App\Library\Models\BookClass;
use Responder\Http\Request;

class BookGetService
{
    protected Request $request;
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    // Returns the data requested
    public function handle(): array
    {
        return [
            new BookClass('Name-01', 'Author-01', 850, 3),
            new BookClass('Name-02', 'Author-02', 540, 6),
            new BookClass('Name-03', 'Author-03', 5257, 1)
        ];
    }
}