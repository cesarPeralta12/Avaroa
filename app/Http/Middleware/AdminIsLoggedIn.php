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

        if (!$user) {
            Session::forget('LoggedIn');
            return redirect('admin/login')->with('fail', 'No tienes permisos para acceder al panel de administración.');
        }

        $role = $user->is_super_admin ? 'admin' : ($user->role ?? 'customer');

        if (!in_array($role, ['admin', 'operator'])) {
            Session::forget('LoggedIn');
            return redirect('admin/login')->with('fail', 'No tienes permisos para acceder al panel de administración.');
        }

        // Operators restricted to topup-requests and trips only
        if ($role === 'operator') {
            $path = $request->path();
            $permitted = \Illuminate\Support\Str::is([
                'admin/topup-requests*',
                'admin/trips*',
                'admin/login*',
                'admin/logout*',
            ], $path);

            if (!$permitted) {
                abort(403, 'Los operadores solo pueden acceder a Solicitudes de Recarga y Viajes.');
            }
        }

        return $next($request);
    }
}
