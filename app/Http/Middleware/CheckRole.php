<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->role->nom != $role) {
            abort(403, 'No tens permisos per accedir a aquesta pàgina!');
        }

        return $next($request);
    }
}

