<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public static function getAllUserRaw()
    {
        return DB::select('SELECT * FROM users');
    }
}
