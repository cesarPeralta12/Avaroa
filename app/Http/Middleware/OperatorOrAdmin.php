<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class OperatorOrAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('LoggedIn')) {
            return redirect('admin/login')->with('fail', 'Debes iniciar sesión primero.');
        }

        $user = \App\Models\User::find(Session::get('LoggedIn'));

        if (!$user) {
            Session::forget('LoggedIn');
            return redirect('admin/login')->with('fail', 'Sesión inválida.');
        }

        $role = $user->is_super_admin ? 'admin' : ($user->role ?? 'customer');

        if (!in_array($role, ['admin', 'asistente'])) {
            Session::forget('LoggedIn');
            return redirect('admin/login')->with('fail', 'No tienes permisos para acceder al panel.');
        }

        return $next($request);
    }
}
