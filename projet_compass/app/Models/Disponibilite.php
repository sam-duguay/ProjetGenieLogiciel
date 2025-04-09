<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disponibilite extends Model
{
    protected $fillable = [
        'jourSemaine',
        'heure'
    ];

    public function personnes () {
        return $this ->belongsToMany(Personne::class, 'rencontres')
                     ->using(Rencontre::class)
                     ->withPivot(['date']);
    }

    // public function personnes () {
    //     return $this ->belongsToMany(Personne::class, 'rencontres')
    //                  ->using(Rencontre::class)
    //                  ->withPivot(['date', 'heure']);
    // }
}
