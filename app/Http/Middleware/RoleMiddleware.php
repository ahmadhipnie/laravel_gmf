<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {

        // if (!Auth::check() || Auth::user()->role != $role) {
        //     # code...
        //     return redirect()->route('login');
        // }
        // return $next($request);

        if (Auth::check() && Auth::user()->role == $role) {
            # code...
        return $next($request);
        }
        // return redirect()->route('login');
        abort(403, 'Unauthorized action.');
    }
}
