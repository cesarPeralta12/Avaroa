@extends('user-master')
@section('title')
    {{ __('Create Support Ticket') }}
@endsection

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

    .hero-section {
        background: var(--gradient);
        padding: 80px 0 40px;
        position: relative;
        overflow: hidden;
        margin-bottom: 40px;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        top: -150px;
        right: -100px;
    }

    .hero-section::after {
        content: '';
        position: absolute;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        bottom: -100px;
        left: -50px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        background: linear-gradient(120deg, #fff 0%, rgba(255,255,255,0.8) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 0 2px 20px rgba(0,0,0,0.1);
    }

    .hero-subtitle {
        font-size: 1.2rem;
        color: rgba(255,255,255,0.9);
        margin-bottom: 30px;
        line-height: 1.6;
    }

    .main-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .card {
        background: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 16px;
        backdrop-filter: blur(10px);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
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

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.4), 0 0 0 1px rgba(67, 97, 238, 0.2);
        border-color: rgba(67, 97, 238, 0.3);
    }

    .card-header {
        background: transparent;
        border-bottom: 1px solid var(--card-border);
        padding: 1.75rem 1.75rem 1rem;
        position: relative;
    }

    .card-header h4 {
        color: var(--text-primary);
        font-weight: 700;
        font-size: 1.5rem;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .card-header h4 i {
        color: var(--primary-color);
        background: rgba(67, 97, 238, 0.1);
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }

    .form-control, .form-select {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid var(--card-border);
        color: var(--text-primary);
        border-radius: 12px;
        padding: 14px 18px;
        font-size: 1rem;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .form-control:focus, .form-select:focus {
        background: rgba(255, 255, 255, 0.05);
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        color: var(--text-primary);
        outline: none;
        transform: translateY(-1px);
    }

    .form-control::placeholder {
        color: var(--text-secondary);
    }

    .form-label {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.95rem;
    }

    .form-label i {
        color: var(--primary-light);
        font-size: 0.9rem;
    }

    .input-group {
        border-radius: 12px;
        overflow: hidden;
    }

    .input-group-text {
        background: rgba(67, 97, 238, 0.1);
        border: 1px solid var(--card-border);
        color: var(--primary-color);
        font-weight: 500;
        padding: 0 18px;
    }

    .btn-primary {
        background: var(--gradient);
        border: none;
        padding: 16px 36px;
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

    .btn-outline-light {
        border: 2px solid var(--card-border);
        background: transparent;
        color: var(--text-primary);
        padding: 14px 28px;
        border-radius: 12px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-outline-light:hover {
        border-color: var(--primary-color);
        background: rgba(67, 97, 238, 0.05);
        color: var(--text-primary);
        transform: translateY(-2px);
    }

    .status-indicator {
        display: inline-flex;
        align-items: center;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        gap: 8px;
    }

    .status-open {
        background: rgba(76, 201, 240, 0.1);
        color: var(--success-color);
        border: 1px solid rgba(76, 201, 240, 0.3);
    }

    .status-closed {
        background: rgba(247, 37, 133, 0.1);
        color: var(--danger-color);
        border: 1px solid rgba(247, 37, 133, 0.3);
    }

    .priority-tag {
        display: inline-flex;
        align-items: center;
        padding: 6px 14px;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 600;
        gap: 6px;
    }

    .priority-high {
        background: rgba(247, 37, 133, 0.15);
        color: var(--danger-color);
        border: 1px solid rgba(247, 37, 133, 0.3);
    }

    .priority-medium {
        background: rgba(248, 150, 30, 0.15);
        color: var(--warning-color);
        border: 1px solid rgba(248, 150, 30, 0.3);
    }

    .priority-low {
        background: rgba(67, 97, 238, 0.15);
        color: var(--primary-color);
        border: 1px solid rgba(67, 97, 238, 0.3);
    }

    .action-button {
        background: rgba(67, 97, 238, 0.1);
        border: 1px solid rgba(67, 97, 238, 0.2);
        color: var(--primary-color);
        padding: 10px 20px;
        border-radius: 10px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .action-button:hover {
        background: rgba(67, 97, 238, 0.2);
        color: var(--text-primary);
        transform: translateY(-2px);
        text-decoration: none;
        box-shadow: 0 8px 20px rgba(67, 97, 238, 0.2);
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

    .empty-state {
        text-align: center;
        padding: 60px 20px;
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

    .stats-badge {
        background: var(--gradient);
        color: white;
        padding: 6px 16px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
        box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
    }

    .section-divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--card-border), transparent);
        margin: 40px 0;
        border: none;
    }

    .quick-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        border-color: var(--primary-color);
        transform: translateY(-4px);
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
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
        }

        .main-container {
            padding: 0 15px;
        }

        .card-header h4 {
            font-size: 1.3rem;
        }

        .btn-primary, .btn-outline-light {
            width: 100%;
            justify-content: center;
            margin-bottom: 10px;
        }

        .quick-stats {
            grid-template-columns: repeat(2, 1fr);
        }

        .stat-value {
            font-size: 2rem;
        }
    }
</style>


@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="main-container">
        <div class="hero-content">
            <h1 class="hero-title">
                <i class="fas fa-headset me-3"></i>Support Ticket System
            </h1>
            <p class="hero-subtitle">
                Create new support tickets, track existing ones, and get help from our expert team.
                We're here to help you 24/7 with any issues or questions you may have.
            </p>
        </div>
    </div>
</section>

<!-- Quick Stats -->
<div class="main-container">
    <div class="quick-stats">
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
            <div class="stat-value">{{ $departments->count() }}</div>
            <div class="stat-label">Departments</div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="main-container">
    <div class="row g-4">
        <!-- Create Ticket Form -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="fas fa-plus-circle"></i>
                        Create New Ticket
                    </h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle"></i>
                            <div>
                                <h6 class="mb-2">Please fix the following errors:</h6>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('tickets.store') }}" method="POST" id="ticketForm">
                        @csrf

                        <!-- Personal Information -->
                        <div class="mb-4">
                            <h6 class="form-label mb-3">
                                <i class="fas fa-user-circle"></i> Personal Information
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">
                                        <i class="fas fa-user"></i> Full Name
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user-tag"></i>
                                        </span>
                                        <input type="text" id="name" name="name" class="form-control"
                                               value="{{ old('name', auth()->user()->name ?? '') }}"
                                               placeholder="Enter your full name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">
                                        <i class="fas fa-envelope"></i> Email Address
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-at"></i>
                                        </span>
                                        <input type="email" id="email" name="email" class="form-control"
                                               value="{{ old('email', auth()->user()->email ?? '') }}"
                                               placeholder="your.email@example.com" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Ticket Details -->
                        <div class="mb-4">
                            <h6 class="form-label mb-3">
                                <i class="fas fa-file-alt"></i> Ticket Details
                            </h6>
                            <div class="mb-3">
                                <label for="subject" class="form-label">
                                    <i class="fas fa-heading"></i> Subject
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                    <input type="text" id="subject" name="subject" class="form-control"
                                           value="{{ old('subject') }}"
                                           placeholder="Brief description of your issue" required>

                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="status" class="form-label">
                                        <i class="fas fa-toggle-on"></i> Status
                                    </label>
                                    <select id="status" name="status" class="form-select">
                                        <option class="text-dark" value="1" {{ old('status') == 1 ? 'selected' : '' }}>Open</option>
                                        <option class="text-dark" value="2" {{ old('status') == 2 ? 'selected' : '' }}>Closed</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="department_id" class="form-label">
                                        <i class="fas fa-building"></i> Department
                                    </label>
                                    <select id="department_id" name="department_id" class="form-select">
                                        <option value="">Select Department</option>
                                        @foreach ($departments as $department)
                                            <option class="text-dark" value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="mb-4">
                            <h6 class="form-label mb-3">
                                <i class="fas fa-cogs"></i> Additional Information
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="related_service_id" class="form-label">
                                        <i class="fas fa-concierge-bell"></i> Related Service
                                    </label>
                                    <select id="related_service_id" name="related_service_id" class="form-select">
                                        <option value="">Select Service</option>
                                        @foreach ($relatedServices as $service)
                                            <option class="text-dark" value="{{ $service->id }}" {{ old('related_service_id') == $service->id ? 'selected' : '' }}>
                                                {{ $service->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="priority_id" class="form-label">
                                        <i class="fas fa-exclamation-triangle"></i> Priority
                                    </label>
                                    <select id="priority_id" name="priority_id" class="form-select">
                                        <option value="">Select Priority</option>
                                        @foreach ($priorities as $priority)
                                            <option class="text-dark" value="{{ $priority->id }}" {{ old('priority_id') == $priority->id ? 'selected' : '' }}>
                                                {{ $priority->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="d-flex flex-column flex-md-row justify-content-end gap-3 mt-4 pt-3 border-top border-card-border">
                            <button type="reset" class="btn btn-outline-light">
                                <i class="fas fa-redo me-2"></i>Reset Form
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>Create Ticket
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Ticket List -->
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>
                        <i class="fas fa-list"></i>
                        My Support Tickets
                    </h4>
                    <span class="stats-badge">{{ $tickets->count() }} tickets</span>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i>{{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle"></i>{{ session('error') }}
                        </div>
                    @endif

                    @if($tickets->count() > 0)
                        <div class="table-responsive">
                            <table id="ticketsTable" class="table">
                                <thead>
                                    <tr>
                                        <th>Ticket #</th>
                                        <th>Subject</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>
                                                <strong class="text-primary">{{ $ticket->ticket_number }}</strong>
                                                <div class="small text-secondary mt-1">
                                                    {{ $ticket->created_at->format('M d') }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-truncate" style="max-width: 200px;">
                                                    {{ $ticket->subject }}
                                                </div>
                                            </td>
                                            <td>
                                                @if($ticket->priority)
                                                    @php
                                                        $priorityClass = match(strtolower($ticket->priority->name)) {
                                                            'high' => 'priority-high',
                                                            'medium' => 'priority-medium',
                                                            'low' => 'priority-low',
                                                            default => 'priority-low'
                                                        };
                                                    @endphp
                                                    <span class="priority-tag {{ $priorityClass }}">
                                                        <i class="fas fa-flag"></i>{{ $ticket->priority->name }}
                                                    </span>
                                                @else
                                                    <span class="text-secondary">Not set</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="status-indicator {{ $ticket->status == 1 ? 'status-open' : 'status-closed' }}">
                                                    <i class="fas fa-circle"></i>
                                                    {{ $ticket->status == 1 ? 'Open' : 'Closed' }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('show', $ticket->uuid) }}" class="action-button">
                                                    <i class="fas fa-eye"></i>View
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-state-icon">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                            <h5>No Tickets Yet</h5>
                            <p>You haven't created any support tickets yet.</p>
                            <p class="text-secondary mt-3">
                                <i class="fas fa-lightbulb me-2"></i>
                                Fill out the form to create your first support ticket and get help from our team.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#ticketsTable').DataTable({
            dom: '<"row"<"col-md-6"B><"col-md-6"f>>rt<"row"<"col-md-6"l><"col-md-6"p>>',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel me-2"></i>Export Excel',
                    className: 'btn-primary btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf me-2"></i>Export PDF',
                    className: 'btn-primary btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                }
            ],
            paging: true,
            pageLength: 10,
            lengthChange: true,
            lengthMenu: [5, 10, 25, 50],
            searching: true,
            ordering: true,
            order: [[0, 'desc']],
            language: {
                search: "",
                searchPlaceholder: "Search tickets...",
                lengthMenu: "Show _MENU_ tickets",
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

        // Form validation
        $('#ticketForm').on('submit', function(e) {
            const name = $('#name').val().trim();
            const email = $('#email').val().trim();
            const subject = $('#subject').val().trim();

            if (!name || !email || !subject) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Missing Information',
                    text: 'Please fill in all required fields',
                    confirmButtonColor: '#4361ee',
                    background: '#161b22',
                    color: '#f0f6fc'
                });
                return false;
            }

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Email',
                    text: 'Please enter a valid email address',
                    confirmButtonColor: '#4361ee',
                    background: '#161b22',
                    color: '#f0f6fc'
                });
                return false;
            }

            return true;
        });

        // Auto-fill form for logged-in users
        @if(auth()->check())
            $('#name').val('{{ auth()->user()->name }}');
            $('#email').val('{{ auth()->user()->email }}');
        @endif

        // Show success message
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000,
                background: '#161b22',
                color: '#f0f6fc'
            });
        @endif

        // Show error message
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#4361ee',
                background: '#161b22',
                color: '#f0f6fc'
            });
        @endif

        // Add keyboard shortcuts
        $(document).keydown(function(e) {
            // Ctrl/Cmd + Enter to submit form
            if ((e.ctrlKey || e.metaKey) && e.keyCode === 13) {
                $('#ticketForm').submit();
            }
        });

        // Add floating labels effect
        $('.form-control, .form-select').on('focus', function() {
            $(this).parent().addClass('focused');
        }).on('blur', function() {
            if (!$(this).val()) {
                $(this).parent().removeClass('focused');
            }
        });
    });
</script>
@endsection
