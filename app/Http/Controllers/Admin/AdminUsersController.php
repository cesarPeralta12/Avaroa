<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    private const ALLOWED_ROLES = ['admin', 'operator', 'asistente', 'customer'];

    private function checkSession(): User
    {
        if (!Session::has('LoggedIn')) {
            abort(redirect('admin/login')->with('fail', 'Debes iniciar sesión primero.'));
        }
        $user = User::findOrFail(Session::get('LoggedIn'));
        if (!$user->is_super_admin) {
            abort(403, 'Solo los administradores pueden gestionar usuarios.');
        }
        return $user;
    }

    public function index(Request $request)
    {
        $user_session = $this->checkSession();

        $query = User::query()->orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%$s%")
                  ->orWhere('email', 'like', "%$s%")
                  ->orWhere('phone', 'like', "%$s%");
            });
        }

        if ($request->filled('role')) {
            if ($request->role === 'admin') {
                $query->where('is_super_admin', 1);
            } else {
                $query->where('is_super_admin', 0)->where('role', $request->role);
            }
        }

        $users = $query->paginate(25)->withQueryString();

        return view('admin.admin-users.index', compact('user_session', 'users'));
    }

    public function edit(User $user)
    {
        $user_session = $this->checkSession();
        return view('admin.admin-users.edit', compact('user_session', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $this->checkSession();

        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:30',
            'role'  => 'required|in:' . implode(',', self::ALLOWED_ROLES),
        ]);

        $updateData = [
            'name'           => $data['name'],
            'email'          => $data['email'],
            'phone'          => $data['phone'],
            'is_super_admin' => $data['role'] === 'admin' ? 1 : 0,
        ];

        // role column is added by migration — safe to include only if it exists
        if (Schema::hasColumn('users', 'role')) {
            $updateData['role'] = $data['role'];
        }

        $user->update($updateData);

        return redirect()->route('admin.users.index')
            ->with('success', "Usuario {$user->name} actualizado correctamente.");
    }

    public function destroy(User $user)
    {
        $this->checkSession();

        if ($user->id === (int) Session::get('LoggedIn')) {
            return back()->with('error', 'No puedes eliminar tu propia cuenta.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario eliminado.');
    }

    public function changeRole(Request $request, User $user)
    {
        $this->checkSession();

        $request->validate(['role' => 'required|in:' . implode(',', self::ALLOWED_ROLES)]);

        $roleData = ['is_super_admin' => $request->role === 'admin' ? 1 : 0];
        if (Schema::hasColumn('users', 'role')) {
            $roleData['role'] = $request->role;
        }
        $user->update($roleData);

        return response()->json(['success' => true, 'role' => $request->role]);
    }
}
