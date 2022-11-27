<?php

namespace App\Library\Services\Book;

use App\Library\Models\BookModel;
use Responder\Http\Request;

class BookGetService
{
    protected Request $request;
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    public function handle(): array
    {
        $data = [];
        
        foreach (BookModel::all() as $book) {
            $data[] = $book->getAttributes();
        }

        return $data;
    }
}