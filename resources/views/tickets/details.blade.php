@extends('user-master')

@section('title')
   Ticket Details
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

    .ticket-hero {
        background: var(--gradient);
        padding: 60px 0 40px;
        position: relative;
        overflow: hidden;
        margin-bottom: 40px;
    }

    .ticket-hero::before {
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

    .ticket-hero-content {
        position: relative;
        z-index: 2;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .ticket-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .ticket-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 10px;
        background: linear-gradient(120deg, #fff 0%, rgba(255,255,255,0.8) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .ticket-subtitle {
        color: rgba(255,255,255,0.9);
        font-size: 1.1rem;
    }

    .ticket-number {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 15px 25px;
        border-radius: 12px;
        border: 1px solid rgba(255,255,255,0.2);
    }

    .ticket-number strong {
        color: white;
        font-size: 1.2rem;
        font-weight: 600;
    }

    .main-container {
        max-width: 1200px;
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
        padding: 1.75rem 1.75rem 1rem;
        position: relative;
    }

    .card-header h5 {
        color: var(--text-primary);
        font-weight: 700;
        font-size: 1.3rem;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card-header h5 i {
        color: var(--primary-color);
        background: rgba(67, 97, 238, 0.1);
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .message-container {
        padding: 20px;
    }

    .message-bubble {
        background: var(--hover-bg);
        border: 1px solid var(--card-border);
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 20px;
        position: relative;
        transition: all 0.3s ease;
    }

    .message-bubble:hover {
        border-color: var(--primary-color);
        transform: translateY(-2px);
    }

    .message-bubble.admin {
        border-left: 4px solid var(--primary-color);
        background: rgba(67, 97, 238, 0.05);
    }

    .message-bubble.user {
        border-left: 4px solid var(--success-color);
        background: rgba(76, 201, 240, 0.05);
    }

    .message-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
    }

    .sender-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .sender-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 1rem;
    }

    .sender-name {
        font-weight: 600;
        color: var(--text-primary);
    }

    .sender-role {
        font-size: 0.85rem;
        color: var(--text-secondary);
        margin-top: 2px;
    }

    .message-time {
        font-size: 0.85rem;
        color: var(--text-secondary);
    }

    .message-content {
        color: var(--text-primary);
        line-height: 1.6;
        margin-bottom: 15px;
        white-space: pre-wrap;
    }

    .attachment-preview {
        margin-top: 15px;
    }

    .attachment-image {
        max-width: 200px;
        border-radius: 10px;
        border: 1px solid var(--card-border);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .attachment-image:hover {
        transform: scale(1.05);
        border-color: var(--primary-color);
    }

    .empty-messages {
        text-align: center;
        padding: 40px 20px;
        color: var(--text-secondary);
    }

    .empty-messages i {
        font-size: 4rem;
        color: var(--primary-color);
        opacity: 0.2;
        margin-bottom: 20px;
    }

    .form-control, .form-select, textarea {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid var(--card-border);
        color: var(--text-primary);
        border-radius: 12px;
        padding: 14px 18px;
        font-size: 1rem;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .form-control:focus, textarea:focus {
        background: rgba(255, 255, 255, 0.05);
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        color: var(--text-primary);
        outline: none;
        transform: translateY(-1px);
    }

    textarea {
        min-height: 150px;
        resize: vertical;
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

    .file-upload {
        position: relative;
        overflow: hidden;
        margin-top: 10px;
    }

    .file-upload input[type="file"] {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .file-upload-label {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 15px;
        background: rgba(67, 97, 238, 0.1);
        border: 2px dashed rgba(67, 97, 238, 0.3);
        border-radius: 12px;
        color: var(--primary-color);
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-upload-label:hover {
        background: rgba(67, 97, 238, 0.15);
        border-color: var(--primary-color);
    }

    .file-info {
        font-size: 0.85rem;
        color: var(--text-secondary);
        margin-top: 5px;
    }

    .btn-primary {
        background: var(--gradient);
        border: none;
        padding: 14px 32px;
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

    .ticket-info-card {
        background: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 16px;
        padding: 25px;
        height: 100%;
    }

    .info-section {
        margin-bottom: 25px;
    }

    .info-section:last-child {
        margin-bottom: 0;
    }

    .info-title {
        color: var(--text-secondary);
        font-size: 0.85rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }

    .info-value {
        color: var(--text-primary);
        font-weight: 600;
        font-size: 1.1rem;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        gap: 8px;
    }

    .status-open {
        background: rgba(76, 201, 240, 0.15);
        color: var(--success-color);
        border: 1px solid rgba(76, 201, 240, 0.3);
    }

    .status-closed {
        background: rgba(247, 37, 133, 0.15);
        color: var(--danger-color);
        border: 1px solid rgba(247, 37, 133, 0.3);
    }

    .priority-badge {
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

    .action-buttons {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .btn-secondary {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--card-border);
        color: var(--text-primary);
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: var(--primary-color);
        color: var(--text-primary);
        transform: translateY(-2px);
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--text-secondary);
        text-decoration: none;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    .back-button:hover {
        color: var(--primary-color);
        transform: translateX(-5px);
    }

    .scroll-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: var(--gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        box-shadow: 0 10px 30px rgba(67, 97, 238, 0.3);
        opacity: 0;
        transition: all 0.3s ease;
        z-index: 1000;
    }

    .scroll-top.visible {
        opacity: 1;
    }

    .scroll-top:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(67, 97, 238, 0.4);
    }

    @media (max-width: 768px) {
        .ticket-title {
            font-size: 2rem;
        }

        .ticket-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .ticket-number {
            width: 100%;
        }

        .action-buttons {
            flex-direction: column;
        }

        .message-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .scroll-top {
            bottom: 20px;
            right: 20px;
            width: 45px;
            height: 45px;
        }
    }
</style>


@section('content')
<!-- Ticket Hero Section -->
<section class="ticket-hero">
    <div class="ticket-hero-content">
        <div class="ticket-header">
            <div>
                <h1 class="ticket-title">
                    <i class="fas fa-ticket-alt me-3"></i>Ticket Details
                </h1>
                <p class="ticket-subtitle">
                    View and manage your support ticket conversation
                </p>
            </div>
            <div class="ticket-number">
                <strong>Ticket #{{ $ticket->ticket_number }}</strong>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<div class="main-container">
    <!-- Back Button -->
    <a href="{{ url()->previous() }}" class="back-button">
        <i class="fas fa-arrow-left"></i> Back to Tickets
    </a>

    <div class="row g-4">
        <!-- Conversation Column -->
        <div class="col-lg-8">
            <!-- Messages Card -->
            <div class="card">
                <div class="card-header">
                    <h5>
                        <i class="fas fa-comments"></i>
                        Ticket Conversation
                    </h5>
                </div>
                <div class="message-container">
                    @forelse($ticketMessages as $ticketMessage)
                        <div class="message-bubble {{ $ticketMessage->reply_admin_user_id ? 'admin' : 'user' }}">
                            <div class="message-header">
                                <div class="sender-info">
                                    <div class="sender-avatar">
                                        @if($ticketMessage->sender_user_id && $ticketMessage->sendUser)
                                            {{ substr($ticketMessage->sendUser->name, 0, 1) }}
                                        @elseif($ticketMessage->reply_admin_user_id && $ticketMessage->replyUser)
                                            {{ substr($ticketMessage->replyUser->name, 0, 1) }}
                                        @else
                                            ?
                                        @endif
                                    </div>
                                    <div>
                                        <div class="sender-name">
                                            @if($ticketMessage->sender_user_id && $ticketMessage->sendUser)
                                                {{ $ticketMessage->sendUser->name }}
                                            @elseif($ticketMessage->reply_admin_user_id && $ticketMessage->replyUser)
                                                {{ $ticketMessage->replyUser->name }}
                                                <span class="badge bg-primary ms-2">Support</span>
                                            @else
                                                Unknown User
                                            @endif
                                        </div>
                                        <div class="sender-role">
                                            @if($ticketMessage->reply_admin_user_id)
                                                Support Agent
                                            @else
                                                Customer
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="message-time">
                                    {{ $ticketMessage->created_at->format('M d, Y h:i A') }}
                                </div>
                            </div>
                            <div class="message-content">
                                {{ $ticketMessage->message }}
                            </div>
                            @if($ticketMessage->file)
                                <div class="attachment-preview">
                                    <a href="{{ getImageFile($ticketMessage->file) }}" target="_blank" title="View attachment">
                                        <img src="{{ getImageFile($ticketMessage->file) }}"
                                             class="attachment-image"
                                             alt="Attachment">
                                    </a>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="empty-messages">
                            <i class="fas fa-comment-slash"></i>
                            <h5>No Messages Yet</h5>
                            <p>Be the first to start the conversation</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Reply Form Card -->
            <div class="card">
                <div class="card-header">
                    <h5>
                        <i class="fas fa-reply"></i>
                        Write a Reply
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('support-ticket.messageStore') }}" method="post"
                          enctype="multipart/form-data" id="ticketReplyForm">
                        @csrf
                        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                        <div class="mb-4">
                            <label class="form-label">
                                <i class="fas fa-edit"></i> Your Message
                            </label>
                            <textarea class="form-control" name="message" rows="5"
                                      placeholder="Type your reply here..." required></textarea>
                            @error('message')
                                <div class="text-danger small mt-2">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                <i class="fas fa-paperclip"></i> Attach File
                            </label>
                            <div class="file-upload">
                                <input type="file" name="file" id="fileInput" class="form-control-file">
                                <label for="fileInput" class="file-upload-label">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span>Click to upload file</span>
                                </label>
                            </div>
                            <div class="file-info">
                                <i class="fas fa-info-circle me-1"></i>
                                Supported formats: JPG, JPEG, PNG, GIF | Max size: 10MB
                            </div>
                            @error('file')
                                <div class="text-danger small mt-2">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="action-buttons">
                            <button type="button" class="btn btn-secondary" onclick="clearForm()">
                                <i class="fas fa-times me-2"></i>Clear
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>Send Reply
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Ticket Info Column -->
        <div class="col-lg-4">
            <div class="ticket-info-card">
                <div class="info-section">
                    <div class="info-title">Ticket Status</div>
                    <div class="info-value">
                        <span class="status-badge {{ $ticket->status == 1 ? 'status-open' : 'status-closed' }}">
                            <i class="fas fa-circle"></i>
                            {{ $ticket->status == 1 ? 'Open' : 'Closed' }}
                        </span>
                    </div>
                </div>

                <div class="info-section">
                    <div class="info-title">Subject</div>
                    <div class="info-value">{{ $ticket->subject }}</div>
                </div>

                @if($ticket->department)
                <div class="info-section">
                    <div class="info-title">Department</div>
                    <div class="info-value">{{ $ticket->department->name }}</div>
                </div>
                @endif

                @if($ticket->priority)
                <div class="info-section">
                    <div class="info-title">Priority</div>
                    <div class="info-value">
                        @php
                            $priorityClass = match(strtolower($ticket->priority->name)) {
                                'high' => 'priority-high',
                                'medium' => 'priority-medium',
                                'low' => 'priority-low',
                                default => 'priority-low'
                            };
                        @endphp
                        <span class="priority-badge {{ $priorityClass }}">
                            <i class="fas fa-flag"></i>{{ $ticket->priority->name }}
                        </span>
                    </div>
                </div>
                @endif

                @if($ticket->service)
                <div class="info-section">
                    <div class="info-title">Related Service</div>
                    <div class="info-value">{{ $ticket->service->name }}</div>
                </div>
                @endif

                <div class="info-section">
                    <div class="info-title">Created On</div>
                    <div class="info-value">
                        {{ $ticket->created_at->format('F d, Y \a\t h:i A') }}
                    </div>
                </div>

                <div class="info-section">
                    <div class="info-title">Last Response</div>
                    <div class="info-value">
                        @if($last_message)
                            {{ $last_message->created_at->format('F d, Y \a\t h:i A') }}
                        @else
                            No responses yet
                        @endif
                    </div>
                </div>

                <div class="info-section">
                    <div class="info-title">Total Messages</div>
                    <div class="info-value">{{ $ticketMessages->count() }}</div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('tickets.create') }}" class="btn btn-secondary w-100">
                        <i class="fas fa-list me-2"></i>View All Tickets
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scroll to Top Button -->
<a href="#" class="scroll-top" id="scrollTop">
    <i class="fas fa-arrow-up"></i>
</a>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Form submission with SweetAlert
        $('#ticketReplyForm').on('submit', function(e) {
            e.preventDefault();

            const form = this;
            const message = $('textarea[name="message"]').val().trim();

            if (!message) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Missing Message',
                    text: 'Please enter your reply message',
                    confirmButtonColor: '#4361ee',
                    background: '#161b22',
                    color: '#f0f6fc'
                });
                return false;
            }

            Swal.fire({
                title: 'Submit Reply',
                text: 'Are you sure you want to send this reply?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4361ee',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, send it!',
                cancelButtonText: 'Cancel',
                background: '#161b22',
                color: '#f0f6fc',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading
                    Swal.fire({
                        title: 'Sending...',
                        text: 'Please wait while we submit your reply',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        },
                        background: '#161b22',
                        color: '#f0f6fc'
                    });

                    // Submit form
                    form.submit();
                }
            });
        });

        // Clear form function
        window.clearForm = function() {
            $('textarea[name="message"]').val('');
            $('#fileInput').val('');
            Swal.fire({
                icon: 'success',
                title: 'Form Cleared',
                text: 'Reply form has been cleared',
                timer: 1500,
                showConfirmButton: false,
                background: '#161b22',
                color: '#f0f6fc'
            });
        };

        // File input preview
        $('#fileInput').on('change', function() {
            const fileName = $(this).val().split('\\').pop();
            if (fileName) {
                $(this).next('.file-upload-label').html(
                    `<i class="fas fa-check-circle"></i><span>${fileName}</span>`
                );
            }
        });

        // Scroll to top functionality
        const scrollTopBtn = document.getElementById('scrollTop');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        });

        scrollTopBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Auto-scroll to latest message
        if ($('.message-bubble').length > 0) {
            $('html, body').animate({
                scrollTop: $('.message-bubble:last').offset().top - 100
            }, 1000);
        }

        // Show file size warning
        $('#fileInput').on('change', function() {
            const file = this.files[0];
            if (file && file.size > 10 * 1024 * 1024) { // 10MB
                Swal.fire({
                    icon: 'error',
                    title: 'File Too Large',
                    text: 'File size exceeds 10MB limit',
                    confirmButtonColor: '#4361ee',
                    background: '#161b22',
                    color: '#f0f6fc'
                });
                $(this).val('');
            }
        });

        // Keyboard shortcuts
        $(document).keydown(function(e) {
            // Ctrl/Cmd + Enter to submit form
            if ((e.ctrlKey || e.metaKey) && e.keyCode === 13) {
                $('#ticketReplyForm').submit();
            }

            // Escape to clear form
            if (e.keyCode === 27) {
                clearForm();
            }
        });
    });
</script>
@endsection
