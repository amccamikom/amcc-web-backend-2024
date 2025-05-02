<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return response()->json($users);
    }
    public function show($id)
    {
        $user = DB::table('users')->find($id);
        if (! $user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required',
            'email'        => 'required|email|unique:users',
            'phone_number' => 'required',
            'password'     => 'required',
            'role'         => 'required|in:admin,customer',
        ]);
        $id = DB::table('users')->insertGetId([
            'name'         => $request->name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'password'     => bcrypt($request->password),
            'role'         => $request->role,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);
        return response()->json(['message' => 'User created', 'id' => $id], 201);
    }
    public function update(Request $request, $id)
    {
        // Cari user berdasarkan ID
        $user = DB::table('users')->find($id);

        if (! $user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $data = $request->json()->all() ?: $request->all();

        DB::table('users')->where('id', $id)->update([
            'name'         => $data['name'] ?? $user->name,
            'email'        => $data['email'] ?? $user->email,
            'phone_number' => $data['phone_number'] ?? $user->phone_number,
            'password'     => isset($data['password']) ? bcrypt($data['password']) : $user->password,
            'role'         => $data['role'] ?? $user->role,
            'updated_at'   => Carbon::now(),
        ]);

        // Update data ke database
        DB::table('users')->where('id', $id)->update($data);

        return response()->json(['message' => 'User updated successfully']);
    }
    public function destroy($id)
    {
        $deleted = DB::table('users')->where('id', $id)->delete();
        if (! $deleted) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json(['message' => 'User deleted']);
    }
}
