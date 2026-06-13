<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckSessionExpiration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('LoggedIn')) {
            return $next($request);
        }

        // Inactivity timeout in minutes (activity-based, not total-session-based)
        $sessionLifetime = (int) env('SESSION_LIFETIME', 120);

        $lastActivity = $request->session()->get('LoggedInTimestamp');

        if (!$lastActivity) {
            // First request after login — stamp it
            $request->session()->put('LoggedInTimestamp', now());
            return $next($request);
        }

        $inactiveMinutes = now()->diffInMinutes($lastActivity);

        if ($inactiveMinutes > $sessionLifetime) {
            // Clear the session so the redirect doesn't loop back here
            $request->session()->forget(['LoggedIn', 'LoggedInTimestamp']);
            return redirect('admin/login')
                ->with('fail', 'Tu sesión expiró por inactividad. Por favor inicia sesión de nuevo.');
        }

        // Refresh activity timestamp on every valid request
        $request->session()->put('LoggedInTimestamp', now());

        return $next($request);
    }
}
