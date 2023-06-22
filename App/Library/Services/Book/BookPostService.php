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
    
        $model = new BookModel();
        
        $model->{BookModel::NAME} = $data[BookModel::NAME];
        $model->{BookModel::AUTHOR} = $data[BookModel::AUTHOR];
        $model->{BookModel::PAGES} = $data[BookModel::PAGES];
        $model->{BookModel::EDITIONS} = $data[BookModel::EDITIONS];
    
        $model->save();
        
        return ['code' => '200', 'date' => date("Y-m-d H:m:s")];
    }
}