<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use RTippin\Messenger\Contracts\MessengerProvider;
use RTippin\Messenger\Traits\Messageable;

class User extends Authenticatable implements MessengerProvider
{
    use HasFactory, Notifiable;
    use Messageable;

    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function personne()
    {
        return $this->hasOne(Personne::class, 'user_id');
    }

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
