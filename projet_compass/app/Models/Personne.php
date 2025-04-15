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

    //Ne fonctionnera pt pas, car il y a une table de pivot avec des champs additionnels
    // public function personnes () {
    //     return $this ->belongsToMany(Disponibilite::class, 'rencontres')
    //                  ->using(Rencontre::class)
    //                  ->withPivot(['date']);
    // }

    public function rencontresPersonne1(){
        return $this->hasMany(Rencontre::class, 'personne1_id');
    }

    public function rencontresPersonne2(){
        return $this->hasMany(Rencontre::class, 'personne2_id');
    }

    //Redonne toutes les rencontres de la personne en question
    public function toutesLesRencontres(){
        return $this->rencontresPersonne1->merge($this->rencontresPersonne2);
    }

    public function hobbies () {
        return $this ->belongsToMany(Hobby::class);
    }

    public function user(){
        return $this ->belongsTo(User::class);
    }
}
