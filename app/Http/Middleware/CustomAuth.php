<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class CustomAuth
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        $staticToken = env('JWT_SECRET');

        if ($token === $staticToken) {
            return $next($request);
        }
return JWTAuth::parseToken()->authenticate();exit;
        try {
            if ($user = JWTAuth::parseToken()->authenticate()) {
                $request->attributes->set('user', $user);
                return $next($request);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}

