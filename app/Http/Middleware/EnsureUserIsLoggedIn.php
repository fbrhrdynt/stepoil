<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsLoggedIn
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user')) {
            return redirect()->route('login')->withErrors(['login_error' => 'Please login first.']);
        }

        return $next($request);
    }
}
