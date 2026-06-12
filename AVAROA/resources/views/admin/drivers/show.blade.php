@extends('layout.master')
@section('title', 'Detalles del Conductor - ' . $driver->user?->name)
@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('drivers.index') }}">Conductores</a></li>
                <li class="breadcrumb-item active">{{ $driver->user?->name }}</li>
            </ol>
        </nav>

        <div class="row">
            {{-- Left Column: Driver Profile --}}
            <div class="col-xl-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center">
                        @if($driver->user?->profile_photo)
                            <img src="{{ \App\Services\FileUploadService::getUrl($driver->user->profile_photo) }}"
                                 class="rounded-circle mb-3" width="120" height="120" alt="">
                        @else
                            <div class="rounded-circle bg-opacity-10 d-flex align-items-center justify-content-center text-primary mx-auto mb-3"
                                 style="width: 120px; height: 120px;">
                                <i class="fas fa-user fa-4x"></i>
                            </div>
                        @endif

                        <h4 class="fw-bold mb-1">{{ $driver->user?->name }}</h4>
                        <p class="text-muted mb-2">{{ $driver->user?->email }}</p>

                        <div class="d-flex justify-content-center gap-2 mb-3">
                            @if($driver->is_verified)
                                <span class="badge bg-success fs-6 px-3 py-2">
                                    <i class="fas fa-check-circle me-1"></i>Verificado
                                </span>
                            @else
                                <span class="badge bg-warning text-dark fs-6 px-3 py-2">
                                    <i class="fas fa-clock me-1"></i>Pendiente de Verificación
                                </span>
                            @endif
                        </div>

                        <div class="list-group list-group-flush text-start">
                            <div class="list-group-item d-flex justify-content-between">
                                <span class="text-muted"><i class="fab fa-whatsapp me-2 text-success"></i>WhatsApp</span>
                                <span class="fw-bold">{{ $driver->user?->whatsapp_number ?? 'N/A' }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <span class="text-muted"><i class="fas fa-id-card me-2"></i>Licencia</span>
                                <span class="fw-bold">{{ $driver->license_number ?? 'N/A' }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <span class="text-muted"><i class="fas fa-calendar me-2"></i>Registrado</span>
                                <span class="fw-bold">{{ $driver->created_at->format('d M, Y') }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <span class="text-muted"><i class="fas fa-star me-2 text-warning"></i>Puntuación</span>
                                <span class="fw-bold">{{ number_format($driver->score, 1) }}/5.0</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <span class="text-muted"><i class="fas fa-percentage me-2"></i>Tasa de Aceptación</span>
                                <span class="fw-bold">{{ number_format($driver->acceptance_rate, 0) }}%</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Vehicle Card --}}
                @if($driver->vehicle)
                <div class="card shadow-sm mb-4">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-car me-2 text-primary"></i>Detalles del Vehículo</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <tr>
                                <td class="text-muted">Tipo</td>
                                <td class="fw-bold text-end">{{ ucfirst($driver->vehicle->type) }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Número de Placa</td>
                                <td class="fw-bold text-end text-uppercase">{{ $driver->vehicle->plate_number }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Modelo</td>
                                <td class="fw-bold text-end">{{ $driver->vehicle->model ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Año</td>
                                <td class="fw-bold text-end">{{ $driver->vehicle->year ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Capacidad</td>
                                <td class="fw-bold text-end">{{ $driver->vehicle->capacity_weight ?? '0' }} kg</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Estado</td>
                                <td class="text-end">
                                    @if($driver->vehicle->is_verified)
                                        <span class="badge bg-success">Verificado</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Pendiente</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                {{-- All Vehicles List --}}
                @if($driver->vehicles->count() > 1)
                <div class="card shadow-sm mb-4">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-list me-2 text-primary"></i>Todos los Vehículos ({{ $driver->vehicles->count() }})</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @foreach($driver->vehicles as $vehicle)
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="fw-bold">{{ ucfirst($vehicle->type) }}</span>
                                        <small class="text-muted d-block">{{ $vehicle->plate_number }}</small>
                                    </div>
                                    @if($vehicle->is_active)
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-secondary">Inactivo</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                @endif

                {{-- Actions --}}
                <div class="d-grid gap-2">
                    @if(!$driver->is_verified)
                        <button class="btn btn-success btn-lg btn-verify-driver" data-driver-id="{{ $driver->id }}">
                            <i class="fas fa-check-circle me-2"></i>Aprobar Conductor
                        </button>
                        <button class="btn btn-outline-danger btn-reject-driver" data-driver-id="{{ $driver->id }}">
                            <i class="fas fa-times-circle me-2"></i>Rechazar Solicitud
                        </button>
                    @else
                        <button class="btn btn-outline-warning btn-suspend-driver" data-driver-id="{{ $driver->id }}">
                            <i class="fas fa-ban me-2"></i>Suspender Cuenta
                        </button>
                    @endif
                    <br>
                </div>
            </div>

            {{-- Right Column: Documents --}}
            <div class="col-xl-8">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-folder-open me-2 text-primary"></i>Verificación de Documentos</h5>
                        <span class="badge bg-primary">{{ $driver->documents->count() }} Documentos</span>
                    </div>
                    <div class="card-body">
                        @if($driver->documents->isEmpty())
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle me-2"></i>Aún no se han subido documentos.
                            </div>
                        @else
                            <div class="row">
                                @foreach($driver->documents as $document)
                                    <div class="col-md-6 mb-4">
                                        <div class="card h-100 border-{{ $document->status == 'verified' ? 'success' : ($document->status == 'rejected' ? 'danger' : 'warning') }}">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <span class="fw-bold">
                                                    {{ $documentTypes[$document->type] ?? ucfirst($document->type) }}
                                                </span>
                                                @switch($document->status)
                                                    @case('verified')
                                                        <span class="badge bg-success"><i class="fas fa-check me-1"></i>Verificado</span>
                                                        @break
                                                    @case('rejected')
                                                        <span class="badge bg-danger"><i class="fas fa-times me-1"></i>Rechazado</span>
                                                        @break
                                                    @default
                                                        <span class="badge bg-warning text-dark"><i class="fas fa-clock me-1"></i>Pendiente</span>
                                                @endswitch
                                            </div>
                                            <div class="card-body">
                                                {{-- Document Preview --}}
                                                <div class="mb-3 text-center rounded p-2" style="height: 200px; overflow: hidden;">
                                                    @if(in_array($document->mime_type, ['image/jpeg', 'image/png', 'image/jpg']))
                                                        <img src="{{ route('documents.preview', $document) }}"
                                                             class="img-fluid h-100" style="object-fit: contain; cursor: pointer;"
                                                             onclick="openImageModal('{{ route('documents.preview', $document) }}', '{{ $documentTypes[$document->type] ?? $document->type }}')"
                                                             alt="Vista Previa">
                                                    @else
                                                        <div class="d-flex flex-column align-items-center justify-content-center h-100">
                                                            <i class="fas fa-file-pdf fa-3x text-danger mb-2"></i>
                                                            <span class="text-muted small">{{ $document->original_name }}</span>
                                                        </div>
                                                    @endif
                                                </div>

                                                {{-- Document Info --}}
                                                <div class="small text-muted mb-3">
                                                    <div class="d-flex justify-content-between">
                                                        <span>Archivo:</span>
                                                        <span class="text-truncate" style="max-width: 150px;" title="{{ $document->original_name }}">
                                                            {{ $document->original_name }}
                                                        </span>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <span>Tamaño:</span>
                                                        <span>{{ number_format($document->file_size / 1024, 1) }} KB</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <span>Subido:</span>
                                                        <span>{{ $document->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    @if($document->expiry_date)
                                                        <div class="d-flex justify-content-between">
                                                            <span>Expira:</span>
                                                            <span class="{{ $document->expiry_date->isPast() ? 'text-danger' : ($document->expiry_date->isFuture() && $document->expiry_date->diffInDays(now()) < 30 ? 'text-warning' : 'text-success') }}">
                                                                {{ $document->expiry_date->format('d M, Y') }}
                                                            </span>
                                                        </div>
                                                    @endif
                                                </div>

                                                {{-- Verification Info --}}
                                                @if($document->verified_at)
                                                    <div class="alert alert-{{ $document->status == 'verified' ? 'success' : 'danger' }} py-2 small mb-0">
                                                        <i class="fas fa-{{ $document->status == 'verified' ? 'check' : 'times' }}-circle me-1"></i>
                                                        {{ $document->status == 'verified' ? 'Aprobado' : 'Rechazado' }} por
                                                        {{ $document->verifier?->name ?? 'Admin' }}
                                                        el {{ $document->verified_at->format('d M, Y') }}
                                                        @if($document->rejection_reason)
                                                            <br><strong>Motivo:</strong> {{ $document->rejection_reason }}
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>

                                            {{-- Actions --}}
                                            @if($document->status == 'pending')
                                                <div class="card-footer">
                                                    <div class="d-grid gap-2">
                                                        <button class="btn btn-success btn-sm btn-verify-doc"
                                                                data-doc-id="{{ $document->id }}">
                                                            <i class="fas fa-check me-1"></i>Aprobar
                                                        </button>
                                                        <button class="btn btn-outline-danger btn-sm btn-reject-doc"
                                                                data-doc-id="{{ $document->id }}">
                                                            <i class="fas fa-times me-1"></i>Rechazar
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="card-footer border-top-0 pt-0">
                                                <a href="{{ route('documents.download', $document) }}"
                                                   class="btn btn-outline-primary btn-sm w-100">
                                                    <i class="fas fa-download me-1"></i>Descargar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Image Preview Modal --}}
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Vista Previa del Documento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-0">
                <img id="modalImage" src="" class="img-fluid" style="max-height: 80vh;" alt="Vista Previa Completa">
            </div>
            <div class="modal-footer">
                <a id="modalDownload" href="#" class="btn btn-primary">
                    <i class="fas fa-download me-1"></i>Descargar
                </a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openImageModal(src, title) {
    $('#modalImage').attr('src', src);
    $('#modalTitle').text(title);
    $('#modalDownload').attr('href', src.replace('/preview', '/download'));
    $('#imageModal').modal('show');
}

$(function(){
    // Verify Document
    $('.btn-verify-doc').on('click', function(){
        const docId = $(this).data('doc-id');
        const btn = $(this);

        Swal.fire({
            title: '¿Aprobar este documento?',
            text: "Esto marcará el documento como verificado.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            confirmButtonText: 'Sí, aprobar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if(result.isConfirmed){
                btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-1"></i>Procesando...');
                $.post(`{{ url('admin/documents') }}/${docId}/verify`, {
                    _token: "{{ csrf_token() }}"
                }).done(function(r){
                    if(r.success){
                        Swal.fire('¡Aprobado!', r.message, 'success')
                            .then(() => location.reload());
                    }else{
                        Swal.fire('Error', r.message, 'error');
                        btn.prop('disabled', false).html('<i class="fas fa-check me-1"></i>Aprobar');
                    }
                }).fail(function(){
                    Swal.fire('Error', 'Error del servidor', 'error');
                    btn.prop('disabled', false).html('<i class="fas fa-check me-1"></i>Aprobar');
                });
            }
        });
    });

    // Reject Document
    $('.btn-reject-doc').on('click', function(){
        const docId = $(this).data('doc-id');
        Swal.fire({
            title: '¿Rechazar este documento?',
            input: 'textarea',
            inputLabel: 'Motivo del rechazo',
            inputPlaceholder: 'Ingrese el motivo del rechazo...',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Rechazar',
            cancelButtonText: 'Cancelar',
            inputValidator: (value) => {
                if (!value) return '¡Debes proporcionar un motivo!';
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(`{{ url('admin/documents') }}/${docId}/reject`, {
                    _token: "{{ csrf_token() }}",
                    reason: result.value
                }).done(function(r){
                    if(r.success){
                        Swal.fire('¡Rechazado!', r.message, 'success')
                            .then(() => location.reload());
                    }else{
                        Swal.fire('Error', r.message, 'error');
                    }
                }).fail(function(){
                    Swal.fire('Error', 'Error del servidor', 'error');
                });
            }
        });
    });

    // Verify Driver (Approve All)
    $('.btn-verify-driver').on('click', function(){
        const driverId = $(this).data('driver-id');
        Swal.fire({
            title: '¿Aprobar este conductor?',
            text: "Todos los documentos serán marcados como verificados y el conductor será notificado por WhatsApp.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            confirmButtonText: 'Sí, aprobar conductor',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if(result.isConfirmed){
                $.post(`{{ url('admin/drivers') }}/${driverId}/verify`, {
                    _token: "{{ csrf_token() }}"
                }).done(function(r){
                    if(r.success){
                        Swal.fire('¡Aprobado!', r.message, 'success')
                            .then(() => location.reload());
                    }else{
                        Swal.fire('No se puede aprobar', r.message, 'warning');
                    }
                }).fail(function(){
                    Swal.fire('Error', 'Error del servidor', 'error');
                });
            }
        });
    });

    // Reject Driver
    $('.btn-reject-driver').on('click', function(){
        const driverId = $(this).data('driver-id');
        Swal.fire({
            title: '¿Rechazar esta solicitud?',
            input: 'textarea',
            inputLabel: 'Motivo del rechazo',
            inputPlaceholder: 'Ingrese un motivo detallado...',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Rechazar Solicitud',
            inputValidator: (value) => {
                if (!value) return '¡Por favor, proporcione un motivo de rechazo!';
            }
        }).then((result) => {
            if(result.isConfirmed){
                $.post(`{{ url('admin/drivers') }}/${driverId}/reject`, {
                    _token: "{{ csrf_token() }}",
                    reason: result.value
                }).done(function(r){
                    if(r.success){
                        Swal.fire('Rechazado', 'La solicitud del conductor ha sido rechazada.', 'success')
                            .then(() => window.location.href = '{{ route("drivers.pending") }}');
                    }
                });
            }
        });
    });
});
</script>
@endpush