<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'statut',
        'photo',
        'age',
        'sexe'
    ];

    protected $hidden = [
        'id'
    ];

    public function disciplines () {
        return $this ->hasMany(Discipline::class);
    }

    public function programmes () {
        return $this ->hasMany(Programme::class);
    }

    public function langues () {
        return $this ->hasMany(Langue::class);
    }

    public function interets () {
        return $this ->hasMany(Interet::class);
    }

    public function disponibilites () {
        return $this ->hasMany(Disponibilite::class);
    }

    public function rencontres () {
        return $this ->hasMany(Rencontre::class);
    }

    public function hobbies () {
        return $this ->hasMany(Hobby::class);
    }
}
