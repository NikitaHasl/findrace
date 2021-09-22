<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public const USER_ID = 1;
    public const ADMIN_ID = 2;
    public const ORGANIZER_ID = 3;

    public const USER = 'user';
    public const ADMIN = 'admin';
    public const ORGANIZER = 'organizer';

    public static function findByName(string $name) {
        return self::where('role', $name)->first();
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}
