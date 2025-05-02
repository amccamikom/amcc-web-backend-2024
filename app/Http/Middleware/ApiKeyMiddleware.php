<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->query('api_key');
        if ($apiKey !== 'rahasia') {
            return response()->json([
                'message' => 'Unauthorized: Invalid API Key',
            ], 401);
        }
        return $next($request);
    }
}
