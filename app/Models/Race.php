<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'datetime',
    ];

    protected $guarded = [];

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function type() {
        return $this->belongsTo(RaceType::class, 'type_of_race_id');
    }
}
