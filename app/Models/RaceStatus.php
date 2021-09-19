<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceStatus extends Model
{
    use HasFactory;

    protected $table = 'statuses_of_race';

    protected $guarded = [];

    public function races() {
        return $this->hasMany(Race::class);
    }
}
