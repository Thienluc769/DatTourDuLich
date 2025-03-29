<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAuthenticated
{
    public function handle($request, Closure $next)
    {
        if(Auth::guard('users')->check())
        {
            return $next($request);
        }  
        return redirect()->route('client-login');

    }
}
