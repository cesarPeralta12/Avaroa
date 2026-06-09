@extends('layout.master')
@section('title', 'Gestión de Solicitudes de Recarga')
@section('css')
<style>
    .status-pending { 
        background: #f59e0b; 
        color: #fff; 
    }
    .status-approved { 
        background: #10b981; 
        color: #fff; 
    }
    .status-rejected { 
        background: #ef4444; 
        color: #fff; 
    }

    .request-card {
        border-left: 4px solid;
        transition: all 0.3s ease;
    }
    .request-card:hover {
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transform: translateY(-2px);
    }
    .request-card.pending { border-left-color: #f59e0b; }
    .request-card.approved { border-left-color: #10b981; }
    .request-card.rejected { border-left-color: #ef4444; }

    .status-badge {
        padding: 8px 14px;
        border-radius: 30px;
        font-size: 0.9rem;
        font-weight: 600;
    }
</style>
@endsection

@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        {{-- Stats --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h6>Pendientes</h6>
                        <h3>{{ $stats['pending'] }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h6>Aprobadas</h6>
                        <h3>{{ $stats['approved'] }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <h6>Rechazadas</h6>
                        <h3>{{ $stats['rejected'] }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h6>Monto Total Aprobado</h6>
                        <h3>{{ number_format($stats['total_amount'], 2) }} Bs</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Filters --}}
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" class="row g-3">
                    <div class="col-md-3">
                        <input type="text" name="search" class="form-control"
                               placeholder="Buscar por conductor o ID" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="status" class="form-select">
                            <option value="">Todos los Estados</option>
                            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pendiente</option>
                            <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Aprobada</option>
                            <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rechazada</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="method" class="form-select">
                            <option value="">Todos los Métodos</option>
                            <option value="WHATSAPP" {{ request('method') === 'WHATSAPP' ? 'selected' : '' }}>WhatsApp</option>
                            <option value="BANK_TRANSFER" {{ request('method') === 'BANK_TRANSFER' ? 'selected' : '' }}>Transferencia Bancaria</option>
                            <option value="QR" {{ request('method') === 'QR' ? 'selected' : '' }}>QR</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Filtrar
                        </button>
                        <a href="{{ route('topup-requests.index') }}" class="btn btn-secondary">
                            <i class="fas fa-redo"></i> Restablecer
                        </a>
                    </div>
                </form>
            </div>
        </div>

        {{-- Requests List --}}
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Solicitudes de Recarga</h4>
            </div>
            <div class="card-body">
                @forelse($requests as $request)
                <div class="request-card {{ $request->status }} card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        @if($request->driver?->user?->profile_photo)
                                            <img src="{{ asset($request->driver->user->profile_photo) }}"
                                                 class="rounded-circle" width="50" height="50"
                                                 style="object-fit: cover; width: 50px; height: 50px;">
                                        @else
                                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white"
                                                 style="width: 50px; height: 50px;">
                                                {{ strtoupper(substr($request->driver?->user?->name ?? 'C', 0, 1)) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <strong>{{ $request->driver?->user?->name ?? 'N/A' }}</strong>
                                        <br>
                                        <small class="text-muted">Solicitud #{{ $request->id }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <h4 class="mb-0">{{ number_format($request->amount, 2) }} Bs</h4>
                                <small class="text-muted">{{ $request->method == 'WHATSAPP' ? 'WhatsApp' : ($request->method == 'BANK_TRANSFER' ? 'Transferencia Bancaria' : 'QR') }}</small>
                            </div>
                            <div class="col-md-2">
                                <span class="badge status-badge status-{{ $request->status }}">
                                    @if ($request->status == 'pending')
                                        ⏳ Pendiente
                                    @elseif($request->status == 'approved')
                                        ✅ Aprobada
                                    @elseif($request->status == 'rejected')
                                        ❌ Rechazada
                                    @endif
                                </span>
                            </div>
                            <div class="col-md-2">
                                <small class="text-muted">
                                    {{ $request->created_at->format('d M Y H:i') }}
                                </small>
                            </div>
                            <div class="col-md-3 text-end">
                                @if($request->status === 'pending')
                                    <button class="btn btn-sm btn-success approve-btn"
                                            data-id="{{ $request->id }}"
                                            data-amount="{{ $request->amount }}"
                                            data-driver="{{ $request->driver?->user?->name }}">
                                        <i class="fas fa-check"></i> Aprobar
                                    </button>
                                    <button class="btn btn-sm btn-danger reject-btn"
                                            data-id="{{ $request->id }}">
                                        <i class="fas fa-times"></i> Rechazar
                                    </button>
                                @endif
                                <a href="{{ route('topup-requests.show', $request) }}"
                                   class="btn btn-sm btn-info" title="Ver Detalles">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>

                        @if($request->review_note)
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="alert alert-secondary mb-0">
                                    <strong>Nota de Revisión:</strong> {{ $request->review_note }}
                                    @if($request->reviewer)
                                        <br><small>Revisado por: {{ $request->reviewer->name }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-inbox fa-3x mb-3"></i>
                    <h5>No se encontraron solicitudes de recarga</h5>
                </div>
                @endforelse

                {{ $requests->links() }}
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
                    <h5 class="modal-title">Aprobar Solicitud de Recarga</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="approve_request_id" name="request_id">
                    <p>Conductor: <strong id="approve_driver_name"></strong></p>
                    <p>Monto: <strong id="approve_amount"></strong> Bs</p>
                    <div class="mb-3">
                        <label class="form-label">Nota de Revisión (Opcional)</label>
                        <textarea name="review_note" class="form-control" rows="3"
                                  placeholder="Agrega cualquier nota sobre esta aprobación..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Confirmar Aprobación</button>
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
                    <h5 class="modal-title">Rechazar Solicitud de Recarga</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="reject_request_id" name="request_id">
                    <div class="mb-3">
                        <label class="form-label">Motivo del Rechazo <span class="text-danger">*</span></label>
                        <textarea name="review_note" class="form-control" rows="3"
                                  placeholder="Explica por qué se está rechazando esta solicitud..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Confirmar Rechazo</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Aprobar Solicitud
    $('.approve-btn').click(function() {
        const id = $(this).data('id');
        const amount = $(this).data('amount');
        const driver = $(this).data('driver');

        $('#approve_request_id').val(id);
        $('#approve_amount').text(amount);
        $('#approve_driver_name').text(driver);
        $('#approveModal').modal('show');
    });

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

    // Rechazar Solicitud
    $('.reject-btn').click(function() {
        const id = $(this).data('id');
        $('#reject_request_id').val(id);
        $('#rejectModal').modal('show');
    });

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