<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'statut',
        'photo',
        'age',
        'sexe'
    ];
}
