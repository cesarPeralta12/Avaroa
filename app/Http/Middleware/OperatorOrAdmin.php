<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

/**
 * Allows access to users with role = 'admin' OR role = 'operator'.
 * Super admins (is_super_admin = 1) always pass.
 */
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

        if (!in_array($role, ['admin', 'operator'])) {
            Session::forget('LoggedIn');
            return redirect('admin/login')->with('fail', 'No tienes permisos para acceder al panel.');
        }

        // Operators can only access specific routes
        if ($role === 'operator') {
            $allowed = [
                'topup-requests*',
                'trips*',
                'admin/login*',
                'admin/logout*',
            ];

            $path = $request->path();
            $permitted = false;
            foreach ($allowed as $pattern) {
                if (\Illuminate\Support\Str::is('admin/' . $pattern, $path) || \Illuminate\Support\Str::is($pattern, $path)) {
                    $permitted = true;
                    break;
                }
            }

            if (!$permitted) {
                abort(403, 'Los operadores solo pueden acceder a Recargas y Viajes.');
            }
        }

        return $next($request);
    }
}
