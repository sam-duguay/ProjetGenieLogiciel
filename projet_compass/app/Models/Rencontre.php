<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Rencontre extends Pivot
{
    //C'est une table de pivot avec champs, les relations entre les tables sont donc différentes
    protected $fillable = [
        'personne1_id',
        'personne2_id',
        'disponiblite_id'
    ];

    public function personne1()
    {
        return $this->belongsTo(Personne::class, 'personne1_id');
    }

    public function personne2()
    {
        return $this->belongsTo(Personne::class, 'personne2_id');
    }

    public function disponibilite()
    {
        return $this->belongsTo(Disponibilite::class);
    }


}
