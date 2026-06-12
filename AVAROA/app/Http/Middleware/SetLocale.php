<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if ($locale = session('local')) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
