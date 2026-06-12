@extends('layout.master')

@section('title', 'Gestión de Usuarios')

@section('main_content')
<div class="page-content">
    <div class="container-fluid">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                <h4 class="mb-0"><i class="fas fa-users-cog me-2"></i>Usuarios del Sistema</h4>
                <form class="d-flex gap-2 align-items-center" method="GET" action="{{ route('admin.users.index') }}">
                    <input type="text" name="search" class="form-control form-control-sm" style="width:200px"
                        placeholder="Buscar nombre, email..." value="{{ request('search') }}">
                    <select name="role" class="form-select form-select-sm" style="width:140px">
                        <option value="">Todos los roles</option>
                        <option value="admin"    {{ request('role') === 'admin'    ? 'selected' : '' }}>Admin</option>
                        <option value="operator" {{ request('role') === 'operator' ? 'selected' : '' }}>Operador</option>
                        <option value="customer" {{ request('role') === 'customer' ? 'selected' : '' }}>Cliente</option>
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">Filtrar</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm">Limpiar</a>
                </form>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email / Teléfono</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    <div class="fw-semibold">{{ $user->name }}</div>
                                </td>
                                <td>
                                    <div>{{ $user->email }}</div>
                                    @if($user->phone)
                                    <small class="text-muted">{{ $user->phone }}</small>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $role = $user->is_super_admin ? 'admin' : ($user->role ?? 'customer');
                                        $badge = match($role) {
                                            'admin'    => 'danger',
                                            'operator' => 'warning',
                                            default    => 'secondary',
                                        };
                                        $label = match($role) {
                                            'admin'    => 'Admin',
                                            'operator' => 'Operador',
                                            default    => 'Cliente',
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $badge }}">{{ $label }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $user->is_active ? 'success' : 'secondary' }}">
                                        {{ $user->is_active ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                                <td>
                                    <small>{{ $user->created_at?->format('d/m/Y') }}</small>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                            class="btn btn-sm btn-outline-primary" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if($user->id !== session('LoggedIn'))
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                            onsubmit="return confirm('¿Eliminar a {{ addslashes($user->name) }}? Esta acción no se puede deshacer.')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No se encontraron usuarios.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($users->hasPages())
            <div class="card-footer">
                {{ $users->links() }}
            </div>
            @endif
        </div>

    </div>
</div>
@endsection
