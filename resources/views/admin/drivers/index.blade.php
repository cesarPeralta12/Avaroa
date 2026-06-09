@extends('layout.master')
@section('title', 'Gestión de Conductores')
@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        {{-- Stats Cards --}}
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="avatar-sm rounded-circle bg-white bg-opacity-25">
                                    <span class="avatar-title text-white font-size-24">
                                        <i class="fas fa-users-cog text-light"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-white-50 mb-1">Total de Conductores</p>
                                <h4 class="mb-0">{{ number_format($stats['total']) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm bg-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="avatar-sm rounded-circle bg-opacity-10">
                                    <span class="avatar-title font-size-24">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-dark-50 mb-1">Pendientes de Verificación</p>
                                <h4 class="mb-0">{{ number_format($stats['pending']) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="avatar-sm rounded-circle bg-white bg-opacity-25">
                                    <span class="avatar-title text-white font-size-24">
                                        <i class="fas fa-check-circle"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-white-50 mb-1">Verificados</p>
                                <h4 class="mb-0">{{ number_format($stats['verified']) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="avatar-sm rounded-circle bg-white bg-opacity-25">
                                    <span class="avatar-title text-white font-size-24">
                                        <i class="fas fa-signal"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-white-50 mb-1">En Línea Ahora</p>
                                <h4 class="mb-0">{{ number_format($stats['online']) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Card --}}
        <div class="card shadow-sm">
            <div class="card-header border-bottom d-flex flex-wrap justify-content-between align-items-center py-3">
                <h5 class="card-title mb-0 text-light fw-bold">
                    <i class="fas fa-id-card text-primary me-2"></i>Directorio de Conductores
                </h5>
                <div class="d-flex gap-2 flex-wrap">
                    <a href="{{ route('drivers.pending') }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-clock me-1"></i>Pendientes
                        @if($stats['pending'] > 0)
                            <span class="badge bg-danger ms-1">{{ $stats['pending'] }}</span>
                        @endif
                    </a>
                </div>
            </div>
            <div class="card-body">
                {{-- Filters --}}
                <form method="GET" class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" name="search" class="form-control" 
                                   placeholder="Buscar por nombre, email, teléfono..."
                                   value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-select">
                            <option value="">Todos los Estados</option>
                            <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Disponible</option>
                            <option value="busy" {{ request('status') == 'busy' ? 'selected' : '' }}>Ocupado</option>
                            <option value="offline" {{ request('status') == 'offline' ? 'selected' : '' }}>Fuera de Línea</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pendiente</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="is_verified" class="form-select">
                            <option value="">Toda Verificación</option>
                            <option value="1" {{ request('is_verified') == '1' ? 'selected' : '' }}>Verificado</option>
                            <option value="0" {{ request('is_verified') == '0' ? 'selected' : '' }}>No Verificado</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-filter me-1"></i>Filtrar
                        </button>
                    </div>
                </form>

                {{-- Bulk Actions --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <input type="checkbox" id="select-all" class="form-check-input">
                        <label for="select-all" class="mb-0 text-muted small">Seleccionar Todo</label>
                    </div>
                    <button id="bulk-delete-btn" class="btn btn-outline-danger btn-sm" disabled>
                        <i class="fas fa-trash-alt me-1"></i>Eliminar Seleccionados
                    </button>
                </div>

                {{-- Table --}}
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="drivers-table">
                        <thead class="table-light">
                            <tr>
                                <th width="40"></th>
                                <th>Conductor</th>
                                <th>Vehículo</th>
                                <th>Estado</th>
                                <th>Verificación</th>
                                <th>Rendimiento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($drivers as $driver)
                                @php
                                    $vehicle = $driver->vehicle;
                                    $docsCount = $driver->documents->count();
                                    $verifiedDocs = $driver->documents->where('status', 'verified')->count();
                                @endphp
                                <tr>
                                    <td>
                                        <input type="checkbox" class="row-checkbox form-check-input" value="{{ $driver->id }}">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                @if($driver->user?->profile_photo)
                                                    <img src="{{ \App\Services\FileUploadService::getUrl($driver->user->profile_photo) }}"
                                                         class="rounded-circle" width="48" height="48" alt=""
                                                         style="object-fit: cover; width: 48px; height: 48px;">
                                                @else
                                                    <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white"
                                                         style="width: 48px; height: 48px;">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1 fw-bold">{{ $driver->user?->name ?? 'N/A' }}</h6>
                                                <p class="mb-0 text-muted small">
                                                    <i class="fas fa-envelope me-1"></i>{{ $driver->user?->email ?? 'N/A' }}
                                                </p>
                                                @if($driver->user?->whatsapp_number)
                                                    <p class="mb-0 text-muted small">
                                                        <i class="fab fa-whatsapp me-1 text-success"></i>{{ $driver->user->whatsapp_number }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
    @php
        $vehicleLabels = [
            'moto_veloz'     => 'Moto',
            'movil'          => 'Auto',
            'movil_vagoneta' => 'Minivan',
            'movil_parrilla' => 'Camión',
            'moto'           => 'Moto',
            'automovil'      => 'Automóvil',
            'vagoneta'       => 'Vagoneta',
            'minivan'        => 'Minivan',
            'camioneta'      => 'Camioneta',
            'car'            => 'Auto',
        ];
    @endphp

    @if($vehicle)
        <span class="badge bg-info text-dark">
            <i class="fas fa-car me-1"></i>{{ $vehicleLabels[$vehicle->type] ?? ucfirst(str_replace('_', ' ', $vehicle->type)) }}
        </span>
        <p class="mb-0 small text-muted mt-1">{{ $vehicle->plate_number }}</p>
    @else
        <span class="badge bg-secondary">Sin Vehículo</span>
    @endif
</td>
                                    <td>
                                        @php
                                            $statusColors = [
                                                'available' => 'success',
                                                'busy' => 'warning',
                                                'offline' => 'secondary',
                                                'pending' => 'info',
                                                'under_review' => 'primary',
                                                'rejected' => 'danger',
                                            ];
                                            $color = $statusColors[$driver->status] ?? 'secondary';
                                        @endphp
                                        <span class="badge bg-{{ $color }}">
                                            <i class="fas fa-circle me-1 small"></i>{{ ucfirst(str_replace('_', ' ', $driver->status)) }}
                                        </span>
                                        @if($driver->is_online)
                                            <span class="badge bg-success ms-1">En Línea</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($driver->is_verified)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check-circle me-1"></i>Verificado
                                            </span>
                                        @else
                                            <div class="d-flex flex-column gap-1">
                                                <span class="badge bg-warning text-dark">
                                                    <i class="fas fa-clock me-1"></i>Pendiente
                                                </span>
                                                <small class="text-muted">{{ $verifiedDocs }}/{{ $docsCount }} docs</small>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column gap-1">
                                            <div class="d-flex align-items-center">
                                                <span class="text-muted small me-2">Puntuación:</span>
                                                <span class="fw-bold text-{{ $driver->score >= 4.5 ? 'success' : ($driver->score >= 3 ? 'warning' : 'danger') }}">
                                                    {{ number_format($driver->score, 1) }}
                                                </span>
                                                <i class="fas fa-star text-warning ms-1 small"></i>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span class="text-muted small me-2">Aceptación:</span>
                                                <span class="fw-bold">{{ number_format($driver->acceptance_rate, 0) }}%</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('drivers.show', $driver) }}"
                                               class="btn btn-sm btn-outline-primary" title="Ver Detalles">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger btn-delete-ajax"
                                                    data-url="{{ route('drivers.destroy', $driver) }}" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-muted">
                                        <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                        No se encontraron conductores que coincidan con sus criterios.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Showing count --}}
                <div class="text-muted small mt-3">
                    Mostrando {{ $drivers->count() }} registros
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.avatar-sm {
    height: 3rem;
    width: 3rem;
}
.avatar-title {
    align-items: center;
    display: flex;
    font-weight: 500;
    height: 100%;
    justify-content: center;
    width: 100%;
}
</style>
@endpush

@push('scripts')
<script>
$(function(){
    // Select All
    $('#select-all').on('change', function(){
        $('.row-checkbox').prop('checked', this.checked);
        toggleBulkBtn();
    });

    $('.row-checkbox').on('change', toggleBulkBtn);

    function toggleBulkBtn(){
        const count = $('.row-checkbox:checked').length;
        $('#bulk-delete-btn').prop('disabled', count === 0)
            .text(`Eliminar Seleccionados (${count})`);
    }

    // Bulk Delete
    $('#bulk-delete-btn').on('click', function(){
        const ids = $('.row-checkbox:checked').map(function(){ return $(this).val(); }).get();
        if(!ids.length) return;

        Swal.fire({
            title: '¿Eliminar conductores seleccionados?',
            text: `Estás a punto de eliminar ${ids.length} conductor(es). Esta acción no se puede deshacer.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if(result.isConfirmed){
                $.post("{{ route('drivers.bulk.delete') }}", {
                    ids: ids,
                    _token: "{{ csrf_token() }}"
                }).done(function(r){
                    if(r.success){
                        Swal.fire('¡Eliminado!', 'Los conductores han sido eliminados.', 'success')
                            .then(() => location.reload());
                    }else{
                        Swal.fire('Error', r.message || 'Error al eliminar', 'error');
                    }
                }).fail(() => {
                    Swal.fire('Error', 'Ocurrió un error en el servidor', 'error');
                });
            }
        });
    });

    // Individual Delete
    $(document).on('click', '.btn-delete-ajax', function(){
        const url = $(this).data('url');
        const row = $(this).closest('tr');

        Swal.fire({
            title: '¿Eliminar este conductor?',
            text: "¡Esta acción no se puede deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if(result.isConfirmed){
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {_token: "{{ csrf_token() }}"},
                    success: function(r){
                        if(r.success){
                            row.fadeOut(300, function(){ $(this).remove(); });
                            Swal.fire('¡Eliminado!', 'El conductor ha sido eliminado.', 'success');
                        }
                    },
                    error: function(){
                        Swal.fire('Error', 'No se pudo eliminar el conductor', 'error');
                    }
                });
            }
        });
    });
});
</script>
@endpush