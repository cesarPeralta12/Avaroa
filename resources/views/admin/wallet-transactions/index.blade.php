@extends('layout.master')
@section('title', 'Transacciones de Billetera')

@section('css')
<style>
    .stats-card {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        height: 100%;
        border: none;
    }
    .stats-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
    .transaction-credit { color: #10b981; font-weight: 600; }
    .transaction-debit  { color: #ef4444; font-weight: 600; }

    .filter-card {
        background: linear-gradient(135deg, #f8fafc 0%, #032328 100%);
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        border: none;
    }

    .type-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }
    .type-topup      { background: #dbeafe; color: #1e40af; }
    .type-commission { background: #fee2e2; color: #991b1b; }
    .type-adjustment { background: #fef3c7; color: #92400e; }
    .type-expiration { background: #fecaca; color: #7f1d1d; }

    .driver-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .driver-avatar-sm, .driver-avatar-placeholder-sm {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        object-fit: cover;
    }
    .driver-avatar-placeholder-sm {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.9rem;
        font-weight: bold;
    }

    .table th {
        background: #f8fafc;
        font-weight: 600;
        color: #374151;
    }

    .pagination {
        margin: 25px 0;
    }
    .pagination .page-link {
        border-radius: 8px;
        margin: 0 4px;
        padding: 10px 16px;
        color: #4b5563;
        border: 1px solid #d1d5db;
        transition: all 0.2s;
    }
    .pagination .page-item.active .page-link {
        background-color: #6366f1;
        border-color: #6366f1;
        color: white;
        font-weight: 600;
    }
    .pagination .page-link:hover {
        background-color: #f3f4f6;
        color: #6366f1;
    }

    .export-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s;
    }
    .export-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
    }
</style>
@endsection

@section('main_content')
<div class="page-content">
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="row mb-4">
            <div class="col-md-6">
                <h3 class="mb-0">Transacciones de Billetera</h3>
                <p class="text-muted">Visualiza y gestiona todas las transacciones de billeteras</p>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('wallet-transactions.export', request()->query()) }}"
                   class="btn export-btn">
                    <i class="fas fa-download me-2"></i> Exportar a Excel
                </a>
            </div>
        </div>

        {{-- Stats Cards --}}
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-1">Total Créditos</p>
                            <h4 class="transaction-credit mb-0">+{{ number_format($stats['total_credits'], 2) }} Bs</h4>
                        </div>
                        <div class="stats-icon" style="background: #d1fae5;">
                            <i class="fas fa-arrow-down text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-1">Total Débitos</p>
                            <h4 class="transaction-debit mb-0">-{{ number_format($stats['total_debits'], 2) }} Bs</h4>
                        </div>
                        <div class="stats-icon" style="background: #fee2e2;">
                            <i class="fas fa-arrow-up text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-1">Volumen de Hoy</p>
                            <h4 class="mb-0 text-dark">{{ number_format($stats['today_volume'], 2) }} Bs</h4>
                        </div>
                        <div class="stats-icon" style="background: #dbeafe;">
                            <i class="fas fa-calendar-day text-primary"></i>
                        </div>
                    </div>
                    <small class="text-muted">{{ $stats['today_transactions'] }} transacciones hoy</small>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-1">Volumen Mensual</p>
                            <h4 class="mb-0 text-dark">{{ number_format($stats['month_volume'], 2) }} Bs</h4>
                        </div>
                        <div class="stats-icon" style="background: #fef3c7;">
                            <i class="fas fa-chart-bar text-warning"></i>
                        </div>
                    </div>
                    <small class="text-muted">{{ $stats['total_transactions'] }} transacciones totales</small>
                </div>
            </div>
        </div>

        {{-- Filters --}}
        <div class="filter-card">
            <form method="GET" id="filterForm">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Buscar</label>
                        <input type="text" name="search" class="form-control"
                               placeholder="ID, Referencia, Conductor..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Tipo de Transacción</label>
                        <select name="type" class="form-select">
                            <option value="">Todos los Tipos</option>
                            @foreach($types as $type)
                                @php
                                    $typeLabels = [
                                        'topup' => 'Recarga',
                                        'commission_debit' => 'Comisión',
                                        'adjustment' => 'Ajuste',
                                        'balance_expiration' => 'Expiración',
                                    ];
                                @endphp
                                <option value="{{ $type }}" {{ request('type') === $type ? 'selected' : '' }}>
                                    {{ $typeLabels[$type] ?? ucfirst(str_replace('_', ' ', $type)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Dirección</label>
                        <select name="direction" class="form-select">
                            <option value="">Todas</option>
                            <option value="CREDIT" {{ request('direction') === 'CREDIT' ? 'selected' : '' }}>Crédito</option>
                            <option value="DEBIT" {{ request('direction') === 'DEBIT' ? 'selected' : '' }}>Débito</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Desde Fecha</label>
                        <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Hasta Fecha</label>
                        <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
                    </div>

                    <div class="col-md-3 d-flex align-items-end gap-2">
                        <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center flex-fill">
                            <i class="fas fa-search me-2"></i>
                            Aplicar Filtros
                        </button>
                        <a href="{{ route('wallet-transactions.index') }}" 
                           class="btn btn-secondary d-flex align-items-center justify-content-center flex-fill">
                            <i class="fas fa-redo me-2"></i>
                            Restablecer
                        </a>
                    </div>
                </div>
            </form>
        </div>

        {{-- Transactions Table --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-list me-2"></i> Historial de Transacciones
                </h5>
                <span class="text-muted">
                    Mostrando {{ $transactions->firstItem() ?? 0 }} - {{ $transactions->lastItem() ?? 0 }} 
                    de {{ $transactions->total() }} transacciones
                </span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th style="width: 80px;">ID</th>
                                <th>Conductor</th>
                                <th>Tipo</th>
                                <th>Monto</th>
                                <th>Dirección</th>
                                <th>Referencia</th>
                                <th>Admin</th>
                                <th>Fecha y Hora</th>
                                <th style="width: 100px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $txn)
                            @php
                                $typeClasses = [
                                    'topup' => 'type-topup',
                                    'commission_debit' => 'type-commission',
                                    'adjustment' => 'type-adjustment',
                                    'balance_expiration' => 'type-expiration',
                                ];
                                $typeLabels = [
                                    'topup' => 'Recarga',
                                    'commission_debit' => 'Comisión',
                                    'adjustment' => 'Ajuste',
                                    'balance_expiration' => 'Expiración',
                                ];
                                $typeClass = $typeClasses[$txn->type] ?? 'bg-secondary text-white';
                                $typeLabel = $typeLabels[$txn->type] ?? ucfirst(str_replace('_', ' ', $txn->type));
                            @endphp
                            <tr>
                                <td><span class="fw-bold">#{{ $txn->id }}</span></td>
                                <td>
                                    <div class="driver-info">
                                        @if($txn->wallet?->driver?->user?->profile_photo)
                                            <img src="{{ asset($txn->wallet->driver->user->profile_photo) }}"
                                                 class="driver-avatar-sm" alt="">
                                        @else
                                            <div class="driver-avatar-placeholder-sm">
                                                {{ strtoupper(substr($txn->wallet?->driver?->user?->name ?? 'C', 0, 1)) }}
                                            </div>
                                        @endif
                                        <div>
                                            <strong>{{ $txn->wallet?->driver?->user?->name ?? 'N/A' }}</strong>
                                            <br>
                                            <small class="text-muted">Conductor #{{ $txn->wallet?->driver_id ?? 'N/A' }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="type-badge {{ $typeClass }}">{{ $typeLabel }}</span>
                                </td>
                                <td><strong>{{ number_format($txn->amount, 2) }} Bs</strong></td>
                                <td>
                                    @if($txn->direction === 'CREDIT')
                                        <span class="transaction-credit">
                                            <i class="fas fa-arrow-down me-1"></i> Crédito
                                        </span>
                                    @else
                                        <span class="transaction-debit">
                                            <i class="fas fa-arrow-up me-1"></i> Débito
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($txn->reference_type && $txn->reference_id)
                                        <span class="badge bg-light text-dark">
                                            {{ ucfirst($txn->reference_type) }}: {{ $txn->reference_id }}
                                        </span>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td>{{ $txn->admin?->name ?? 'Sistema' }}</td>
                                <td>
                                    <div>{{ $txn->created_at->format('d M Y') }}</div>
                                    <small class="text-muted">{{ $txn->created_at->format('H:i') }}</small>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info"
                                            data-bs-toggle="modal"
                                            data-bs-target="#transactionDetailModal{{ $txn->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center py-5 text-muted">
                                    <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                    No se encontraron transacciones
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @if($transactions->hasPages())
            <div class="card-footer d-flex justify-content-center">
                {{ $transactions->appends(request()->query())->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

{{-- Transaction Detail Modals --}}
@foreach($transactions as $txn)
@php
    $detailTypeLabels = [
        'topup' => 'Recarga',
        'commission_debit' => 'Comisión',
        'adjustment' => 'Ajuste',
        'balance_expiration' => 'Expiración por Inactividad',
    ];
@endphp
<div class="modal fade" id="transactionDetailModal{{ $txn->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-receipt me-2"></i> Detalles de Transacción #{{ $txn->id }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <h3 class="{{ $txn->direction === 'CREDIT' ? 'text-success' : 'text-danger' }}">
                        {{ $txn->direction === 'CREDIT' ? '+' : '-' }}{{ number_format($txn->amount, 2) }} Bs
                    </h3>
                </div>
                <table class="table table-bordered">
                    <tr><th style="color:white;">ID de Transacción</th><td style="color:white;">#{{ $txn->id }}</td></tr>
                    <tr><th style="color:white;">Conductor</th><td style="color:white;">{{ $txn->wallet?->driver?->user?->name ?? 'N/A' }}</td></tr>
                    <tr><th style="color:white;">ID del Conductor</th><td style="color:white;">{{ $txn->wallet?->driver_id ?? 'N/A' }}</td></tr>
                    <tr><th style="color:white;">ID de Billetera</th><td style="color:white;">{{ $txn->wallet_id }}</td></tr>
                    <tr><th style="color:white;">Tipo</th><td style="color:white;">{{ $detailTypeLabels[$txn->type] ?? ucfirst(str_replace('_', ' ', $txn->type)) }}</td></tr>
                    <tr>
                        <th style="color:white;">Monto</th>
                        <td style="color:white;" class="{{ $txn->direction === 'CREDIT' ? 'text-success' : 'text-danger' }} fw-bold">
                            {{ number_format($txn->amount, 2) }} Bs
                        </td>
                    </tr>
                    <tr><th style="color:white;">Dirección</th><td style="color:white;">{{ $txn->direction === 'CREDIT' ? 'Crédito' : 'Débito' }}</td></tr>
                    @if($txn->reference_type)<tr><th style="color:white;">Tipo de Referencia</th><td style="color:white;">{{ ucfirst($txn->reference_type) }}</td></tr>@endif
                    @if($txn->reference_id)<tr><th style="color:white;">ID de Referencia</th><td style="color:white;">{{ $txn->reference_id }}</td></tr>@endif
                    <tr><th style="color:white;">Creado Por</th><td style="color:white;">{{ $txn->admin?->name ?? 'Sistema' }}</td></tr>
                    <tr><th style="color:white;">Fecha de Creación</th><td style="color:white;">{{ $txn->created_at->format('d M Y, H:i:s') }}</td></tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                @if($txn->wallet_id)
                <a href="{{ route('wallets.show', $txn->wallet_id) }}" class="btn btn-primary">
                    <i class="fas fa-wallet me-1"></i> Ver Billetera
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('js')
<script>
$(document).ready(function() {
    $('select[name="type"], select[name="direction"]').change(function() {
        $('#filterForm').submit();
    });
});
</script>
@endsection