<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    // use HasFactory;

    protected $table = "registrations_for_race";

    protected $fillable = [
        'user_id',
        'role_id',
        'status_id',
    ];


}
