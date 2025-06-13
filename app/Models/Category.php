<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


   // satu kategori -> punya banyak mobil (hasMany)
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}