<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User
{
    public function handle($request,Closure $next)
    {
        if (Auth::check()) {
            $role = Auth::user()->role_id;

            if ($role == 2) {
                return $next($request);
            } else {
                return redirect()->route('login');
            }
        }

        return redirect()->route('login');

    }
}
