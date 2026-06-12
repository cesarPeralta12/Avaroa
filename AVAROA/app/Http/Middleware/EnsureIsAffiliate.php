<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureIsAffiliate
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->is_affiliate) {
            return redirect('/affiliate')->with('error', 'Access denied.');
        }

        return $next($request);
    }
}
