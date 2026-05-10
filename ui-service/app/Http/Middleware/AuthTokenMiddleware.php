<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthTokenMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek session 'token' (sesuai AuthController Anda)
        if (!$request->session()->has('token')) {
            return redirect('/login')
                ->with('error', 'Session expired. Please login again.');
        }

        return $next($request);
    }
}