@extends('layout.master')

@section('title', 'Asistentes')

@section('main_content')
<div class="page-content">
    <div class="container-fluid">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row mb-3">
            <div class="col-12">
                <h4 class="mb-0"><i class="fas fa-user-tie me-2"></i>Asistentes</h4>
                <p class="text-muted small mt-1">
                    Los asistentes pueden gestionar recargas de billetera y viajes, pero no tienen acceso al resto del panel.
                </p>
            </div>
        </div>

        <div class="row g-4">

            {{-- CREAR ASISTENTE --}}
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-user-plus me-2"></i>Crear Asistente</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.assistants.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nombre completo <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" placeholder="Ej: María García" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Correo electrónico <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder="asistente@correo.com" required>
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Teléfono</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}" placeholder="+591 7XXXXXXX">
                                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Contraseña <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Mínimo 6 caracteres" required>
                                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Confirmar contraseña <span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Repite la contraseña" required>
                            </div>

                            <div class="p-3 rounded mb-4" style="background:#f0f7ff;border:1px solid #b8d9f8">
                                <p class="mb-1 fw-semibold text-primary" style="font-size:13px">
                                    <i class="fas fa-info-circle me-1"></i>Permisos del asistente
                                </p>
                                <ul class="mb-0 ps-3" style="font-size:12px;color:#555">
                                    <li>Ver y aprobar solicitudes de recarga</li>
                                    <li>Ver y gestionar viajes</li>
                                    <li>Ver billeteras de conductores</li>
                                    <li>Ver conductores y documentos</li>
                                </ul>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-save me-2"></i>Crear asistente
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- LISTA DE ASISTENTES --}}
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0"><i class="fas fa-users me-2"></i>Asistentes activos</h5>
                        <span class="badge bg-primary">{{ $assistants->count() }}</span>
                    </div>
                    <div class="card-body p-0">
                        @if($assistants->isEmpty())
                        <div class="text-center py-5 text-muted">
                            <i class="fas fa-user-slash fa-3x mb-3 d-block opacity-25"></i>
                            <p class="mb-0">No hay asistentes creados aún.</p>
                        </div>
                        @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Asistente</th>
                                        <th>Teléfono</th>
                                        <th>Creado</th>
                                        <th class="text-end">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($assistants as $assistant)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold"
                                                    style="width:38px;height:38px;font-size:15px;flex-shrink:0">
                                                    {{ strtoupper(substr($assistant->name, 0, 1)) }}
                                                </div>
                                                <div>
                                                    <div class="fw-semibold" style="font-size:14px">{{ $assistant->name }}</div>
                                                    <div class="text-muted" style="font-size:12px">{{ $assistant->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-muted" style="font-size:13px">
                                            {{ $assistant->phone ?? '—' }}
                                        </td>
                                        <td class="text-muted" style="font-size:12px">
                                            {{ $assistant->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="text-end">
                                            <form action="{{ route('admin.assistants.destroy', $assistant) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Eliminar al asistente {{ addslashes($assistant->name) }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
