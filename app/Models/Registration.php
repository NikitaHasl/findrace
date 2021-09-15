<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Registration extends Model
{
    use HasFactory;

    protected $table = "registrations_for_race";

    protected $fillable = [
        'user_id',
        'role_id',
        'status_id',
    ];


}
