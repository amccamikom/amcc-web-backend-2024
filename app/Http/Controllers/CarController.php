<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public static function getAllCarRaw()
    {
        return DB::select('SELECT * FROM cars');
    }
}
