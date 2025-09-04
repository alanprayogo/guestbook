<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request,Closure $next)
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            if ($role == 'admin') {
                return $next($request);
            } else {
                return redirect()->route('dashboard');
            }
        }

        return redirect()->route('login');

    }
}
