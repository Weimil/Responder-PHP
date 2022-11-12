<?php

namespace App\Library\Models;

use Responder\Base\Models\BaseModel;

class BookModel extends BaseModel
{
    // ════════════════════════════════════════

    const TABLE = 'books';

    const ID = 'id';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    // ════════════════════════════════════════

    protected string $connection;

    protected string $table = self::TABLE;

    protected string $primaryKey = self::ID;

    // ════════════════════════════════════════

    public function query()
    {
        //
    }
}
