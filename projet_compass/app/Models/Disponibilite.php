<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disponibilite extends Model
{
    protected $fillable = [
        'date',
        'heure',
        'personne_id'
    ];

    public function personnes () {
        return $this ->belongsTo(Personne::class);
    }

    public function rencontre(){
        return $this->hasOne(Rencontre::class, 'rencontre_id');
    }

}
