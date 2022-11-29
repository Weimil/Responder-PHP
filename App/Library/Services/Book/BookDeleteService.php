<?php

namespace App\Library\Services\Book;
    
use App\Library\Models\BookModel;
use Responder\Http\Request;

class BookDeleteService
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
        
        $model->delete();
        
        return ['code' => '200', 'date' => date("Y-m-d H:m:s")];
    }
}