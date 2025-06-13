<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'color', 'status', 'seat', 'cc', 'top_speed',
        'description', 'location', 'imageUrl', 'category_id',
    ];

    // satu mobil -> milik satu kategori (belongsTo)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

   
    // satu mobil -> punya banyak booking (hasMany)  
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}