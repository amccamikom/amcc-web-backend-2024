<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
		// Deklarasi Middleware dan Handle
    public function handle(Request $request, Closure $next, $role)
    {
        // Simulasi user login
        $fakeUser = new \stdClass();
        $fakeUser->role = 'admin'; // Ganti jadi 'user' untuk simulasi ditolak

        // Masukkan user palsu ke dalam request
        $request->setUserResolver(function () use ($fakeUser) {
            return $fakeUser;
        });

        // Cek role user: cocok atau ditolak
        if ($request->user()->role !== $role) {
            return response()->json(['message' => 'Akses ditolak.'], 403);
        }
				
				// Lanjut ke controller jika role cocok
        return $next($request);
    }
}