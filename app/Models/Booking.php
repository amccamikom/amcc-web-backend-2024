<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';

    protected $guarded = [
        'id'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
