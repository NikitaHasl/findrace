<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceType extends Model
{
    use HasFactory;

    protected $table = 'types_of_race';

    protected $guarded = [];

    public function races() {
        return $this->hasMany(Race::class);
    }
}
