@extends('layout.master')
@section('title', 'Detalles de la Billetera')
@section('css')
<style>
    .info-card {
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        margin-bottom: 25px;
        border: none;
    }
    .driver-info-card {
        background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
    }
    .wallet-info-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    .driver-avatar {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid white;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }
    .driver-avatar-placeholder {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2.2rem;
        font-weight: bold;
        border: 5px solid white;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }
    .balance-large {
        font-size: 3.2rem;
        font-weight: 700;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .transaction-credit { color: #34d399; }
    .transaction-debit { color: #f87171; }
    .stat-box {
        background: rgba(255,255,255,0.15);
        border-radius: 12px;
        padding: 15px 10px;
        text-align: center;
        backdrop-filter: blur(5px);
    }
    .expiration-alert {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 20px;
    }
</style>
@endsection

@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <a href="{{ route('wallets.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver a las Billeteras
                </a>
            </div>
        </div>

        <div class="row">
            {{-- Driver Info Card --}}
            <div class="col-md-4">
                <div class="info-card driver-info-card">
                    <h5 class="mb-4 text-dark fw-bold">
                        <i class="fas fa-user-circle me-2"></i> Información del Conductor
                    </h5>
                    
                    <div class="text-center mb-4">
                        @if($wallet->driver?->user?->profile_photo)
                            <img src="{{ asset($wallet->driver->user->profile_photo) }}"
                                 class="driver-avatar" alt="Foto del Conductor">
                        @else
                            <div class="driver-avatar-placeholder">
                                {{ strtoupper(substr($wallet->driver?->user?->name ?? 'C', 0, 1)) }}
                            </div>
                        @endif
                    </div>

                    <h5 class="text-center text-dark fw-bold mb-1">
                        {{ $wallet->driver?->user?->name ?? 'N/A' }}
                    </h5>
                    <p class="text-center text-muted mb-4">
                        ID: {{ $wallet->driver_id }}
                    </p>

                    <div class="mb-3">
                        <label class="text-muted small fw-semibold">CORREO ELECTRÓNICO</label>
                        <p class="mb-0 text-dark">{{ $wallet->driver?->user?->email ?? 'N/A' }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted small fw-semibold">TELÉFONO</label>
                        <p class="mb-0 text-dark">{{ $wallet->driver?->user?->phone ?? 'N/A' }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted small fw-semibold">MIEMBRO DESDE</label>
                        <p class="mb-0 text-dark">{{ $wallet->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            </div>

            {{-- Wallet Info Card --}}
            <div class="col-md-8">
                <div class="info-card wallet-info-card">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0 fw-bold">
                            <i class="fas fa-wallet me-2"></i> Saldo de la Billetera
                        </h5>
                        <div>
                            @if($wallet->is_blocked)
                                <span class="badge bg-danger px-3 py-2 fs-6">Bloqueada</span>
                            @elseif($wallet->wallet_status === 'expired')
                                <span class="badge bg-warning text-dark px-3 py-2 fs-6">Expirada</span>
                            @else
                                <span class="badge bg-success px-3 py-2 fs-6">Activa</span>
                            @endif
                        </div>
                    </div>

                    <div class="text-center mb-4">
                        <span class="balance-large {{ $wallet->balance >= 0 ? 'text-white' : 'text-warning' }}">
                            {{ number_format($wallet->balance, 2) }} Bs
                        </span>
                    </div>

                    @if($wallet->is_blocked && $wallet->blocked_reason)
                        <div class="alert alert-light border-0 mb-4">
                            <strong>Motivo del Bloqueo:</strong> {{ $wallet->blocked_reason }}
                            <br>
                            <small class="text-muted">Bloqueada el: {{ $wallet->blocked_at?->format('d M Y H:i') }}</small>
                        </div>
                    @endif

                    {{-- EXPIRATION SECTION --}}
                    @if($wallet->wallet_status === 'expired')
                        <div class="expiration-alert">
                            <div class="d-flex align-items-center text-danger mb-2">
                                <i class="fas fa-exclamation-circle fa-lg me-2"></i>
                                <strong>Billetera Expirada por Inactividad</strong>
                            </div>
                            <p class="mb-1 text-dark">
                                <strong>Monto Expirado:</strong> {{ number_format($wallet->expired_balance_amount ?? 0, 2) }} Bs
                            </p>
                            <p class="mb-1 text-dark">
                                <strong>Motivo:</strong> {{ $wallet->expiration_reason }}
                            </p>
                            <p class="mb-0 text-muted">
                                <strong>Fecha de Expiración:</strong> {{ $wallet->balance_expiration_date?->format('d M Y, H:i') }}
                            </p>
                        </div>
                    @elseif($wallet->balance_expiration_date && $wallet->balance > 0)
                        <div class="expiration-alert">
                            <div class="d-flex align-items-center {{ $wallet->balance_expiration_date->diffInDays(now()) <= 3 ? 'text-danger' : 'text-info' }} mb-2">
                                <i class="fas fa-clock fa-lg me-2"></i>
                                <strong>Próxima Expiración: {{ $wallet->balance_expiration_date->diffForHumans() }}</strong>
                            </div>
                            <p class="mb-1 text-dark">
                                <strong>Última Recarga:</strong> {{ $wallet->last_recharge_date?->format('d M Y, H:i') ?? 'N/A' }}
                            </p>
                            <p class="mb-0 text-muted">
                                El saldo expirará automáticamente si no se realiza una nueva recarga antes del {{ $wallet->balance_expiration_date->format('d M Y') }}.
                            </p>
                        </div>
                    @elseif($wallet->last_recharge_date)
                        <div class="expiration-alert">
                            <div class="d-flex align-items-center text-success mb-2">
                                <i class="fas fa-check-circle fa-lg me-2"></i>
                                <strong>Billetera sin saldo pendiente</strong>
                            </div>
                            <p class="mb-0 text-muted">
                                Última recarga: {{ $wallet->last_recharge_date->format('d M Y, H:i') }}
                            </p>
                        </div>
                    @endif

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="stat-box">
                                <h6 class="text-white-50 small mb-1">TOTAL CRÉDITOS</h6>
                                <h4 class="text-white mb-0">+{{ number_format($stats['total_credits'], 2) }} Bs</h4>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-box">
                                <h6 class="text-white-50 small mb-1">TOTAL DÉBITOS</h6>
                                <h4 class="text-white mb-0">-{{ number_format($stats['total_debits'], 2) }} Bs</h4>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-box">
                                <h6 class="text-white-50 small mb-1">TRANSACCIONES</h6>
                                <h4 class="text-white mb-0">
                                    {{ $stats['topup_count'] + $stats['commission_count'] + $stats['adjustment_count'] + $stats['expiration_count'] }}
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-3">
                        <button class="btn btn-light adjust-balance-btn flex-fill"
                                data-id="{{ $wallet->id }}"
                                data-driver="{{ $wallet->driver?->user?->name }}"
                                data-balance="{{ $wallet->balance }}">
                            <i class="fas fa-sliders-h"></i> Ajustar Saldo
                        </button>
                        <button class="btn {{ $wallet->is_blocked ? 'btn-success' : 'btn-danger' }} toggle-block-btn flex-fill"
                                data-id="{{ $wallet->id }}"
                                data-status="{{ $wallet->is_blocked }}">
                            <i class="fas {{ $wallet->is_blocked ? 'fa-unlock' : 'fa-ban' }}"></i>
                            {{ $wallet->is_blocked ? 'Desbloquear Billetera' : 'Bloquear Billetera' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Transactions Section --}}
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Transacciones Recientes</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tipo</th>
                                <th>Monto</th>
                                <th>Dirección</th>
                                <th>Referencia</th>
                                <th>Admin</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $txn)
                            <tr>
                                <td>#{{ $txn->id }}</td>
                                <td>
                                    @php
                                        $typeLabels = [
                                            'topup' => 'Recarga',
                                            'commission_debit' => 'Comisión',
                                            'adjustment' => 'Ajuste',
                                            'balance_expiration' => 'Expiración',
                                        ];
                                    @endphp
                                    <span class="badge bg-info">{{ $typeLabels[$txn->type] ?? ucfirst(str_replace('_', ' ', $txn->type)) }}</span>
                                </td>
                                <td>{{ number_format($txn->amount, 2) }} Bs</td>
                                <td>
                                    <span class="{{ $txn->direction === 'CREDIT' ? 'transaction-credit' : 'transaction-debit' }}">
                                        {{ $txn->direction }}
                                    </span>
                                </td>
                                <td>{{ $txn->reference_id ?? '—' }}</td>
                                <td>{{ $txn->admin?->name ?? '—' }}</td>
                                <td>{{ $txn->created_at->format('d M Y H:i') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    No se encontraron transacciones
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</div>

@include('admin.wallets._modals')
@endsection

@section('js')
@include('admin.wallets._scripts')
@endsection