<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Retrieve user session
        $user_session = Session::get('user_session');

        // Check if user is a super admin
        if (!$user_session || $user_session->is_super_admin != 1) {
            return response()->view('others.error_pages.error_page3', [], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
