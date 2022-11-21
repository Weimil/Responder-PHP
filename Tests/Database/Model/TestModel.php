<?php

namespace Responder\Tests\Database\Model;

use Responder\Database\Model;

class TestModel extends Model
{
    // ════════════════════════════════════════
    
    const TABLE = 'models';
    
    const ID = 'id';
    
    const NAME = 'name';
    
    const SURNAME = 'surname';
    
    const CREATED_AT = 'created_at';
    
    const UPDATED_AT = 'updated_att';
    
    // ════════════════════════════════════════
    
    protected string $table = self::TABLE;
    
    protected string $primaryKey = self::ID;
    
    protected array $fillables = [
        self::NAME,
        self::SURNAME
    ];
    
    // ════════════════════════════════════════
}