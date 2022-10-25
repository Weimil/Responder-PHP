<?php

namespace App\Example\Entities;

use Responser\Base\Entities\BaseModel;

class User extends BaseModel
{
    // ════════════════════════════════════════

    const TABLE = 'users';

    const ID = 'id';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    // ════════════════════════════════════════

    protected $connection;

    protected $table = self::TABLE;

    protected $primaryKey = self::ID;

    // ════════════════════════════════════════

    public static function query()
    {
        return;
    }
}
