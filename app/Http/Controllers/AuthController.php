<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function login(Request $req)
  {
    $req->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    $user = User::where('email', $req->email)->first();

    if (!$user || !Hash::check($req->password, $user->password)) {
      return response()->json([
        'message' => 'Invalid credentials'
      ], 401);
    }

    $token = $user->createToken('token-name', ['*'], now()->addDay())->plainTextToken;

    return response()->json([
      'message' => 'Login successful',
      'access_token' => $token,
      'token_type' => 'Bearer',
      'user' => $user
    ]);
  }
}
