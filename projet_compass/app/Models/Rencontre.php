<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Rencontre extends Pivot
{
    //C'est une table de pivot avec champs, les relations entre les tables sont donc différentes
    protected $fillable = [
        'personne_id',
        'disponiblite_id',
        'date'
    ];


}
