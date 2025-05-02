<?php
namespace App\Http\Controllers;

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
        ]);
        return response()->json(['message' => 'User created', 'id' => $id], 201);
    }
    public function update(Request $request, $id)
    {
        $user = DB::table('users')->find($id);
        if (! $user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        DB::table('users')->where('id', $id)->update([
            'name'         => $request->name ?? $user->name,
            'email'        => $request->email ?? $user->email,
            'phone_number' => $request->phone_number ?? $user->phone_number,
            'password'     => $request->password ? bcrypt($request->password) : $user->password,
            'role'         => $request->role ?? $user->role,
        ]);
        return response()->json(['message' => 'User updated']);
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
