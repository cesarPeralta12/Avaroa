@extends('layout.master')
@section('title', 'Conductor - ' . $driver->user?->name)
@section('main_content')

<style>
    /* Banner always dark-gradient — looks great in both modes */
    .driver-profile-banner {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        border-radius: 16px 16px 0 0;
        padding: 32px 24px 60px;
        position: relative;
    }
    .driver-avatar {
        width: 100px; height: 100px;
        border-radius: 50%;
        border: 4px solid rgba(255,255,255,0.3);
        object-fit: cover;
    }
    .driver-avatar-placeholder {
        width: 100px; height: 100px;
        border-radius: 50%;
        border: 4px solid rgba(255,255,255,0.3);
        background: rgba(255,255,255,0.15);
        display: flex; align-items: center; justify-content: center;
        font-size: 2.5rem; color: rgba(255,255,255,0.8);
    }
    .driver-profile-body {
        margin-top: -36px;
        padding: 0 20px 20px;
    }
    /* Light mode defaults */
    .stat-pill {
        display: inline-flex; align-items: center; gap: 6px;
        background: #f8f9fc; border-radius: 30px;
        padding: 6px 14px; font-size: 0.8rem; font-weight: 600;
        border: 1px solid #e9ecef;
        color: #444;
    }
    .doc-card { transition: transform .15s, box-shadow .15s; }
    .doc-card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,0.12); }
    .doc-preview-wrap {
        height: 180px; overflow: hidden; background: #f8f9fc;
        border-radius: 8px; display: flex; align-items: center; justify-content: center;
        cursor: pointer;
    }
    .doc-preview-wrap img { max-height: 100%; max-width: 100%; object-fit: contain; }
    .info-row {
        display: flex; justify-content: space-between; align-items: center;
        padding: 10px 0; border-bottom: 1px solid #f0f2f5; font-size: .9rem;
    }
    .info-row:last-child { border-bottom: none; }
    /* Status badges — light mode */
    .badge-status-active   { background: #d1fae5; color: #065f46; border: 1px solid #6ee7b7; }
    .badge-status-suspended{ background: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; }
    .badge-status-pending  { background: #fef3c7; color: #92400e; border: 1px solid #fcd34d; }
</style>

<div class="page-content">
    <div class="container-fluid">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('drivers.index') }}">Conductores</a></li>
                <li class="breadcrumb-item active">{{ $driver->user?->name }}</li>
            </ol>
        </nav>

        <div class="row g-4">

            {{-- Left Column --}}
            <div class="col-xl-4">

                {{-- Profile Card --}}
                <div class="card shadow-sm mb-4 overflow-hidden" style="border-radius:16px; border:none;">
                    <div class="driver-profile-banner">
                        <div class="d-flex flex-column align-items-center">
                            @if($driver->user?->profile_photo)
                                <img src="{{ \App\Services\FileUploadService::getUrl($driver->user->profile_photo) }}"
                                     class="driver-avatar mb-3" alt="">
                            @else
                                <div class="driver-avatar-placeholder mb-3">
                                    <i class="fas fa-user"></i>
                                </div>
                            @endif
                            <h5 class="text-white fw-bold mb-1">{{ $driver->user?->name }}</h5>
                            <small class="text-white-50">{{ $driver->user?->email }}</small>
                        </div>
                    </div>

                    <div class="driver-profile-body">
                        {{-- Status badges --}}
                        <div class="d-flex flex-wrap justify-content-center gap-2 mb-4 mt-3">
                            @if(!($driver->user?->is_active))
                                <span class="badge badge-status-suspended px-3 py-2 fs-6">
                                    <i class="fas fa-ban me-1"></i>Suspendido
                                </span>
                            @elseif($driver->is_verified)
                                <span class="badge badge-status-active px-3 py-2 fs-6">
                                    <i class="fas fa-check-circle me-1"></i>Verificado
                                </span>
                            @else
                                <span class="badge badge-status-pending px-3 py-2 fs-6">
                                    <i class="fas fa-clock me-1"></i>Pendiente
                                </span>
                            @endif

                            @if($driver->is_online ?? false)
                                <span class="stat-pill text-success">
                                    <span class="rounded-circle bg-success" style="width:8px;height:8px;display:inline-block"></span>En línea
                                </span>
                            @else
                                <span class="stat-pill text-secondary">
                                    <span class="rounded-circle bg-secondary" style="width:8px;height:8px;display:inline-block"></span>Desconectado
                                </span>
                            @endif
                        </div>

                        {{-- Info rows --}}
                        <div class="px-2">
                            <div class="info-row">
                                <span class="text-muted"><i class="fab fa-whatsapp me-2 text-success"></i>WhatsApp</span>
                                <span class="fw-bold">{{ $driver->user?->whatsapp_number ?? 'N/A' }}</span>
                            </div>
                            <div class="info-row">
                                <span class="text-muted"><i class="fas fa-id-card me-2 text-primary"></i>Licencia</span>
                                <span class="fw-bold">{{ $driver->license_number ?? 'N/A' }}</span>
                            </div>
                            <div class="info-row">
                                <span class="text-muted"><i class="fas fa-calendar me-2 text-info"></i>Registrado</span>
                                <span class="fw-bold">{{ $driver->created_at->format('d M, Y') }}</span>
                            </div>
                            <div class="info-row">
                                <span class="text-muted"><i class="fas fa-star me-2 text-warning"></i>Puntuación</span>
                                <span class="fw-bold text-warning">{{ number_format($driver->score, 1) }}/5.0</span>
                            </div>
                            <div class="info-row">
                                <span class="text-muted"><i class="fas fa-percentage me-2 text-success"></i>Aceptación</span>
                                <span class="fw-bold">{{ number_format($driver->acceptance_rate, 0) }}%</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Vehicle Card --}}
                @if($driver->vehicle)
                <div class="card shadow-sm mb-4" style="border-radius:12px; border:none;">
                    <div class="card-header bg-white border-0 pt-4 pb-2">
                        <h6 class="fw-bold mb-0"><i class="fas fa-car me-2 text-primary"></i>Vehículo Principal</h6>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table table-sm table-borderless mb-0">
                            <tr><td class="text-muted">Tipo</td><td class="fw-bold text-end">{{ ucfirst($driver->vehicle->type) }}</td></tr>
                            <tr><td class="text-muted">Placa</td><td class="fw-bold text-end text-uppercase">{{ $driver->vehicle->plate_number }}</td></tr>
                            <tr><td class="text-muted">Modelo</td><td class="fw-bold text-end">{{ $driver->vehicle->model ?? 'N/A' }}</td></tr>
                            <tr><td class="text-muted">Año</td><td class="fw-bold text-end">{{ $driver->vehicle->year ?? 'N/A' }}</td></tr>
                            <tr><td class="text-muted">Capacidad</td><td class="fw-bold text-end">{{ $driver->vehicle->capacity_weight ?? '0' }} kg</td></tr>
                        </table>
                    </div>
                </div>
                @endif

                {{-- Action Buttons --}}
                <div class="card shadow-sm p-3" style="border-radius:12px; border:none;">
                    <div class="d-grid gap-2">
                        @if(!$driver->is_verified)
                            <button class="btn btn-success btn-verify-driver" data-driver-id="{{ $driver->id }}">
                                <i class="fas fa-check-circle me-2"></i>Aprobar Conductor
                            </button>
                            <button class="btn btn-outline-danger btn-reject-driver" data-driver-id="{{ $driver->id }}">
                                <i class="fas fa-times-circle me-2"></i>Rechazar Solicitud
                            </button>
                        @else
                            @if($driver->user?->is_active)
                                <button class="btn btn-warning btn-suspend-driver"
                                        data-driver-id="{{ $driver->id }}"
                                        data-suspended="0">
                                    <i class="fas fa-ban me-2"></i>Suspender Cuenta
                                </button>
                            @else
                                <button class="btn btn-success btn-suspend-driver"
                                        data-driver-id="{{ $driver->id }}"
                                        data-suspended="1">
                                    <i class="fas fa-check-circle me-2"></i>Reactivar Cuenta
                                </button>
                            @endif
                        @endif
                    </div>
                </div>

            </div>

            {{-- Right Column: Documents --}}
            <div class="col-xl-8">
                <div class="card shadow-sm" style="border-radius:16px; border:none;">
                    <div class="card-header bg-white border-0 pt-4 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">
                            <i class="fas fa-folder-open me-2 text-primary"></i>Verificación De Documentos
                        </h5>
                        <span class="badge bg-primary rounded-pill px-3">{{ $driver->documents->count() }} Documentos</span>
                    </div>
                    <div class="card-body">
                        @if($driver->documents->isEmpty())
                            <div class="text-center py-5 text-muted">
                                <i class="fas fa-folder-open fa-3x mb-3 opacity-25"></i>
                                <p class="mb-0">Aún no se han subido documentos.</p>
                            </div>
                        @else
                            <div class="row g-3">
                                @foreach($driver->documents as $document)
                                @php
                                    $borderColor = match($document->status) {
                                        'verified' => '#10b981',
                                        'rejected' => '#ef4444',
                                        default    => '#f59e0b',
                                    };
                                    // No inline background — handled by avaroa-admin.css dark mode + light fallback
                                @endphp
                                <div class="col-md-6">
                                    <div class="doc-card card h-100" style="border:1.5px solid {{ $borderColor }}; border-radius:12px;">
                                        <div class="card-header d-flex justify-content-between align-items-center border-0 pb-0"
                                             style="background:transparent;">
                                            <span class="fw-bold text-dark small">
                                                {{ $documentTypes[$document->type] ?? ucfirst(str_replace('_', ' ', $document->type)) }}
                                            </span>
                                            @switch($document->status)
                                                @case('verified')
                                                    <span class="badge" style="background:#10b981">
                                                        <i class="fas fa-check me-1"></i>Verificado
                                                    </span>
                                                    @break
                                                @case('rejected')
                                                    <span class="badge bg-danger">
                                                        <i class="fas fa-times me-1"></i>Rechazado
                                                    </span>
                                                    @break
                                                @default
                                                    <span class="badge" style="background:#f59e0b">
                                                        <i class="fas fa-clock me-1"></i>Pendiente
                                                    </span>
                                            @endswitch
                                        </div>

                                        <div class="card-body pt-2">
                                            {{-- Preview --}}
                                            <div class="doc-preview-wrap mb-3"
                                                 onclick="openImageModal('{{ route('documents.preview', $document) }}', '{{ $documentTypes[$document->type] ?? $document->type }}')">
                                                @if(in_array($document->mime_type ?? '', ['image/jpeg', 'image/png', 'image/jpg']))
                                                    <img src="{{ route('documents.preview', $document) }}" alt="Vista Previa">
                                                @else
                                                    <div class="text-center text-muted">
                                                        <i class="fas fa-file-pdf fa-3x text-danger mb-2 d-block"></i>
                                                        <small>{{ $document->original_name }}</small>
                                                    </div>
                                                @endif
                                            </div>

                                            {{-- Meta --}}
                                            <div class="small text-muted">
                                                <div class="d-flex justify-content-between mb-1">
                                                    <span>Archivo:</span>
                                                    <span class="text-truncate ms-2 fw-medium text-dark" style="max-width:140px"
                                                          title="{{ $document->original_name }}">
                                                        {{ $document->original_name ?? 'N/A' }}
                                                    </span>
                                                </div>
                                                <div class="d-flex justify-content-between mb-1">
                                                    <span>Tamaño:</span>
                                                    <span>{{ $document->file_size ? number_format($document->file_size / 1024, 1) . ' KB' : 'N/A' }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span>Subido:</span>
                                                    <span>{{ $document->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>

                                            @if($document->verified_at)
                                                <div class="mt-2 p-2 rounded small"
                                                     style="background:rgba(0,0,0,0.04)">
                                                    <i class="fas fa-{{ $document->status == 'verified' ? 'check' : 'times' }}-circle me-1
                                                       text-{{ $document->status == 'verified' ? 'success' : 'danger' }}"></i>
                                                    <strong>{{ $document->status == 'verified' ? 'Aprobado' : 'Rechazado' }}</strong>
                                                    por {{ $document->verifier?->name ?? 'Admin' }}
                                                    el {{ $document->verified_at->format('d M, Y') }}
                                                    @if($document->rejection_reason)
                                                        <br><span class="text-danger"><strong>Motivo:</strong> {{ $document->rejection_reason }}</span>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>

                                        @if($document->status == 'pending')
                                            <div class="card-footer border-0" style="background:transparent;">
                                                <div class="d-flex gap-2">
                                                    <button class="btn btn-success btn-sm flex-fill btn-verify-doc"
                                                            data-doc-id="{{ $document->id }}">
                                                        <i class="fas fa-check me-1"></i>Aprobar
                                                    </button>
                                                    <button class="btn btn-outline-danger btn-sm flex-fill btn-reject-doc"
                                                            data-doc-id="{{ $document->id }}">
                                                        <i class="fas fa-times me-1"></i>Rechazar
                                                    </button>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="card-footer border-0 pt-0" style="background:transparent;">
                                            <a href="{{ route('documents.download', $document) }}"
                                               class="btn btn-outline-secondary btn-sm w-100">
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

{{-- Image Modal --}}
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px; overflow:hidden;">
            <div class="modal-header border-0">
                <h6 class="modal-title fw-bold" id="modalTitle">Vista Previa</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-0 bg-dark">
                <img id="modalImage" src="" class="img-fluid" style="max-height:80vh;" alt="">
            </div>
            <div class="modal-footer border-0">
                <a id="modalDownload" href="#" class="btn btn-primary btn-sm">
                    <i class="fas fa-download me-1"></i>Descargar
                </a>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
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
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#10b981',
            confirmButtonText: 'Sí, aprobar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if(result.isConfirmed){
                btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-1"></i>...');
                $.post(`{{ url('admin/documents') }}/${docId}/verify`, { _token: "{{ csrf_token() }}" })
                    .done(r => {
                        if(r.success) Swal.fire('¡Aprobado!', r.message, 'success').then(() => location.reload());
                        else Swal.fire('Error', r.message, 'error');
                    })
                    .fail(() => Swal.fire('Error', 'Error del servidor', 'error'))
                    .always(() => btn.prop('disabled', false).html('<i class="fas fa-check me-1"></i>Aprobar'));
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
            inputPlaceholder: 'Ingrese el motivo...',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            confirmButtonText: 'Rechazar',
            cancelButtonText: 'Cancelar',
            inputValidator: v => !v && '¡Debes proporcionar un motivo!'
        }).then((result) => {
            if(result.isConfirmed){
                $.post(`{{ url('admin/documents') }}/${docId}/reject`, {
                    _token: "{{ csrf_token() }}", reason: result.value
                }).done(r => {
                    if(r.success) Swal.fire('Rechazado', r.message, 'success').then(() => location.reload());
                    else Swal.fire('Error', r.message, 'error');
                }).fail(() => Swal.fire('Error', 'Error del servidor', 'error'));
            }
        });
    });

    // Approve Driver
    $('.btn-verify-driver').on('click', function(){
        const driverId = $(this).data('driver-id');
        Swal.fire({
            title: '¿Aprobar este conductor?',
            text: 'Todos los documentos serán verificados y el conductor será notificado.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#10b981',
            confirmButtonText: 'Sí, aprobar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if(result.isConfirmed){
                $.post(`{{ url('admin/drivers') }}/${driverId}/verify`, { _token: "{{ csrf_token() }}" })
                    .done(r => {
                        if(r.success) Swal.fire('¡Aprobado!', r.message, 'success').then(() => location.reload());
                        else Swal.fire('No se puede aprobar', r.message, 'warning');
                    })
                    .fail(() => Swal.fire('Error', 'Error del servidor', 'error'));
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
            confirmButtonColor: '#ef4444',
            confirmButtonText: 'Rechazar Solicitud',
            cancelButtonText: 'Cancelar',
            inputValidator: v => !v && '¡Por favor proporcione un motivo!'
        }).then((result) => {
            if(result.isConfirmed){
                $.post(`{{ url('admin/drivers') }}/${driverId}/reject`, {
                    _token: "{{ csrf_token() }}", reason: result.value
                }).done(r => {
                    if(r.success) Swal.fire('Rechazado', r.message, 'success')
                        .then(() => window.location.href = '{{ route("drivers.pending") }}');
                }).fail(() => Swal.fire('Error', 'Error del servidor', 'error'));
            }
        });
    });

    // Suspend / Reactivate Driver
    $('.btn-suspend-driver').on('click', function(){
        const driverId  = $(this).data('driver-id');
        const suspended = parseInt($(this).data('suspended')); // 0 = active → suspend, 1 = suspended → reactivate
        const title     = suspended ? '¿Reactivar este conductor?' : '¿Suspender este conductor?';
        const text      = suspended
            ? 'El conductor podrá volver a iniciar sesión.'
            : 'El conductor no podrá iniciar sesión mientras esté suspendido.';
        const confirmColor = suspended ? '#10b981' : '#f59e0b';
        const confirmText  = suspended ? 'Sí, reactivar' : 'Sí, suspender';

        Swal.fire({
            title, text, icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: confirmColor,
            confirmButtonText: confirmText,
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if(result.isConfirmed){
                $.post(`{{ url('admin/drivers') }}/${driverId}/suspend`, { _token: "{{ csrf_token() }}" })
                    .done(r => {
                        if(r.success) Swal.fire('Listo', r.message, 'success').then(() => location.reload());
                        else Swal.fire('Error', r.message, 'error');
                    })
                    .fail(() => Swal.fire('Error', 'Error del servidor', 'error'));
            }
        });
    });

});
</script>
@endpush
