@extends('layout.master')
@section('title', 'Admin - Withdrawal Management')

@section('main_content')
    <div class="container-fluid">

        {{-- PAGE HEADER --}}
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="h3 mb-0 fw-bold">
                    <i class="fas fa-money-bill-transfer me-2"></i> Withdrawal Management
                </h1>
                <p class="text-muted mb-0">Approve, reject, and process withdrawal requests</p>
            </div>

            <div class="d-flex gap-2">
                <div class="card border-0 shadow-sm px-3 py-2">
                    <span class="text-xs fw-bold text-warning text-uppercase">Pending</span>
                    <span class="h5 mb-0 fw-bold">
                        {{ $withdrawals->where('status', \App\Models\Withdrawal::STATUS_PENDING)->count() }}
                    </span>
                </div>

                <div class="card border-0 shadow-sm px-3 py-2">
                    <span class="text-xs fw-bold text-success text-uppercase">Approved</span>
                    <span class="h5 mb-0 fw-bold">
                        {{ $withdrawals->where('status', \App\Models\Withdrawal::STATUS_APPROVED)->count() }}
                    </span>
                </div>

                <div class="card border-0 shadow-sm px-3 py-2">
                    <span class="text-xs fw-bold text-info text-uppercase">Processed</span>
                    <span class="h5 mb-0 fw-bold">
                        {{ $withdrawals->where('status', \App\Models\Withdrawal::STATUS_PROCESSED)->count() }}
                    </span>
                </div>
            </div>
        </div>

        {{-- FILTER BAR --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-md-4">
                        <select id="statusFilter" class="form-select form-select-sm">
                            <option value="">All Statuses</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="processed">Processed</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <input type="date" class="form-control form-control-sm" id="dateFilter">
                    </div>

                    <div class="col-md-4">
                        <button class="btn btn-sm btn-secondary w-100" id="resetFilters">
                            Reset Filters
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- MAIN TABLE --}}
        <div class="card shadow-sm border-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">ID / User</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($withdrawals as $wd)

                            @php

                                $challenge = \App\Models\Challenge::where('id', $wd->challenge_id)->first();

                                $purchaseplan = \App\Models\FundingPlan::where('id', $challenge->plan_id)->first();

                            @endphp

                            <tr class="withdrawal-row" data-status="{{ strtolower($wd->status_label) }}"
                                data-date="{{ $wd->created_at->format('Y-m-d') }}">

                                <td class="ps-4">
                                    <div class="fw-bold">#{{ $wd->id }}</div>
                                    <div class="small text-muted">{{ $wd->user->name }}</div>
                                </td>

                                <td>
                                    <div class="fw-bold">₹{{ number_format($wd->amount, 2) }}</div>
                                    <small class="text-success">
                                        Net: ₹{{ number_format($wd->final_amount, 2) }}
                                    </small>
                                </td>

                                <td>{!! $wd->status_badge !!}</td>

                                <td class="small">
                                    {{ $wd->created_at->format('d M Y, h:i A') }}
                                </td>

                                <td class="text-end pe-4">
                                    <div class="btn-group gap-1">

                                        <!-- BANK DETAILS -->
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#bankModal{{ $wd->id }}" title="View Bank Details">
                                            <i class="fas fa-university"></i>
                                        </button>

                                        <!-- VIEW DETAILS -->
                                        <button class="btn btn-sm btn-outline-dark" data-bs-toggle="modal"
                                            data-bs-target="#detailsModal{{ $wd->id }}"
                                            title="View Challenge & Plan Details">
                                            <i class="fas fa-eye"></i>
                                        </button>

                                        <!-- ACTIONS -->
                                        @if ($wd->status === \App\Models\Withdrawal::STATUS_PENDING)
                                            <button class="btn btn-sm btn-success approve-btn"
                                                data-id="{{ $wd->id }}"
                                                data-action="{{ route('withdrawals.approve', $wd) }}">
                                                <i class="fas fa-check"></i> Approve
                                            </button>

                                            <button class="btn btn-sm btn-danger reject-btn" data-id="{{ $wd->id }}"
                                                data-action="{{ route('withdrawals.reject', $wd) }}">
                                                <i class="fas fa-times"></i> Reject
                                            </button>
                                        @endif

                                        @if ($wd->status === \App\Models\Withdrawal::STATUS_APPROVED)
                                            <button class="btn btn-sm btn-info text-white process-btn"
                                                data-id="{{ $wd->id }}"
                                                data-action="{{ route('withdrawals.process', $wd) }}"
                                                data-amount="{{ $wd->final_amount }}">
                                                <i class="fas fa-paper-plane"></i> Process
                                            </button>
                                        @endif

                                    </div>
                                </td>
                            </tr>

                            <!-- BANK DETAILS MODAL -->
                            <div class="modal fade" id="bankModal{{ $wd->id }}" tabindex="-1">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Bank Details</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body small">
                                            <p><strong>Bank:</strong> {{ $wd->bank_name ?? 'N/A' }}</p>
                                            <p><strong>Name:</strong> {{ $wd->account_holder ?? 'N/A' }}</p>
                                            <p><strong>Account:</strong> {{ $wd->account_number ?? 'N/A' }}</p>
                                            <p><strong>IFSC:</strong> {{ $wd->ifsc_code ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- DETAILS MODAL - Challenge & Plan -->
                            <div class="modal fade" id="detailsModal{{ $wd->id }}" tabindex="-1"
                                aria-labelledby="detailsLabel{{ $wd->id }}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailsLabel{{ $wd->id }}">
                                                Withdrawal #{{ $wd->id }} - Challenge & Plan Details
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">

                                            <!-- User Info -->
                                            <div class="mb-4">
                                                <h6 class="fw-bold text-primary">User Information</h6>
                                                <p><strong>Name:</strong> {{ $wd->user->name }}</p>
                                                <p><strong>Email:</strong> {{ $wd->user->email ?? 'N/A' }}</p>
                                            </div>

                                            <!-- Challenge Info -->
                                            <div class="mb-4">
                                                <h6 class="fw-bold text-primary">Challenge Details</h6>
                                                @if ($challenge)
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <p><strong>Challenge ID:</strong> #{{ $challenge->id }}</p>
                                                            <p><strong>Account ID:</strong>
                                                                {{ $challenge->account_id ?? '—' }}</p>
                                                            <p><strong>Plan:</strong>
                                                                {{ $purchaseplan->title ?? ($purchaseplan->name ?? '—') }}
                                                            </p>
                                                            <p><strong>Phase:</strong> {{ $challenge->phase }}</p>
                                                            <p><strong>Status:</strong>
                                                                <span
                                                                    class="badge
                        {{ (($challenge->status === 'active'
                                    ? 'bg-success'
                                    : $challenge->status === 'failed')
                                ? 'bg-danger'
                                : $challenge->status === 'passed')
                            ? 'bg-primary'
                            : 'bg-info' }}">
                                                                    {{ ucfirst($challenge->status) }}
                                                                </span>
                                                            </p>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <p><strong>Start Balance:</strong>
                                                                ₹{{ number_format($challenge->start_balance ?? 0, 2) }}
                                                            </p>
                                                            <p><strong>Current Balance:</strong>
                                                                ₹{{ number_format($challenge->current_balance ?? 0, 2) }}
                                                            </p>
                                                            <p><strong>Peak Balance:</strong>
                                                                ₹{{ number_format($challenge->peak_balance ?? 0, 2) }}
                                                            </p>
                                                            <p><strong>Total Profit:</strong>
                                                                <span
                                                                    class="text-success">+₹{{ number_format($challenge->total_profit ?? 0, 2) }}</span>
                                                            </p>
                                                            <p><strong>Total Loss:</strong>
                                                                <span
                                                                    class="text-danger">-₹{{ number_format($challenge->total_loss ?? 0, 2) }}</span>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <hr class="my-3">

                                                    <div class="row g-3">
                                                        <div class="col-md-4">
                                                            <p><strong>Profit Target:</strong>
                                                                {{ $challenge->profit_target_percent ?? '—' }}%</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p><strong>Max Daily Loss:</strong>
                                                                {{ $challenge->max_daily_loss_percent ?? '—' }}%</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p><strong>Max Overall Loss:</strong>
                                                                {{ $challenge->max_overall_loss_percent ?? '—' }}%</p>
                                                        </div>
                                                    </div>

                                                    <div class="mt-3">
                                                        <p><strong>Trading Days:</strong>
                                                            {{ $challenge->trading_days_elapsed ?? 0 }} /
                                                            {{ $challenge->max_trading_days ?? '∞' }} days
                                                        </p>
                                                        <p><strong>Minimum Days Required:</strong>
                                                            {{ $challenge->min_days_required ?? '—' }}</p>
                                                        <p><strong>Valid Days Completed:</strong>
                                                            {{ $challenge->valid_days_completed_days ?? 0 }}</p>
                                                    </div>

                                                    <div class="mt-3">
                                                        <p><strong>Period:</strong>
                                                            {{ $challenge->started_at ? \Carbon\Carbon::parse($challenge->started_at)->format('d/m/Y h:i A') : '—' }}
                                                            →
                                                            {{ $challenge->ended_at ? \Carbon\Carbon::parse($challenge->ended_at)->format('d/m/Y h:i A') : 'Ongoing' }}
                                                        </p>
                                                    </div>

                                                    @if ($challenge->is_demo)
                                                        <div class="mt-3">
                                                            <span class="badge bg-warning text-dark">DEMO
                                                                ACCOUNT</span>
                                                        </div>
                                                    @endif
                                                @else
                                                    <p class="text-danger">Challenge not found</p>
                                                @endif
                                            </div>

                                            <!-- Plan Info -->
                                            <div class="mb-4">
                                                <h6 class="fw-bold text-primary">Purchased Plan Details</h6>
                                                @if ($purchaseplan)
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <p><strong>Plan ID:</strong> #{{ $purchaseplan->id }}</p>
                                                            <p><strong>Name / Title:</strong>
                                                                {{ $purchaseplan->title ?? '—' }}</p>
                                                            <p><strong>Evaluation Capital:</strong>
                                                                ₹{{ number_format($purchaseplan->capital ?? 0, 2) }}
                                                            </p>
                                                            <p><strong>Registration Fee:</strong>
                                                                ₹{{ number_format($purchaseplan->fee ?? 0, 2) }}
                                                            </p>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <p><strong>Profit Target:</strong>
                                                                {{ $purchaseplan->profit_target ?? '—' }}</p>
                                                            <p><strong>Maximum Loss:</strong>
                                                                {{ $purchaseplan->max_loss ?? '—' }}</p>
                                                            <p><strong>Drawdown Type:</strong>
                                                                {{ $purchaseplan->drawdown_type ?? '—' }}</p>

                                                            @if ($purchaseplan->payout_cycle)
                                                                <p><strong>Payout Cycle:</strong> Every
                                                                    {{ $purchaseplan->payout_cycle }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="mt-3 small text-muted">
                                                        @if ($purchaseplan->news_trading)
                                                            <span class="me-3">✓ News Trading Allowed</span>
                                                        @endif
                                                        @if ($purchaseplan->weekend_holding)
                                                            <span>✓ Weekend Holding Allowed</span>
                                                        @endif
                                                    </div>

                                                    @if ($purchaseplan->is_active == 0)
                                                        <div class="mt-3">
                                                            <span class="badge bg-warning text-dark">Plan is currently
                                                                INACTIVE</span>
                                                        </div>
                                                    @endif
                                                @else
                                                    <p class="text-muted">No plan information available for this challenge.
                                                    </p>
                                                @endif
                                            </div>

                                            <!-- Withdrawal Summary -->
                                            <div class="mb-3">
                                                <h6 class="fw-bold text-primary">Withdrawal Summary</h6>
                                                <p><strong>Requested Amount:</strong> ₹{{ number_format($wd->amount, 2) }}
                                                </p>
                                                <p><strong>Final Amount:</strong>
                                                    ₹{{ number_format($wd->final_amount, 2) }}</p>
                                                <p><strong>Status:</strong> {!! $wd->status_badge !!}</p>
                                                <p><strong>Requested On:</strong>
                                                    {{ $wd->created_at->format('d M Y, h:i A') }}</p>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    No withdrawal requests found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-center">
                {{ $withdrawals->links() }}
            </div>
        </div>
    </div>

    <!-- Scripts & Styles remain the same -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {

            const csrfToken = '{{ csrf_token() }}';

            // Approve Button
            $('.approve-btn').on('click', function(e) {
                e.preventDefault();
                const btn = $(this);
                const url = btn.data('action');

                Swal.fire({
                    title: 'Approve Withdrawal?',
                    text: "This action cannot be undone!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, Approve',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (!result.isConfirmed) return;

                    btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: csrfToken
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Approved!',
                                text: response.message ||
                                    'Withdrawal has been approved.',
                                timer: 2000
                            }).then(() => location.reload());
                        },
                        error: function(xhr) {
                            Swal.fire('Error!', xhr.responseJSON?.message ||
                                'Something went wrong', 'error');
                        },
                        complete: () => btn.prop('disabled', false).html(
                            '<i class="fas fa-check"></i> Approve')
                    });
                });
            });

            // Reject Button
            $('.reject-btn').on('click', function(e) {
                e.preventDefault();
                const btn = $(this);
                const url = btn.data('action');

                Swal.fire({
                    title: 'Reject Withdrawal?',
                    html: '<textarea id="swal-reason" class="swal2-textarea" placeholder="Enter rejection reason..." required></textarea>',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    confirmButtonText: 'Yes, Reject',
                    preConfirm: () => {
                        const reason = document.getElementById('swal-reason').value;
                        if (!reason || reason.trim().length < 5) {
                            Swal.showValidationMessage(
                                'Please provide a valid reason (min 5 characters)');
                            return false;
                        }
                        return reason.trim();
                    }
                }).then((result) => {
                    if (!result.isConfirmed) return;

                    btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: csrfToken,
                            admin_feedback: result.value
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Rejected!',
                                text: response.message ||
                                    'Withdrawal rejected and amount refunded.',
                                timer: 2000
                            }).then(() => location.reload());
                        },
                        error: function(xhr) {
                            Swal.fire('Error!', xhr.responseJSON?.message ||
                                'Failed to reject withdrawal', 'error');
                        },
                        complete: () => btn.prop('disabled', false).html(
                            '<i class="fas fa-times"></i> Reject')
                    });
                });
            });

            // Process Button
            $('.process-btn').on('click', function(e) {
                e.preventDefault();
                const btn = $(this);
                const url = btn.data('action');
                const defaultAmount = btn.data('amount');

                Swal.fire({
                    title: 'Process Withdrawal',
                    html: `
                        <input id="swal-utr" class="swal2-input" placeholder="Enter UTR/Transaction ID" required>
                        <input id="swal-amount" class="swal2-input mt-3" type="number" step="0.01"
                               value="${defaultAmount}" placeholder="Amount Sent (₹)" required>
                    `,
                    showCancelButton: true,
                    confirmButtonColor: '#17a2b8',
                    confirmButtonText: 'Confirm & Process',
                    preConfirm: () => {
                        const utr = document.getElementById('swal-utr').value.trim();
                        const amount = document.getElementById('swal-amount').value;

                        if (!utr || utr.length < 5) {
                            Swal.showValidationMessage(
                                'Please enter valid UTR (min 5 characters)');
                            return false;
                        }
                        if (!amount || parseFloat(amount) <= 0) {
                            Swal.showValidationMessage('Please enter valid amount');
                            return false;
                        }
                        return {
                            utr: utr,
                            sent_amount: amount
                        };
                    }
                }).then((result) => {
                    if (!result.isConfirmed) return;

                    btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: csrfToken,
                            utr: result.value.utr,
                            sent_amount: result.value.sent_amount
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Processed!',
                                text: response.message ||
                                    'Withdrawal marked as processed.',
                                timer: 2000
                            }).then(() => location.reload());
                        },
                        error: function(xhr) {
                            Swal.fire('Error!', xhr.responseJSON?.message ||
                                'Failed to process withdrawal', 'error');
                        },
                        complete: () => btn.prop('disabled', false).html(
                            '<i class="fas fa-paper-plane"></i> Process')
                    });
                });
            });

            // Your existing client-side filter (unchanged)
            const statusFilter = document.getElementById('statusFilter');
            const dateFilter = document.getElementById('dateFilter');
            const rows = document.querySelectorAll('.withdrawal-row');

            function applyFilters() {
                const status = statusFilter.value;
                const date = dateFilter.value;

                rows.forEach(row => {
                    const rowStatus = row.dataset.status;
                    const rowDate = row.dataset.date;

                    const matchStatus = !status || rowStatus === status;
                    const matchDate = !date || rowDate === date;

                    row.style.display = (matchStatus && matchDate) ? '' : 'none';
                });
            }

            statusFilter.addEventListener('change', applyFilters);
            dateFilter.addEventListener('change', applyFilters);

            document.getElementById('resetFilters').addEventListener('click', () => {
                statusFilter.value = '';
                dateFilter.value = '';
                applyFilters();
            });
        });
    </script>

    <style>
        .withdrawal-row[data-status="pending"] {
            background-color: rgba(255, 193, 7, 0.08);
        }

        .withdrawal-row[data-status="approved"] {
            background-color: rgba(40, 167, 69, 0.05);
        }

        .btn-group .btn {
            padding: 0.35rem 0.65rem;
            font-size: 0.85rem;
        }

        .swal2-input,
        .swal2-textarea {
            width: 100% !important;
        }
    </style>

@endsection
