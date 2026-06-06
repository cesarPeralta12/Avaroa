@extends('layout.master')

@section('title', 'Notification History')

@section('css')
<style>
    .type-email { border-left-color: #3b82f6; }
    .type-sms { border-left-color: #10b981; }
    .type-push { border-left-color: #f59e0b; }
    .type-whatsapp { border-left-color: #25d366; }
    .notification-card {
        border-left: 4px solid;
        transition: all 0.3s ease;
    }
    .notification-card:hover {
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .status-badge {
        padding: 0.5em 1em;
        border-radius: 20px;
        font-size: 0.85em;
    }
</style>
@endsection

@section('main_content')
<div class="page-content">
    <div class="container-fluid">

        {{-- Stats --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h6>Sent Today</h6>
                        <h3>{{ $stats['total_today'] }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h6>This Week</h6>
                        <h3>{{ $stats['total_week'] }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h6>Emails</h6>
                        <h3>{{ $stats['email_count'] }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h6>SMS</h6>
                        <h3>{{ $stats['sms_count'] }}</h3>
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
                               placeholder="Search user, email or subject" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="type" class="form-select">
                            <option value="">All Types</option>
                            @foreach($types as $type)
                                <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                                    {{ ucfirst($type) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="date_from" class="form-control"
                               value="{{ request('date_from') }}">
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="date_to" class="form-control"
                               value="{{ request('date_to') }}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Filter
                        </button>
                        <a href="{{ route('notification.history') }}" class="btn btn-secondary">
                            <i class="fas fa-redo"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        {{-- Notifications List --}}
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Notification History</h4>
            </div>
            <div class="card-body">
                @forelse($notifications as $notification)
                <div class="notification-card type-{{ $notification->notification_type }} card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        @if($notification->notification_type == 'email')
                                            <i class="fas fa-envelope fa-2x text-primary"></i>
                                        @elseif($notification->notification_type == 'sms')
                                            <i class="fas fa-sms fa-2x text-success"></i>
                                        @elseif($notification->notification_type == 'whatsapp')
                                            <i class="fab fa-whatsapp fa-2x text-success"></i>
                                        @else
                                            <i class="fas fa-bell fa-2x text-warning"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <strong>{{ $notification->user?->name ?? 'System' }}</strong>
                                        <br>
                                        <small class="text-muted">To: {{ $notification->sent_to }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <strong>{{ $notification->subject ?? 'No Subject' }}</strong>
                                <br>
                                <small class="text-muted">{{ Str::limit($notification->message, 50) }}</small>
                            </div>
                            <div class="col-md-2">
                                <span class="badge bg-light text-dark text-uppercase">
                                    {{ $notification->notification_type }}
                                </span>
                                <br>
                                <small class="text-muted">From: {{ $notification->sent_from ?? 'System' }}</small>
                            </div>
                            <div class="col-md-3 text-end">
                                <div class="mb-2">
                                    <small class="text-muted">
                                        <i class="fas fa-clock"></i> {{ $notification->created_at->format('d M Y H:i') }}
                                    </small>
                                </div>
                                <button class="btn btn-sm btn-info view-message"
                                        data-subject="{{ $notification->subject }}"
                                        data-message="{{ $notification->message }}"
                                        data-recipient="{{ $notification->sent_to }}"
                                        data-type="{{ $notification->notification_type }}">
                                    <i class="fas fa-eye"></i> View
                                </button>
                                <button class="btn btn-sm btn-primary resend-btn" data-id="{{ $notification->id }}">
                                    <i class="fas fa-redo"></i> Resend
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-paper-plane fa-3x mb-3"></i>
                    <h5>No notifications found</h5>
                </div>
                @endforelse

                {{ $notifications->links() }}
            </div>
        </div>
    </div>
</div>

{{-- View Message Modal --}}
<div class="modal fade" id="messageModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title">Message Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label"><strong>Subject:</strong></label>
                    <p id="msg-subject" class="form-control-plaintext"></p>
                </div>
                <div class="mb-3">
                    <label class="form-label"><strong>Recipient:</strong></label>
                    <p id="msg-recipient" class="form-control-plaintext"></p>
                </div>
                <div class="mb-3">
                    <label class="form-label"><strong>Type:</strong></label>
                    <span id="msg-type" class="badge bg-primary"></span>
                </div>
                <div class="mb-3">
                    <label class="form-label"><strong>Message:</strong></label>
                    <div id="msg-content" class="p-3 bg-light rounded"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.view-message').click(function() {
        $('#msg-subject').text($(this).data('subject'));
        $('#msg-recipient').text($(this).data('recipient'));
        $('#msg-type').text($(this).data('type').toUpperCase());
        $('#msg-content').html($(this).data('message'));
        $('#messageModal').modal('show');
    });

    $('.resend-btn').click(function() {
        const id = $(this).data('id');
        Swal.fire({
            title: 'Resend Notification?',
            text: "This will resend the notification to the recipient",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, resend it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Add your resend AJAX here
                Swal.fire('Sent!', 'Notification has been resent.', 'success');
            }
        });
    });
});
</script>
@endsection
