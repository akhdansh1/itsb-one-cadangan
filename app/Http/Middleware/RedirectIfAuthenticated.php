<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();

                return match ($user->role) {
                    'mahasiswa' => redirect()->route('dashboard.mahasiswa'),
                    'dosen'     => redirect()->route('dashboard.dosen'),
                    default     => redirect()->route('dashboard'),
                };
            }
        }

        return $next($request);
    }
}
