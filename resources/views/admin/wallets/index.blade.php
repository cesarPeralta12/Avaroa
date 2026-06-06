@extends('layout.master')
@section('title', 'Gestión de Billeteras')
@section('css')
<style>
    .wallet-card {
        transition: all 0.3s ease;
    }
    .wallet-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .balance-positive {
        color: #38a169;
    }
    .balance-negative {
        color: #e53e3e;
    }
    .stats-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px;
        padding: 20px;
    }
    .expiration-warning {
        color: #f59e0b;
        font-size: 0.8rem;
    }
    .expiration-danger {
        color: #ef4444;
        font-size: 0.8rem;
        font-weight: 600;
    }
</style>
@endsection

@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        {{-- Stats Cards --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stats-card">
                    <h6 class="text-white-50">Saldo Total</h6>
                    <h3 class="mb-0">{{ number_format($stats['total_balance'], 2) }} Bs</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <h6 class="text-white-50">Total de Billeteras</h6>
                    <h3 class="mb-0">{{ $stats['total_wallets'] }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <h6 class="text-white-50">Billeteras Activas</h6>
                    <h3 class="mb-0">{{ $stats['active_wallets'] }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <h6 class="text-white-50">Billeteras Bloqueadas</h6>
                    <h3 class="mb-0">{{ $stats['blocked_wallets'] }}</h3>
                </div>
            </div>
        </div>

        {{-- Filters --}}
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" class="row g-3">
                    <div class="col-md-3">
                        <input type="text" name="search" class="form-control"
                               placeholder="Buscar conductor..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="status" class="form-select">
                            <option value="">Todos los Estados</option>
                            <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Activo</option>
                            <option value="blocked" {{ request('status') === 'blocked' ? 'selected' : '' }}>Bloqueado</option>
                            <option value="expired" {{ request('status') === 'expired' ? 'selected' : '' }}>Expirado</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="min_balance" class="form-control"
                               placeholder="Saldo Mínimo" value="{{ request('min_balance') }}">
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="max_balance" class="form-control"
                               placeholder="Saldo Máximo" value="{{ request('max_balance') }}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Filtrar
                        </button>
                        <a href="{{ route('wallets.index') }}" class="btn btn-secondary">
                            <i class="fas fa-redo"></i> Restablecer
                        </a>
                    </div>
                </form>
            </div>
        </div>

        {{-- Wallets Table --}}
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Billeteras de Conductores</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Conductor</th>
                                <th>Saldo</th>
                                <th>Total Créditos</th>
                                <th>Total Débitos</th>
                                <th>Estado / Expiración</th>
                                <th>Última Actualización</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($wallets as $wallet)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            @if($wallet->driver?->user?->profile_photo)
                                                <img src="{{ asset($wallet->driver->user->profile_photo) }}"
                                                     class="rounded-circle" width="50" height="50">
                                            @else
                                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white"
                                                     style="width: 50px; height: 50px;">
                                                    {{ strtoupper(substr($wallet->driver?->user?->name ?? 'C', 0, 1)) }}
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <strong>{{ $wallet->driver?->user?->name ?? 'N/A' }}</strong>
                                            <br>
                                            <small class="text-muted">ID: {{ $wallet->driver_id }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="{{ $wallet->balance >= 0 ? 'balance-positive' : 'balance-negative' }}">
                                        {{ number_format($wallet->balance, 2) }} Bs
                                    </h5>
                                </td>
                                <td>
                                    <span class="text-success">
                                        +{{ number_format($wallet->total_credits ?? 0, 2) }} Bs
                                    </span>
                                </td>
                                <td>
                                    <span class="text-danger">
                                        -{{ number_format($wallet->total_debits ?? 0, 2) }} Bs
                                    </span>
                                </td>
                                <td>
                                    @if($wallet->is_blocked)
                                        <span class="badge bg-danger">Bloqueado</span>
                                        @if($wallet->blocked_reason)
                                            <br><small class="text-muted">{{ Str::limit($wallet->blocked_reason, 20) }}</small>
                                        @endif
                                    @elseif($wallet->wallet_status === 'expired')
                                        <span class="badge bg-warning text-dark">Expirado</span>
                                        <br><small class="expiration-danger">Monto perdido: {{ number_format($wallet->expired_balance_amount ?? 0, 2) }} Bs</small>
                                    @else
                                        <span class="badge bg-success">Activo</span>
                                        @if($wallet->balance_expiration_date && $wallet->balance > 0)
                                            <br>
                                            @if($wallet->balance_expiration_date->isPast())
                                                <small class="expiration-danger">Expirado {{ $wallet->balance_expiration_date->diffForHumans() }}</small>
                                            @elseif($wallet->balance_expiration_date->diffInDays(now()) <= 3)
                                                <small class="expiration-danger">Expira {{ $wallet->balance_expiration_date->diffForHumans() }}</small>
                                            @else
                                                <small class="expiration-warning">Expira {{ $wallet->balance_expiration_date->diffForHumans() }}</small>
                                            @endif
                                        @endif
                                    @endif
                                </td>
                                <td>{{ $wallet->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('wallets.show', $wallet) }}" class="btn btn-sm btn-info" title="Ver Detalles">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-warning adjust-balance-btn"
                                            data-id="{{ $wallet->id }}"
                                            data-driver="{{ $wallet->driver?->user?->name }}"
                                            data-balance="{{ $wallet->balance }}"
                                            title="Ajustar Saldo">
                                        <i class="fas fa-sliders-h"></i>
                                    </button>
                                    <button class="btn btn-sm {{ $wallet->is_blocked ? 'btn-success' : 'btn-danger' }} toggle-block-btn"
                                            data-id="{{ $wallet->id }}"
                                            data-status="{{ $wallet->is_blocked }}"
                                            title="{{ $wallet->is_blocked ? 'Desbloquear' : 'Bloquear' }}">
                                        <i class="fas {{ $wallet->is_blocked ? 'fa-unlock' : 'fa-ban' }}"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    No se encontraron billeteras
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $wallets->links() }}
            </div>
        </div>
    </div>
</div>

{{-- Adjust Balance Modal --}}
<div class="modal fade" id="adjustBalanceModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="adjustBalanceForm">
                <div class="modal-header">
                    <h5 class="modal-title">Ajustar Saldo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="adjust_wallet_id" name="wallet_id">
                    <p>Conductor: <strong id="adjust_driver_name"></strong></p>
                    <p>Saldo Actual: <strong id="adjust_current_balance"></strong> Bs</p>
                    
                    <div class="mb-3">
                        <label class="form-label">Tipo de Ajuste</label>
                        <select class="form-select" name="type" required>
                            <option value="credit">Crédito (Agregar)</option>
                            <option value="debit">Débito (Restar)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Monto (Bs)</label>
                        <input type="number" name="amount" class="form-control"
                               step="0.01" min="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Motivo</label>
                        <textarea name="reason" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar Ajuste</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Block Reason Modal --}}
<div class="modal fade" id="blockReasonModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="blockReasonForm">
                <div class="modal-header">
                    <h5 class="modal-title">Bloquear Billetera</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="block_wallet_id" name="wallet_id">
                    <div class="mb-3">
                        <label class="form-label">Motivo del Bloqueo</label>
                        <textarea name="reason" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Bloquear Billetera</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Ajustar Saldo
    $('.adjust-balance-btn').click(function() {
        const id = $(this).data('id');
        const driver = $(this).data('driver');
        const balance = $(this).data('balance');
        
        $('#adjust_wallet_id').val(id);
        $('#adjust_driver_name').text(driver);
        $('#adjust_current_balance').text(balance);
        $('#adjustBalanceModal').modal('show');
    });

    $('#adjustBalanceForm').submit(function(e) {
        e.preventDefault();
        const walletId = $('#adjust_wallet_id').val();
        
        Swal.fire({
            title: 'Procesando...',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: `/admin/wallets/${walletId}/adjust-balance`,
            method: 'POST',
            data: $(this).serialize(),
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: response.message,
                    timer: 2000
                }).then(() => location.reload());
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: xhr.responseJSON?.message || 'No se pudo ajustar el saldo'
                });
            }
        });
    });

    // Toggle Block / Unblock
    $('.toggle-block-btn').click(function() {
        const id = $(this).data('id');
        const isBlocked = $(this).data('status');

        if (isBlocked) {
            Swal.fire({
                title: '¿Desbloquear Billetera?',
                text: 'Esto permitirá al conductor volver a usar su billetera.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí, Desbloquear',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    toggleBlockStatus(id, '');
                }
            });
        } else {
            $('#block_wallet_id').val(id);
            $('#blockReasonModal').modal('show');
        }
    });

    $('#blockReasonForm').submit(function(e) {
        e.preventDefault();
        const walletId = $('#block_wallet_id').val();
        const reason = $(this).find('[name="reason"]').val();
        $('#blockReasonModal').modal('hide');
        toggleBlockStatus(walletId, reason);
    });

    function toggleBlockStatus(walletId, reason) {
        Swal.fire({
            title: 'Procesando...',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: `/admin/wallets/${walletId}/toggle-block`,
            method: 'PUT',
            data: {reason: reason},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: response.message,
                    timer: 2000
                }).then(() => location.reload());
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: xhr.responseJSON?.message || 'No se pudo actualizar el estado'
                });
            }
        });
    }
});
</script>
@endpush