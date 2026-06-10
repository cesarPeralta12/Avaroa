<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminIsLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session()->has('LoggedIn')) {
            return redirect('admin/login')->with('fail', 'Debes iniciar sesión primero.');
        }

        $user = \App\Models\User::find(Session::get('LoggedIn'));

        if (!$user || !$user->is_super_admin) {
            Session::forget('LoggedIn');
            return redirect('admin/login')->with('fail', 'No tienes permisos para acceder al panel de administración.');
        }

        return $next($request);
    }
}
