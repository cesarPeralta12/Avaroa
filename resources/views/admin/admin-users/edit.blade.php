@extends('layout.master')

@section('title', 'Editar Usuario')

@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-user-edit me-2"></i>Editar Usuario — {{ $user->name }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user) }}" method="POST">
                            @csrf @method('PUT')

                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                            </div>
                            @endif

                            <div class="mb-3">
                                <label class="form-label">Nombre completo</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Teléfono</label>
                                <input type="text" name="phone" class="form-control"
                                    value="{{ old('phone', $user->phone) }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Rol del usuario</label>
                                <select name="role" class="form-select">
                                    @php
                                        $currentRole = $user->is_super_admin ? 'admin' : ($user->role ?? 'customer');
                                    @endphp
                                    <option value="customer"   {{ $currentRole === 'customer'   ? 'selected' : '' }}>Cliente</option>
                                    <option value="operator"   {{ $currentRole === 'operator'   ? 'selected' : '' }}>Operador (recarga + viajes)</option>
                                    <option value="asistente"  {{ $currentRole === 'asistente'  ? 'selected' : '' }}>Asistente (conductores, viajes y billetera)</option>
                                    <option value="admin"      {{ $currentRole === 'admin'      ? 'selected' : '' }}>Administrador (acceso total)</option>
                                </select>
                                <div class="form-text">
                                    <strong>Operador</strong>: acceso solo a Solicitudes de Recarga y Viajes.<br>
                                    <strong>Asistente</strong>: acceso a Conductores, Viajes y Gestión de Billetera.<br>
                                    <strong>Admin</strong>: acceso completo al panel.
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i>Guardar cambios
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
