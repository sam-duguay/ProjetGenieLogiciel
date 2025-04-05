<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $fillable = [
        'nom'
    ];


    public function personnes() {
        return $this->hasMany(Personne::class);
    }
}
