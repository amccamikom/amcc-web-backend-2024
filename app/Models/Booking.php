<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'car_id', 'fullname', 'email', 'number_phone',
        'start_date', 'end_date',
    ];

    
    // satu booking -> milik satu user (belongsTo)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   
    //satu booking -> milik satu mobil (belongsTo)
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    //satu booking -> punya satu transaksi (hasOne)
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}