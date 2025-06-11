<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    public static function booted()
    {
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = 'MB' . Str::upper(Str::random(10));
            }
        });
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
