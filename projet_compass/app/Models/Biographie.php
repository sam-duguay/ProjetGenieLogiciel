<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biographie extends Model
{
    protected $fillable = [
        'personne_id',
        'bio'
    ];

    public function Personne() {
        return $this->hasOne(Personne::class);
    }

}
