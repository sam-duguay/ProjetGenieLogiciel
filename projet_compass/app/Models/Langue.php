<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    protected $fillable = [
        'nom'
    ];

    public function personnes () {
        return $this ->belongsToMany(Personne::class);
    }
}
