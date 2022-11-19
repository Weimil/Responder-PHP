<?php

namespace App\Library\Models;

use App\Library\Services\Book\BookServices;
use Responder\Database\Model;

class BookModel extends Model
{
    // ════════════════════════════════════════

    const CONNECTION = 'default';
    
    const TABLE = 'books';

    const ID = 'id';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    // ════════════════════════════════════════

    public function query()
    {
        //
    }
    

}
