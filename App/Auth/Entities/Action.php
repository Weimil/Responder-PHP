<?php

namespace App\Auth\Entities;

use Responder\Database\ORM\Model;

class Action extends Model
{
    // ════════════════════════════════════════

    const TABLE = 'actions';

    const ID = 'id';

    const NAME = 'name';

    // ════════════════════════════════════════

    protected string $table = self::TABLE;

    protected string $primaryKey = self::ID;

    // ════════════════════════════════════════
}