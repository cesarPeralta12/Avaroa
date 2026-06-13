<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class AssistantsController extends Controller
{
    private function checkSession(): User
    {
        if (!Session::has('LoggedIn')) {
            abort(redirect('admin/login')->with('fail', 'Debes iniciar sesión primero.'));
        }
        $user = User::findOrFail(Session::get('LoggedIn'));
        if (!$user->is_super_admin) {
            abort(403, 'Solo los administradores pueden gestionar asistentes.');
        }
        return $user;
    }

    public function index()
    {
        $user_session = $this->checkSession();
        $assistants = User::where('role', 'asistente')->orderBy('created_at', 'desc')->get();
        return view('admin.assistants.index', compact('user_session', 'assistants'));
    }

    public function store(Request $request)
    {
        $this->checkSession();

        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'nullable|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required'      => 'El nombre es obligatorio.',
            'email.required'     => 'El correo es obligatorio.',
            'email.unique'       => 'Ya existe una cuenta con ese correo.',
            'password.required'  => 'La contraseña es obligatoria.',
            'password.min'       => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $data = [
            'name'           => $request->input('name'),
            'email'          => $request->input('email'),
            'password'       => Hash::make($request->input('password')),
            'is_super_admin' => 0,
            'is_active'      => 1,
        ];

        // Optional columns — only set if they exist to avoid NOT NULL errors
        if (Schema::hasColumn('users', 'phone')) {
            $data['phone'] = $request->input('phone');
        } elseif (Schema::hasColumn('users', 'whatsapp_number')) {
            $data['whatsapp_number'] = $request->input('phone');
        }

        if (Schema::hasColumn('users', 'role')) {
            $data['role'] = 'asistente';
        }

        if (Schema::hasColumn('users', 'account_type')) {
            $data['account_type'] = 'admin';
        }

        if (Schema::hasColumn('users', 'status')) {
            $data['status'] = 1;
        }

        try {
            User::create($data);
        } catch (\Exception $e) {
            \Log::error('AssistantsController@store failed: ' . $e->getMessage());
            return redirect()->route('admin.assistants.index')
                ->with('error', 'Error al crear el asistente: ' . $e->getMessage());
        }

        return redirect()->route('admin.assistants.index')
            ->with('success', 'Asistente creado correctamente.');
    }

    public function updatePermissions(Request $request, User $user)
    {
        $this->checkSession();

        if ($user->is_super_admin || $user->role !== 'asistente') {
            return response()->json(['success' => false, 'message' => 'No permitido.'], 403);
        }

        $allowedPanels = ['conductores', 'viajes', 'billeteras', 'clientes', 'pod', 'whatsapp'];

        $permissions = [];
        foreach ($allowedPanels as $panel) {
            $permissions[$panel] = (bool) $request->input("panels.$panel", false);
        }

        $user->update(['panel_permissions' => $permissions]);

        return response()->json(['success' => true, 'message' => 'Permisos actualizados.']);
    }

    public function destroy(User $user)
    {
        $this->checkSession();

        if ($user->is_super_admin || $user->role !== 'asistente') {
            return redirect()->route('admin.assistants.index')
                ->with('error', 'No se puede eliminar ese usuario.');
        }

        $user->delete();

        return redirect()->route('admin.assistants.index')
            ->with('success', 'Asistente eliminado.');
    }
}
