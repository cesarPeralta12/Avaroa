@extends('layout.master')

@section('title', 'Transaction History')

@section('css')
<style>
    .status-credit { border-left-color: #10b981; }
    .status-debit { border-left-color: #ef4444; }
    .transaction-card {
        border-left: 4px solid;
        transition: all 0.3s ease;
    }
    .transaction-card:hover {
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .amount-credit { color: #10b981; font-weight: bold; }
    .amount-debit { color: #ef4444; font-weight: bold; }
    .type-badge {
        padding: 0.4em 0.8em;
        border-radius: 15px;
        font-size: 0.8em;
        text-transform: uppercase;
    }
</style>
@endsection

@section('main_content')
<div class="page-content">
    <div class="container-fluid">

        {{-- Stats --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h6>Total Credit</h6>
                        <h3>{{ number_format($stats['total_credit'], 2) }} Bs</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <h6>Total Debit</h6>
                        <h3>{{ number_format($stats['total_debit'], 2) }} Bs</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h6>Today's Transactions</h6>
                        <h3>{{ $stats['today_count'] }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h6>Total Transactions</h6>
                        <h3>{{ $stats['total_count'] }}</h3>
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
                               placeholder="Search user or reference" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="type" class="form-select">
                            <option value="">All Types</option>
                            <option value="topup" {{ request('type') === 'topup' ? 'selected' : '' }}>TopUp</option>
                            <option value="trip" {{ request('type') === 'trip' ? 'selected' : '' }}>Trip</option>
                            <option value="withdrawal" {{ request('type') === 'withdrawal' ? 'selected' : '' }}>Withdrawal</option>
                            <option value="bonus" {{ request('type') === 'bonus' ? 'selected' : '' }}>Bonus</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="direction" class="form-select">
                            <option value="">All Directions</option>
                            <option value="CREDIT" {{ request('direction') === 'CREDIT' ? 'selected' : '' }}>Credit</option>
                            <option value="DEBIT" {{ request('direction') === 'DEBIT' ? 'selected' : '' }}>Debit</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="date_from" class="form-control"
                               value="{{ request('date_from') }}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Filter
                        </button>
                        <a href="{{ route('transaction.history') }}" class="btn btn-secondary">
                            <i class="fas fa-redo"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        {{-- Transactions List --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Transaction History</h4>
                <a href="{{ route('transaction.history.export') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-file-excel"></i> Export Excel
                </a>
            </div>
            <div class="card-body">
                @forelse($transactions as $transaction)
                <div class="transaction-card status-{{ strtolower($transaction->direction) }} card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        @if($transaction->direction === 'CREDIT')
                                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center text-white"
                                                 style="width: 50px; height: 50px;">
                                                <i class="fas fa-arrow-down"></i>
                                            </div>
                                        @else
                                            <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center text-white"
                                                 style="width: 50px; height: 50px;">
                                                <i class="fas fa-arrow-up"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <strong>{{ $transaction->wallet?->driver?->user?->name ?? 'Unknown User' }}</strong>
                                        <br>
                                        <small class="text-muted">Wallet #{{ $transaction->wallet_id }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-center">
                                <h4 class="mb-0 {{ $transaction->direction === 'CREDIT' ? 'amount-credit' : 'amount-debit' }}">
                                    {{ $transaction->direction === 'CREDIT' ? '+' : '-' }}{{ number_format($transaction->amount, 2) }} Bs
                                </h4>
                                <span class="badge bg-light text-dark">{{ $transaction->direction }}</span>
                            </div>
                            <div class="col-md-2 text-center">
                                <span class="type-badge bg-primary text-white">{{ $transaction->type }}</span>
                                <br>
                                <small class="text-muted">Ref: #{{ $transaction->reference_id }}</small>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted d-block">
                                    <i class="fas fa-calendar"></i> {{ $transaction->created_at->format('d M Y H:i') }}
                                </small>
                                @if($transaction->created_by_admin_id)
                                    <small class="text-muted">
                                        <i class="fas fa-user-shield"></i> By: {{ $transaction->admin?->name ?? 'Admin' }}
                                    </small>
                                @endif
                            </div>
                            <div class="col-md-2 text-end">
                                <button class="btn btn-sm btn-info view-details"
                                        data-id="{{ $transaction->id }}"
                                        data-amount="{{ $transaction->amount }}"
                                        data-type="{{ $transaction->type }}"
                                        data-direction="{{ $transaction->direction }}"
                                        data-reference="{{ $transaction->reference_type }} #{{ $transaction->reference_id }}"
                                        data-date="{{ $transaction->created_at->format('d M Y H:i:s') }}"
                                        data-user="{{ $transaction->wallet?->driver?->user?->name ?? 'Unknown' }}">
                                    <i class="fas fa-eye"></i> Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-wallet fa-3x mb-3"></i>
                    <h5>No transactions found</h5>
                </div>
                @endforelse

                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</div>

{{-- Transaction Details Modal --}}
<div class="modal fade" id="transactionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Transaction Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-6"><strong>Transaction ID:</strong></div>
                    <div class="col-6 text-end" id="trans-id"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-6"><strong>User:</strong></div>
                    <div class="col-6 text-end" id="trans-user"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-6"><strong>Type:</strong></div>
                    <div class="col-6 text-end"><span class="badge bg-primary" id="trans-type"></span></div>
                </div>
                <div class="row mb-3">
                    <div class="col-6"><strong>Direction:</strong></div>
                    <div class="col-6 text-end"><span class="badge" id="trans-direction"></span></div>
                </div>
                <div class="row mb-3">
                    <div class="col-6"><strong>Amount:</strong></div>
                    <div class="col-6 text-end"><h4 id="trans-amount"></h4></div>
                </div>
                <div class="row mb-3">
                    <div class="col-6"><strong>Reference:</strong></div>
                    <div class="col-6 text-end" id="trans-reference"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-6"><strong>Date:</strong></div>
                    <div class="col-6 text-end" id="trans-date"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary print-receipt">
                    <i class="fas fa-print"></i> Print Receipt
                </button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.view-details').click(function() {
        $('#trans-id').text('#' + $(this).data('id'));
        $('#trans-user').text($(this).data('user'));
        $('#trans-type').text($(this).data('type').toUpperCase());
        $('#trans-direction').text($(this).data('direction'));
        $('#trans-direction').removeClass('bg-success bg-danger').addClass($(this).data('direction') === 'CREDIT' ? 'bg-success' : 'bg-danger');
        $('#trans-amount').text($(this).data('amount') + ' Bs').removeClass('text-success text-danger').addClass($(this).data('direction') === 'CREDIT' ? 'text-success' : 'text-danger');
        $('#trans-reference').text($(this).data('reference'));
        $('#trans-date').text($(this).data('date'));
        $('#transactionModal').modal('show');
    });
});
</script>
@endsection
