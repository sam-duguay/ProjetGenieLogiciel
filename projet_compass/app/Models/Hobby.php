<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{

    //Puisque hobby ne prend pas juste un "S" à la fin au pluriel
    protected $table = "hobbies";

    protected $fillable = [
        'nom',
        'categorie',
        'description'
    ];

    public function personnes(){
        return $this ->belongsToMany(Personne::class);
    }
}
