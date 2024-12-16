<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }
}
