<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    // function static untuk mendapatkan data semua user
    public static function getAll() {
        // Menggunakan raw mysql (query mysql langsung dibantu dengan query builder)
        return DB::select('SELECT * from users'); 
    }

    // function static untuk mendapatkan data user secara spesifik
    // berdasarkan user id
    public static function getById($id) {
        return DB::table('users')->select()->where('id', $id);
    }

    // function static untuk membuat user baru yang menerima satu paramter
    // parameter tersebut adalah data user yang akan dibuat
    public static function create($data) {
        // Menggunakan hanya query builder
        return DB::table('users')->insert($data);
    }

    // function static untuk mengupdate data user berdasarkan user id
    // menerima 2 parameter, id (user id) dan data (data yang diupdate)
    public static function updateById($id, $data) {
        return DB::table('users')->where('id', $id)->update($data);
    }

    // function static untuk menghapus data user
    // berdasarkan user id nya
    public static function deleteById($id) {
        return DB::table('users')->where('id', $id)->delete();
    }
}
