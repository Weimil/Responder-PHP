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
        $data = $this->request->getBodyData();
        
        $model = BookModel::wherePrimaryKey($data[BookModel::ID]);
    
        $model->{BookModel::NAME} = $data[BookModel::NAME];
        $model->{BookModel::AUTHOR} = $data[BookModel::AUTHOR];
        $model->{BookModel::PAGES} = $data[BookModel::PAGES];
        $model->{BookModel::EDITIONS} = $data[BookModel::EDITIONS];
        
        $model->update();
    
        return ['code' => '200', 'date' => date("Y-m-d H:m:s")];
    }
}