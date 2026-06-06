@extends('layout.master')
@section('title', 'Detalles de Solicitud de Recarga')

@section('css')
<style>
    .detail-card {
        background: linear-gradient(135deg, #f8fafc 0%, #032328 100%);
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        margin-bottom: 25px;
        border: none;
    }

    .status-badge {
        padding: 10px 24px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 1.05rem;
    }
    .status-pending  { background: #fef3c7; color: #92400e; }
    .status-approved { background: #d1fae5; color: #065f46; }
    .status-rejected { background: #fee2e2; color: #991b1b; }

    .driver-avatar {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #f1f5f9;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .driver-avatar-placeholder {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2.8rem;
        font-weight: bold;
        border: 4px solid #f1f5f9;
    }

    .amount-large {
        font-size: 3.2rem;
        font-weight: 700;
        color: #1e2937;
    }

    .info-row {
        display: flex;
        padding: 14px 0;
        border-bottom: 1px solid #e2e8f0;
    }
    .info-label {
        width: 160px;
        font-weight: 600;
        color: #64748b;
    }
    .info-value {
        flex: 1;
        color: #1e2937;
    }

    .timeline {
        position: relative;
        padding-left: 35px;
    }
    .timeline-item {
        position: relative;
        padding-bottom: 28px;
    }
    .timeline-item::before {
        content: '';
        position: absolute;
        left: -18px;
        top: 6px;
        width: 14px;
        height: 14px;
        border-radius: 50%;
        background: #6366f1;
        border: 3px solid white;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
    }
    .timeline-item::after {
        content: '';
        position: absolute;
        left: -12px;
        top: 20px;
        width: 2px;
        height: calc(100% - 20px);
        background: #e2e8f0;
    }
    .timeline-item:last-child::after {
        display: none;
    }

    .proof-image {
        max-width: 100%;
        max-height: 420px;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .proof-image:hover {
        transform: scale(1.03);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .action-buttons {
        display: flex;
        gap: 15px;
        margin-top: 25px;
    }
</style>
@endsection

@section('main_content')
<div class="page-content">
    <div class="container-fluid">

        {{-- Back Button --}}
        <div class="row mb-4">
            <div class="col-12">
                <a href="{{ route('topup-requests.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver a las Solicitudes
                </a>
            </div>
        </div>

        {{-- Request Header --}}
        <div class="detail-card">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h4 class="mb-2">Solicitud de Recarga #{{ $topUpRequest->id }}</h4>
                    <p class="text-muted mb-0">
                        <i class="far fa-clock me-1"></i>
                        Creada: {{ $topUpRequest->created_at->format('d M Y, H:i') }}
                    </p>
                </div>
                <div>
                    <span class="status-badge status-{{ $topUpRequest->status }}">
                        @if($topUpRequest->status == 'pending')
                            Pendiente
                        @elseif($topUpRequest->status == 'approved')
                            Aprobada
                        @elseif($topUpRequest->status == 'rejected')
                            Rechazada
                        @endif
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Left Column --}}
            <div class="col-md-5">

                {{-- Driver Information --}}
                <div class="detail-card">
                    <h5 class="mb-4">
                        <i class="fas fa-user me-2 text-primary"></i>
                        Información del Conductor
                    </h5>
                    <div class="text-center mb-4">
                        @if($topUpRequest->driver?->user?->profile_photo)
                            <img src="{{ asset($topUpRequest->driver->user->profile_photo) }}"
                                 class="driver-avatar" alt="Foto del Conductor">
                        @else
                            <div class="driver-avatar-placeholder">
                                {{ strtoupper(substr($topUpRequest->driver?->user?->name ?? 'C', 0, 1)) }}
                            </div>
                        @endif
                        <h5 class="mt-3 mb-1">{{ $topUpRequest->driver?->user?->name ?? 'N/A' }}</h5>
                        <p class="text-muted">ID del Conductor: {{ $topUpRequest->driver_id }}</p>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Correo Electrónico</span>
                        <span class="info-value">{{ $topUpRequest->driver?->user?->email ?? 'N/A' }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Teléfono</span>
                        <span class="info-value">{{ $topUpRequest->driver?->user?->phone ?? 'N/A' }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">WhatsApp</span>
                        <span class="info-value">
                            @if($topUpRequest->driver?->user?->whatsapp_number)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $topUpRequest->driver->user->whatsapp_number) }}"
                                   target="_blank" class="text-success">
                                    {{ $topUpRequest->driver->user->whatsapp_number }}
                                    <i class="fab fa-whatsapp ms-1"></i>
                                </a>
                            @else
                                N/A
                            @endif
                        </span>
                    </div>
                </div>

                {{-- Wallet Information --}}
                <div class="detail-card">
                    <h5 class="mb-4">
                        <i class="fas fa-wallet me-2 text-success"></i>
                        Información de la Billetera
                    </h5>
                    <div class="info-row">
                        <span class="info-label">Saldo Actual</span>
                        <span class="info-value">
                            <strong class="{{ ($topUpRequest->wallet->balance ?? 0) >= 0 ? 'text-success' : 'text-danger' }}">
                                {{ number_format($topUpRequest->wallet->balance ?? 0, 2) }} Bs
                            </strong>
                        </span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Estado de Billetera</span>
                        <span class="info-value">
                            @if($topUpRequest->wallet?->is_blocked)
                                <span class="badge bg-danger">Bloqueada</span>
                            @else
                                <span class="badge bg-success">Activa</span>
                            @endif
                        </span>
                    </div>
                    @if($topUpRequest->wallet?->is_blocked && $topUpRequest->wallet->blocked_reason)
                    <div class="info-row">
                        <span class="info-label">Motivo del Bloqueo</span>
                        <span class="info-value text-danger">{{ $topUpRequest->wallet->blocked_reason }}</span>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Right Column --}}
            <div class="col-md-7">

                {{-- Request Details --}}
                <div class="detail-card">
                    <h5 class="mb-4">
                        <i class="fas fa-info-circle me-2 text-info"></i>
                        Detalles de la Solicitud
                    </h5>
                    <div class="text-center mb-5">
                        <span class="amount-large">{{ number_format($topUpRequest->amount, 2) }} Bs</span>
                        <p class="text-muted mt-2">Monto Solicitado</p>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Método de Pago</span>
                        <span class="info-value">
                            @if($topUpRequest->method === 'WHATSAPP')
                                <i class="fab fa-whatsapp text-success me-1"></i> WhatsApp
                            @elseif($topUpRequest->method === 'BANK_TRANSFER')
                                <i class="fas fa-university text-primary me-1"></i> Transferencia Bancaria
                            @elseif($topUpRequest->method === 'QR')
                                <i class="fas fa-qrcode text-info me-1"></i> Código QR
                            @else
                                {{ $topUpRequest->method }}
                            @endif
                        </span>
                    </div>

                    @if($topUpRequest->proof_file_url)
                    <div class="info-row">
                        <span class="info-label">Comprobante de Pago</span>
                        <span class="info-value">
                            <a href="{{ asset('storage/'.$topUpRequest->proof_file_url) }}"
                               target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-image me-1"></i> Ver Comprobante
                            </a>
                        </span>
                    </div>
                    @endif

                    @if($topUpRequest->status !== 'pending')
                    <div class="info-row">
                        <span class="info-label">Revisado Por</span>
                        <span class="info-value">
                            {{ $topUpRequest->reviewer?->name ?? 'N/A' }}
                            @if($topUpRequest->reviewer)
                                <br><small class="text-muted">{{ $topUpRequest->reviewer->email }}</small>
                            @endif
                        </span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Nota de Revisión</span>
                        <span class="info-value">
                            {{ $topUpRequest->review_note ?? 'Sin nota proporcionada' }}
                        </span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Revisado El</span>
                        <span class="info-value">
                            {{ $topUpRequest->updated_at->format('d M Y, H:i') }}
                        </span>
                    </div>
                    @endif

                    {{-- Action Buttons --}}
                    @if($topUpRequest->status === 'pending')
                    <div class="action-buttons">
                        <button class="btn btn-success btn-lg flex-grow-1 approve-btn"
                                data-id="{{ $topUpRequest->id }}"
                                data-amount="{{ $topUpRequest->amount }}"
                                data-driver="{{ $topUpRequest->driver?->user?->name }}">
                            <i class="fas fa-check-circle me-2"></i> Aprobar Solicitud
                        </button>
                        <button class="btn btn-danger btn-lg flex-grow-1 reject-btn"
                                data-id="{{ $topUpRequest->id }}">
                            <i class="fas fa-times-circle me-2"></i> Rechazar Solicitud
                        </button>
                    </div>
                    @endif
                </div>

                {{-- Timeline --}}
                <div class="detail-card">
                    <h5 class="mb-4">
                        <i class="fas fa-history me-2 text-warning"></i>
                        Historial de la Solicitud
                    </h5>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-time">{{ $topUpRequest->created_at->format('d M Y, H:i') }}</div>
                            <div class="timeline-title">
                                <i class="fas fa-plus-circle text-primary me-1"></i> Solicitud Creada
                            </div>
                            <div class="timeline-desc">
                                El conductor solicitó una recarga de {{ number_format($topUpRequest->amount, 2) }} Bs 
                                mediante {{ $topUpRequest->method == 'WHATSAPP' ? 'WhatsApp' : ($topUpRequest->method == 'BANK_TRANSFER' ? 'Transferencia Bancaria' : 'Código QR') }}
                            </div>
                        </div>

                        @if($topUpRequest->status === 'approved')
                        <div class="timeline-item">
                            <div class="timeline-time">{{ $topUpRequest->updated_at->format('d M Y, H:i') }}</div>
                            <div class="timeline-title">
                                <i class="fas fa-check-circle text-success me-1"></i> Solicitud Aprobada
                            </div>
                            <div class="timeline-desc">
                                Aprobada por {{ $topUpRequest->reviewer?->name ?? 'Administrador' }}
                                @if($topUpRequest->review_note)
                                    <br><em>"{{ $topUpRequest->review_note }}"</em>
                                @endif
                            </div>
                        </div>
                        @endif

                        @if($topUpRequest->status === 'rejected')
                        <div class="timeline-item">
                            <div class="timeline-time">{{ $topUpRequest->updated_at->format('d M Y, H:i') }}</div>
                            <div class="timeline-title">
                                <i class="fas fa-times-circle text-danger me-1"></i> Solicitud Rechazada
                            </div>
                            <div class="timeline-desc">
                                Rechazada por {{ $topUpRequest->reviewer?->name ?? 'Administrador' }}
                                @if($topUpRequest->review_note)
                                    <br><em>"{{ $topUpRequest->review_note }}"</em>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Approve Modal --}}
<div class="modal fade" id="approveModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="approveForm">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title"><i class="fas fa-check-circle me-2"></i> Aprobar Solicitud de Recarga</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="approve_request_id" name="request_id">
                    <div class="text-center mb-4">
                        <p class="mb-1">Conductor</p>
                        <h5 id="approve_driver_name" class="mb-3"></h5>
                        <p class="mb-1">Monto</p>
                        <h3 class="text-success mb-0" id="approve_amount"></h3>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nota de Revisión (Opcional)</label>
                        <textarea name="review_note" class="form-control" rows="3"
                                  placeholder="Agrega cualquier nota sobre esta aprobación..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check me-1"></i> Confirmar Aprobación
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Reject Modal --}}
<div class="modal fade" id="rejectModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="rejectForm">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title"><i class="fas fa-times-circle me-2"></i> Rechazar Solicitud de Recarga</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="reject_request_id" name="request_id">
                    <div class="mb-3">
                        <label class="form-label">Motivo del Rechazo <span class="text-danger">*</span></label>
                        <textarea name="review_note" class="form-control" rows="4"
                                  placeholder="Explica por qué se está rechazando esta solicitud..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-times me-1"></i> Confirmar Rechazo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {

    // Approve Button
    $('.approve-btn').click(function() {
        const id = $(this).data('id');
        const amount = $(this).data('amount');
        const driver = $(this).data('driver');

        $('#approve_request_id').val(id);
        $('#approve_amount').text(amount + ' Bs');
        $('#approve_driver_name').text(driver);
        $('#approveModal').modal('show');
    });

    // Reject Button
    $('.reject-btn').click(function() {
        const id = $(this).data('id');
        $('#reject_request_id').val(id);
        $('#rejectModal').modal('show');
    });

    // Approve Form Submit
    $('#approveForm').submit(function(e) {
        e.preventDefault();
        const requestId = $('#approve_request_id').val();

        Swal.fire({
            title: 'Procesando Aprobación...',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: `/admin/topup-requests/${requestId}/approve`,
            method: 'POST',
            data: $(this).serialize(),
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(response) {
                $('#approveModal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: '¡Aprobada!',
                    text: response.message,
                    timer: 2000
                }).then(() => location.reload());
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: xhr.responseJSON?.message || 'No se pudo aprobar la solicitud'
                });
            }
        });
    });

    // Reject Form Submit
    $('#rejectForm').submit(function(e) {
        e.preventDefault();
        const requestId = $('#reject_request_id').val();

        Swal.fire({
            title: 'Procesando Rechazo...',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: `/admin/topup-requests/${requestId}/reject`,
            method: 'POST',
            data: $(this).serialize(),
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(response) {
                $('#rejectModal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: '¡Rechazada!',
                    text: response.message,
                    timer: 2000
                }).then(() => location.reload());
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: xhr.responseJSON?.message || 'No se pudo rechazar la solicitud'
                });
            }
        });
    });
});
</script>
@endpush