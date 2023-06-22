<?php

namespace App\Auth\Entities;

use Responder\Database\ORM\Model;

class User extends Model
{
    // ════════════════════════════════════════

    const TABLE = 'users';

    const ID = 'id';

    const NAME = 'name';
    const SURNAME = 'surname';
    const ALIAS = 'alias';
    const EMAIL = 'email';
    const PASSWORD = 'password';

    // ════════════════════════════════════════

    protected string $table = self::TABLE;

    protected string $primaryKey = self::ID;

    protected array $attributes = [
        self::NAME,
        self::SURNAME,
        self::ALIAS,
        self::EMAIL,
        self::PASSWORD => [self::HIDDEN]
    ];

    // ════════════════════════════════════════

    public function roles(): HasOne {
        return $this->hasOne(Roles::class);
    }

    public function roles(): HasMany {
        return $this->hasMany(Roles::class);
    }

    public function roles(): BelongsToOne {
        return $this->belongsToOne(Roles::class);
    }

    public function roles(): BelongsToMany {
        return $this->belongsToMany(Roles::class);
    }

    /*
    (1 - 1)
    School -> Principal
        One School has one Principal.
        One Principal belongs to one School.

    (1 - N)
    Tutorship -> Student
        One Tutorship has many Students.
        Many Student belongs to one Tutorship.

    (N - N)
    Courses -> Student
        Many Courses have many Students.
        Many Students belong to many Courses.
    */
}