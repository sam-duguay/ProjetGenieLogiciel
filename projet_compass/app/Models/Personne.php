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
        'sexe',
        'discipline_id',
        'user_id'
    ];

    public function disciplines () {
        return $this ->belongsTo(Discipline::class);
    }

    public function langues () {
        return $this ->belongsToMany(Langue::class);
    }

    public function interets () {
        return $this ->belongsToMany(Interet::class);
    }


    public function hobbies () {
        return $this ->belongsToMany(Hobby::class);
    }

    public function user(){
        return $this ->belongsTo(User::class);
    }

    public function disponibilites(){
        return $this->hasMany(Disponibilite::class);
    }
}
