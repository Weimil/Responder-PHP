<?php

namespace App\Library\Services\Book;

use App\Library\Models\BookModel;
use Responder\Http\Request;

class BookPostService
{
    protected Request $request;
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    public function handle(): array
    {
        $data = $this->request->getBodyData();
    
        BookModel::create([
            BookModel::NAME => $data[BookModel::NAME],
            BookModel::AUTHOR => $data[BookModel::AUTHOR],
            BookModel::PAGES => $data[BookModel::PAGES],
            BookModel::EDITIONS => $data[BookModel::EDITIONS]
        ]);
    
        return ['Done'];
    }
}