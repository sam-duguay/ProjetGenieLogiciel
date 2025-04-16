<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Rencontre extends Pivot
{
    //C'est une table de pivot avec champs, les relations entre les tables sont donc différentes
    protected $fillable = [
        'disponibilite_id',
        'personne_id'
    ];

    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }

    public function disponibilite()
    {
        return $this->belongsTo(Disponibilite::class);
    }


}
