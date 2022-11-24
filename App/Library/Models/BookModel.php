<?php

namespace App\Library\Models;

use Responder\Database\Model;

class BookModel extends Model
{
    // ════════════════════════════════════════
    
    const TABLE = 'books';
    
    const ID = 'id';
    
    const NAME = 'name';
    
    const AUTHOR = 'author';
    
    const PAGES = 'pages';
    
    const EDITIONS = 'editions';
    
    const CREATED_AT = 'created_at';
    
    const UPDATED_AT = 'updated_att';
    
    // ════════════════════════════════════════
    
    protected string $table = self::TABLE;
    
    protected string $primaryKey = self::ID;
    
    protected array $fillables = [
        self::NAME,
        self::AUTHOR,
        self::PAGES,
        self::EDITIONS
    ];
    
    // ════════════════════════════════════════
}
