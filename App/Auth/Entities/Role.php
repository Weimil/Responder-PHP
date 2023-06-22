<?php

namespace App\Auth\Entities;

use Responder\Database\ORM\Model;

class Role extends Model
{
    // ════════════════════════════════════════

    const TABLE = 'roles';

    const ID = 'id';

    const NAME = 'name';

    // ════════════════════════════════════════

    protected string $table = self::TABLE;

    protected string $primaryKey = self::ID;

    protected array $attributes = [
        self::NAME => [self::FILLABLE]
    ];

    // ════════════════════════════════════════
}