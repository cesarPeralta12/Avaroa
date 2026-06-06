<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AlreadyLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session()->has('LoggedIn') && (
            url('/signup') == $request->url() ||
            url('/Userlogin') == $request->url() ||
            url('/verify-otp') == $request->url()
        )) {
            return back();
        }

        return $next($request);
    }
}
