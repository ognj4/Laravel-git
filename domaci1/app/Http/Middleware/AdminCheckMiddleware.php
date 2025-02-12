<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. User -> podatak da li je admin ili ne
            // migracija AddRoleToUser i u User modelu dodajemo u fillable
        // 2, Provera admin true false

        $role = Auth::user()->role; // 'role' od usrea koji je ulogovan

        if ($role != 'admin') { // ako nisi admin back to home
            return redirect ('/');
        }
        return $next($request); // Nastavi dalje
    }
}
