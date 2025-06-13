<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'role',
    ];

    // exclude password dan token saat mengembalikan data user
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function booking ()
    {
        return $this->hasMany(Booking::class);
    }

}
