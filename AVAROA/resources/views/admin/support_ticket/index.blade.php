@extends('layout.master')
@section('title')
    {{ $title }}
@endsection

@section('css')
<style>
    :root {
        --primary-color: #4361ee;
        --primary-light: #4895ef;
        --secondary-color: #3a0ca3;
        --success-color: #4cc9f0;
        --danger-color: #f72585;
        --warning-color: #f8961e;
        --dark-bg: #0d1117;
        --card-bg: #161b22;
        --card-border: #30363d;
        --text-primary: #f0f6fc;
        --text-secondary: #8b949e;
        --hover-bg: #21262d;
        --gradient: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    }

    body {
        background: var(--dark-bg);
        min-height: 100vh;
        color: var(--text-primary);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .dashboard-header {
        background: var(--gradient);
        padding: 40px 0;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
    }

    .dashboard-header::before {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        top: -150px;
        right: -100px;
        opacity: 0.3;
    }

    .header-content {
        position: relative;
        z-index: 2;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .header-title {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 10px;
        background: linear-gradient(120deg, #fff 0%, rgba(255,255,255,0.8) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .header-subtitle {
        color: rgba(255,255,255,0.9);
        font-size: 1rem;
    }

    .stats-overview {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        border-color: var(--primary-color);
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    .stat-value {
        font-size: 2.5rem;
        font-weight: 800;
        background: var(--gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 5px;
        line-height: 1;
    }

    .stat-label {
        color: var(--text-secondary);
        font-size: 0.9rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .card {
        background: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 16px;
        backdrop-filter: blur(10px);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        margin-bottom: 30px;
    }

    .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient);
    }

    .card-header {
        background: transparent;
        border-bottom: 1px solid var(--card-border);
        padding: 1.5rem 1.5rem 1rem;
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .card-header h2 {
        color: var(--text-primary);
        font-weight: 700;
        font-size: 1.5rem;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .card-header h2 i {
        color: var(--primary-color);
        background: rgba(67, 97, 238, 0.1);
        width: 44px;
        height: 44px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-primary {
        background: var(--gradient);
        border: none;
        padding: 12px 28px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        letter-spacing: 0.5px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(67, 97, 238, 0.3);
    }

    .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.7s ease;
    }

    .btn-primary:hover::before {
        left: 100%;
    }

    .btn-danger {
        background: linear-gradient(135deg, var(--danger-color) 0%, #d90429 100%);
        border: none;
        padding: 12px 28px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        letter-spacing: 0.5px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-danger:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(247, 37, 133, 0.3);
    }

    .btn-danger:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none !important;
        box-shadow: none !important;
    }

    .table {
        background: transparent;
        border-radius: 12px;
        overflow: hidden;
        margin: 0;
    }

    .table thead {
        background: rgba(67, 97, 238, 0.1);
        backdrop-filter: blur(10px);
    }

    .table th {
        color: var(--text-primary);
        font-weight: 600;
        padding: 18px 16px;
        border-bottom: 1px solid var(--card-border);
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table td {
        padding: 16px;
        color: var(--text-secondary);
        border-bottom: 1px solid var(--card-border);
        vertical-align: middle;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .table tbody tr {
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.01);
    }

    .table tbody tr:hover {
        background: var(--hover-bg);
        transform: scale(1.01);
    }

    .table tbody tr:hover td {
        color: var(--text-primary);
    }

    .checkbox-cell {
        width: 40px;
        text-align: center;
    }

    .custom-checkbox {
        width: 20px;
        height: 20px;
        border: 2px solid var(--card-border);
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        transition: all 0.3s ease;
    }

    .custom-checkbox:hover {
        border-color: var(--primary-color);
    }

    .custom-checkbox input[type="checkbox"] {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 20px;
        width: 20px;
        background: transparent;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .custom-checkbox input:checked ~ .checkmark {
        background: var(--primary-color);
        border-color: var(--primary-color);
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .custom-checkbox input:checked ~ .checkmark:after {
        display: block;
        left: 7px;
        top: 3px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

    .status-select {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--card-border);
        color: var(--text-primary);
        border-radius: 8px;
        padding: 6px 12px;
        font-size: 0.85rem;
        font-weight: 500;
        transition: all 0.3s ease;
        cursor: pointer;
        min-width: 100px;
    }

    .status-select:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px rgba(67, 97, 238, 0.2);
    }

    .status-select option {
        background: var(--card-bg);
        color: var(--text-primary);
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .action-btn {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-primary);
        text-decoration: none;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }

    .action-btn.view {
        background: rgba(67, 97, 238, 0.1);
        border-color: rgba(67, 97, 238, 0.2);
        color: var(--primary-color);
    }

    .action-btn.delete {
        background: rgba(247, 37, 133, 0.1);
        border-color: rgba(247, 37, 133, 0.2);
        color: var(--danger-color);
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .action-btn.view:hover {
        background: rgba(67, 97, 238, 0.2);
        color: var(--text-primary);
    }

    .action-btn.delete:hover {
        background: rgba(247, 37, 133, 0.2);
        color: white;
    }

    .alert {
        border: none;
        border-radius: 12px;
        padding: 18px 22px;
        backdrop-filter: blur(10px);
        margin-bottom: 24px;
    }

    .alert-success {
        background: rgba(76, 201, 240, 0.1);
        color: var(--success-color);
        border-left: 4px solid var(--success-color);
    }

    .alert-danger {
        background: rgba(247, 37, 133, 0.1);
        color: var(--danger-color);
        border-left: 4px solid var(--danger-color);
    }

    .alert i {
        font-size: 1.2rem;
        margin-right: 12px;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: var(--text-secondary);
    }

    .empty-state-icon {
        font-size: 5rem;
        color: var(--primary-color);
        opacity: 0.2;
        margin-bottom: 20px;
        display: inline-block;
    }

    .empty-state h5 {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 10px;
        font-size: 1.5rem;
    }

    .empty-state p {
        color: var(--text-secondary);
        font-size: 1rem;
        max-width: 400px;
        margin: 0 auto 30px;
        line-height: 1.6;
    }

    .dataTables_wrapper .dataTables_filter input {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--card-border);
        color: var(--text-primary);
        border-radius: 8px;
        padding: 8px 15px;
        margin-left: 10px;
    }

    .dataTables_wrapper .dataTables_length select {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--card-border);
        color: var(--text-primary);
        border-radius: 8px;
        padding: 5px;
    }

    .dt-buttons .dt-button {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--card-border);
        color: var(--text-primary);
        padding: 8px 20px;
        border-radius: 8px;
        margin: 0 5px;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .dt-buttons .dt-button:hover {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
        transform: translateY(-2px);
    }

    .main-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .pagination-container {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .dataTables_paginate .paginate_button {
        background: rgba(255, 255, 255, 0.05) !important;
        border: 1px solid var(--card-border) !important;
        color: var(--text-primary) !important;
        margin: 0 2px;
        border-radius: 6px !important;
    }

    .dataTables_paginate .paginate_button:hover {
        background: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
        color: white !important;
    }

    .dataTables_paginate .paginate_button.current {
        background: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
        color: white !important;
    }

    @media (max-width: 768px) {
        .header-title {
            font-size: 1.8rem;
        }

        .card-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .stats-overview {
            grid-template-columns: repeat(2, 1fr);
        }

        .action-buttons {
            flex-direction: column;
        }

        .table-responsive {
            border-radius: 12px;
            overflow: auto;
        }
    }
</style>
@endsection

@section('main_content')
<!-- Dashboard Header -->
<section class="dashboard-header">
    <div class="header-content">
        <h1 class="header-title">
            <i class="fas fa-ticket-alt me-3"></i>{{ $title }}
        </h1>
        <p class="header-subtitle">Manage and monitor all support tickets from one dashboard</p>
    </div>
</section>

<!-- Main Container -->
<div class="main-container">
    <!-- Stats Overview -->
    <div class="stats-overview">
        <div class="stat-card">
            <div class="stat-value">{{ $tickets->count() }}</div>
            <div class="stat-label">Total Tickets</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">{{ $tickets->where('status', 1)->count() }}</div>
            <div class="stat-label">Open Tickets</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">{{ $tickets->where('status', 2)->count() }}</div>
            <div class="stat-label">Closed Tickets</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">{{ $priorities->count() ?? 0 }}</div>
            <div class="stat-label">Priority Levels</div>
        </div>
    </div>

    <!-- Main Card -->
    <div class="card">
        <div class="card-header">
            <h2>
                <i class="fas fa-list"></i>
                Tickets Management
            </h2>
            <button id="bulk-delete" class="btn btn-danger" disabled>
                <i class="fas fa-trash me-2"></i>Delete Selected
            </button>
        </div>

        <div class="card-body">
            <!-- Alerts -->
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>{{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>{{ session('error') }}
                </div>
            @endif

            <!-- Tickets Table -->
            @if($tickets->count() > 0)
                <div class="table-responsive">
                    <table id="tickets-table" class="table">
                        <thead>
                            <tr>
                                <th class="checkbox-cell">
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmark"></span>
                                    </div>
                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td class="checkbox-cell">
                                        <div class="custom-checkbox">
                                            <input type="checkbox" class="select-checkbox" data-id="{{ $ticket->id }}">
                                            <span class="checkmark"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="font-weight-medium">{{ $ticket->name }}</div>
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $ticket->email }}" class="text-primary">
                                            {{ $ticket->email }}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="text-truncate" style="max-width: 200px;">
                                            {{ $ticket->subject }}
                                        </div>
                                    </td>
                                    <td>
                                        @if($ticket->priority)
                                            <span class="badge
                                                @if(strtolower($ticket->priority->name) == 'high') bg-danger
                                                @elseif(strtolower($ticket->priority->name) == 'medium') bg-warning
                                                @else bg-primary @endif">
                                                {{ $ticket->priority->name }}
                                            </span>
                                        @else
                                            <span class="text-secondary">Not set</span>
                                        @endif
                                    </td>
                                    <td>
                                        <select name="status" class="status-select" data-ticket-id="{{ $ticket->id }}">
                                            <option value="1" @if ($ticket->status == 1) selected @endif>Open</option>
                                            <option value="2" @if ($ticket->status == 2) selected @endif>Closed</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('support-ticket.show', $ticket->uuid) }}"
                                               class="action-btn view"
                                               title="View Ticket Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="javascript:void(0);"
                                               data-url="{{ route('support-ticket.delete', [$ticket->uuid]) }}"
                                               class="action-btn delete"
                                               title="Delete Ticket">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-inbox"></i>
                    </div>
                    <h5>No Tickets Found</h5>
                    <p>There are no support tickets in the system yet.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize DataTable
        const table = $('#tickets-table').DataTable({
            dom: '<"row"<"col-md-6"B><"col-md-6"f>>rt<"row"<"col-md-6"l><"col-md-6"p>>',
            buttons: [
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel me-2"></i>Excel',
                    className: 'dt-button'
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf me-2"></i>PDF',
                    className: 'dt-button'
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print me-2"></i>Print',
                    className: 'dt-button'
                }
            ],
            paging: true,
            pageLength: 10,
            lengthChange: true,
            lengthMenu: [5, 10, 25, 50],
            searching: true,
            ordering: true,
            order: [[1, 'asc']],
            language: {
                search: "",
                searchPlaceholder: "Search tickets...",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ tickets",
                infoEmpty: "No tickets available",
                infoFiltered: "(filtered from _MAX_ total tickets)",
                zeroRecords: "No matching tickets found"
            },
            responsive: true,
            initComplete: function() {
                $('.dataTables_filter input').addClass('form-control');
                $('.dataTables_length select').addClass('form-select');
            }
        });

        // Select all functionality
        $('#select-all').change(function() {
            $('.select-checkbox').prop('checked', $(this).prop('checked'));
            toggleBulkDeleteButton();
        });

        $('.select-checkbox').change(function() {
            if(!$(this).prop('checked')) {
                $('#select-all').prop('checked', false);
            }
            toggleBulkDeleteButton();
        });

        function toggleBulkDeleteButton() {
            const selectedCount = $('.select-checkbox:checked').length;
            const btn = $('#bulk-delete');
            btn.prop('disabled', selectedCount === 0);

            if(selectedCount > 0) {
                btn.html(`<i class="fas fa-trash me-2"></i>Delete (${selectedCount})`);
            } else {
                btn.html('<i class="fas fa-trash me-2"></i>Delete Selected');
            }
        }

        // Bulk delete functionality
        $('#bulk-delete').click(function() {
            const ids = $('.select-checkbox:checked').map(function() {
                return $(this).data('id');
            }).get();

            if (ids.length === 0) return;

            Swal.fire({
                title: 'Delete Selected Tickets?',
                text: `You are about to delete ${ids.length} ticket(s). This action cannot be undone!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f72585',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete them!',
                cancelButtonText: 'Cancel',
                background: '#161b22',
                color: '#f0f6fc',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Deleting...',
                        text: 'Please wait while we delete the selected tickets',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        },
                        background: '#161b22',
                        color: '#f0f6fc'
                    });

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('support-ticket.bulkDelete') }}",
                        data: {
                            ids: ids,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Selected tickets have been deleted successfully',
                                icon: 'success',
                                confirmButtonColor: '#4361ee',
                                background: '#161b22',
                                color: '#f0f6fc'
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Error!',
                                text: 'There was an error deleting the tickets',
                                icon: 'error',
                                confirmButtonColor: '#4361ee',
                                background: '#161b22',
                                color: '#f0f6fc'
                            });
                        }
                    });
                }
            });
        });

        // Individual delete functionality
        $(document).on('click', '.action-btn.delete', function() {
            const deleteUrl = $(this).data('url');
            const ticketRow = $(this).closest('tr');

            Swal.fire({
                title: 'Delete Ticket?',
                text: 'Are you sure you want to delete this ticket? This action cannot be undone!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f72585',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                background: '#161b22',
                color: '#f0f6fc',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        url: deleteUrl,
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function() {
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Ticket has been deleted successfully',
                                icon: 'success',
                                confirmButtonColor: '#4361ee',
                                background: '#161b22',
                                color: '#f0f6fc'
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Error!',
                                text: 'There was an error deleting the ticket',
                                icon: 'error',
                                confirmButtonColor: '#4361ee',
                                background: '#161b22',
                                color: '#f0f6fc'
                            });
                        }
                    });
                }
            });
        });

        // Status change functionality
        $(document).on('change', '.status-select', function() {
            const ticketId = $(this).data('ticket-id');
            const newStatus = $(this).val();
            const select = $(this);

            select.prop('disabled', true);

            $.ajax({
                type: 'POST',
                url: "{{ route('support-ticket.changeTicketStatus') }}",
                data: {
                    ticket_id: ticketId,
                    status: newStatus,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Status Updated!',
                        text: 'Ticket status has been updated successfully',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false,
                        background: '#161b22',
                        color: '#f0f6fc'
                    });
                },
                error: function() {
                    Swal.fire({
                        title: 'Error!',
                        text: 'There was an error updating the status',
                        icon: 'error',
                        confirmButtonColor: '#4361ee',
                        background: '#161b22',
                        color: '#f0f6fc'
                    });
                    select.val(select.data('old-value'));
                },
                complete: function() {
                    select.prop('disabled', false);
                }
            });
        });

        // Store old value before change
        $(document).on('focus', '.status-select', function() {
            $(this).data('old-value', $(this).val());
        });

        // Keyboard shortcuts
        $(document).keydown(function(e) {
            // Ctrl/Cmd + A to select all
            if ((e.ctrlKey || e.metaKey) && e.key === 'a') {
                e.preventDefault();
                $('#select-all').click();
            }

            // Ctrl/Cmd + D to deselect all
            if ((e.ctrlKey || e.metaKey) && e.key === 'd') {
                e.preventDefault();
                $('#select-all').prop('checked', false).trigger('change');
            }

            // Delete key for bulk delete
            if (e.key === 'Delete' && $('.select-checkbox:checked').length > 0) {
                e.preventDefault();
                $('#bulk-delete').click();
            }
        });

        // Add tooltips
        $('[title]').tooltip({
            placement: 'top',
            trigger: 'hover'
        });
    });
</script>
@endsection
