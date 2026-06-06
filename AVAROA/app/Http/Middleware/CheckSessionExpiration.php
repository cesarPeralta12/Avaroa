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
        // Get the session lifetime from the environment variable (in minutes)
        $sessionLifetime = env('SESSION_LIFETIME', 120);  // Default to 120 minutes if not set in .env

        // Check if the session has a 'LoggedIn' key and the timestamp of the session
        if ($request->session()->has('LoggedIn')) {
            $sessionTimestamp = $request->session()->get('LoggedInTimestamp');

            // If the session timestamp does not exist, set it for the first time
            if (!$sessionTimestamp) {
                $request->session()->put('LoggedInTimestamp', now());
            }

            // Calculate the session duration
            $sessionDuration = now()->diffInMinutes($sessionTimestamp);

            // If the session duration exceeds the defined lifetime, redirect to unlock page
            if ($sessionDuration > $sessionLifetime) {
                // Optionally, you can flash a message like 'Session expired' to the session
                return redirect()->route('unlock')->with('fail', 'Session expired. Please log in again.');
            }
        }

        // Continue processing the request if the session is valid
        return $next($request);
    }
}
