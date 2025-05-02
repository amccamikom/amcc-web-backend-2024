<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;


class UserController extends Controller
{
    // Function untuk memproses method GET -- Mendapatkan data semua users
    public function index() {
        // Mendapatkan data semua users 
        $users = User::getAll();

        // Memakai UserResource untuk memfilter output json
        return UserResource::collection(collect($users));
    }

    // Function untuk memproses method POST -- Membuat user baru
    public function store(Request $request) {
        // melakukan hashing password dengan bcrypt
        $password = bcrypt($request->password);

        // Membuat user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
            'password' => $password,
        ]);

        // output
        return response()->json([
            'status'  => true,
            'message' => 'User created successfully',
        ]);
    }

    // function untuk memproses method PATCH -- mengupdate beberapa data user
    public function update(Request $request, $id) {
        // memperjelas id menjadi userId
        $userId = $id;

        // Melakukan update user berdasarkan user id
        User::updateById($userId, [
            'name' => $request->name,
            'phone_number' => $request->phone_number,
        ]);

        // output
        return response()->json([
            'status'  => true,
            'message' => 'User updated successfully',
        ]);
    }

    // function untuk memproses method DELETE -- menghapus user berdasarkan user id
    public function destroy($id) {
        // memperjelas id menjadi userId
        $userId = $id;

        // menghapus user berdasarkan id
        User::deleteById($userId);

        // output
        return response()->json([
            'status'  => true,
            'message' => 'User successfully deleted',
        ]);
    }
}
