<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        // --- Cara Lama (Query Builder) ---
        // $users = DB::table('users')->get();
        // return response()->json($users);

        // --- Cara Baru (Eloquent) ---
        $users = User::latest()->get();
        return response()->json($users);
    }

    public function show($id)
    {
        // --- Cara Lama (Query Builder) ---
        // $user = DB::table('users')->find($id);
        // if (! $user) {
        //     return response()->json(['message' => 'User not found'], 404);
        // }
        // return response()->json($user);

        // --- Cara Baru (Eloquent) ---
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:255',
            'password'     => 'required|string|min:8',
            'role'         => 'required|in:admin,customer',
        ]);

        // --- Cara Lama (Query Builder) ---
        // $id = DB::table('users')->insertGetId([
        //     'name'         => $request->name,
        //     'email'        => $request->email,
        //     'phone_number' => $request->phone_number,
        //     'password'     => bcrypt($request->password), // <-- Hashing manual
        //     'role'         => $request->role,
        //     'created_at'   => Carbon::now(), // <-- Timestamp manual
        //     'updated_at'   => Carbon::now(),
        // ]);
        // return response()->json(['message' => 'User created', 'id' => $id], 201);

        // --- Cara Baru (Eloquent) ---
        $user = User::create($validatedData);

        // Langsung kembalikan data user yang baru dibuat.
        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        // --- Cara Lama (Query Builder) ---
        // $user = DB::table('users')->find($id);
        // if (! $user) {
        //     return response()->json(['message' => 'User not found'], 404);
        // }
        // DB::table('users')->where('id', $id)->update($data);
        // return response()->json(['message' => 'User updated successfully']);

        // --- Cara Baru (Eloquent) ---
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name'         => 'string|max:255',
            'email'        => ['email', Rule::unique('users')->ignore($user->id)],
            'phone_number' => 'string|max:255',
            'password'     => 'nullable|string|min:8',
            'role'         => 'in:admin,customer',
        ]);

        $user->update($validatedData);

        return response()->json($user);
    }

    public function destroy($id)
    {
        // --- Cara Lama (Query Builder) ---
        // $deleted = DB::table('users')->where('id', $id)->delete();
        // if (! $deleted) {
        //     return response()->json(['message' => 'User not found'], 404);
        // }
        // return response()->json(['message' => 'User deleted']);

        // --- Cara Baru (Eloquent) ---
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
