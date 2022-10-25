<?php

namespace App\Library\Models;

use Responser\Base\Models\BaseModel;

class BookModel extends BaseModel
{
    // ════════════════════════════════════════

    const TABLE = 'books';

    const ID = 'id';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    // ════════════════════════════════════════

    protected $connection;

    protected $table = self::TABLE;

    protected $primaryKey = self::ID;

    // ════════════════════════════════════════

    public function query()
    {
        //
    }
}
