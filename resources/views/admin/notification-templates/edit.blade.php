@extends('layout.master')

@section('title', 'Edit Template - ' . $template->display_name)

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/summernote.css') }}">
    <style>
        :root {
            --bg-primary: #0f172a;
            --bg-secondary: #1e293b;
            --bg-card: rgba(30, 41, 59, 0.8);
            --border-color: #334155;
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --accent-purple: #8b5cf6;
            --accent-blue: #3b82f6;
            --accent-green: #10b981;
            --accent-red: #ef4444;
            --accent-yellow: #f59e0b;
        }

        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
            min-height: 100vh;
        }

        .glass-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.9) 0%, rgba(15, 23, 42, 0.9) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow:
                0 20px 40px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        .glow-border {
            position: relative;
            border: 1px solid transparent;
            background-clip: padding-box;
        }
        .glow-border::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #8b5cf6, #3b82f6, #10b981, #f59e0b);
            border-radius: inherit;
            z-index: -1;
            opacity: 0.3;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { opacity: 0.3; }
            to { opacity: 0.6; }
        }

        .nav-tabs {
            border-bottom: 2px solid var(--border-color);
        }
        .nav-tabs .nav-link {
            color: var(--text-secondary);
            background: transparent;
            border: none;
            padding: 1rem 2rem;
            font-weight: 600;
            position: relative;
            transition: all 0.3s ease;
        }
        .nav-tabs .nav-link:hover {
            color: var(--text-primary);
            transform: translateY(-2px);
        }
        .nav-tabs .nav-link.active {
            color: var(--accent-purple);
            background: transparent;
        }
        .nav-tabs .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--accent-purple), var(--accent-blue));
            border-radius: 3px 3px 0 0;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from { width: 0; left: 50%; }
            to { width: 100%; left: 0; }
        }

        .clickable-shortcode {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(59, 130, 246, 0.1) 100%);
            border: 1px solid rgba(139, 92, 246, 0.2);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .clickable-shortcode::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }
        .clickable-shortcode:hover::before {
            left: 100%;
        }
        .clickable-shortcode:hover {
            transform: translateY(-4px) scale(1.02);
            border-color: var(--accent-purple);
            box-shadow:
                0 10px 25px rgba(139, 92, 246, 0.3),
                0 0 0 1px rgba(139, 92, 246, 0.1);
        }
        .shortcode-badge {
            background: linear-gradient(135deg, var(--accent-purple), var(--accent-blue));
            color: white;
            font-size: 0.75rem;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .character-count {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: var(--text-primary);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        .character-count.warning {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.2), rgba(245, 158, 11, 0.1));
            border-color: var(--accent-yellow);
            color: #fbbf24;
        }
        .character-count.error {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(239, 68, 68, 0.1));
            border-color: var(--accent-red);
            color: #fca5a5;
        }

        .form-control, .form-control:focus {
            background: rgba(15, 23, 42, 0.7);
            border: 2px solid var(--border-color);
            color: var(--text-primary);
            border-radius: 10px;
            padding: 0.875rem 1rem;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: var(--accent-purple);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
            transform: translateY(-1px);
        }
        .form-control::placeholder {
            color: var(--text-secondary);
        }

        .channel-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            background: rgba(15, 23, 42, 0.6);
            padding: 2rem;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .toggle-item {
            text-align: center;
            padding: 1.5rem;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
            min-width: 150px;
        }
        .toggle-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-4px);
        }
        .toggle-item.active {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.2), rgba(59, 130, 246, 0.1));
            border: 1px solid rgba(139, 92, 246, 0.3);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent-purple), var(--accent-blue));
            border: none;
            padding: 0.875rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }
        .btn-primary:hover::before {
            left: 100%;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(139, 92, 246, 0.4);
        }

        .preview-card {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            overflow: hidden;
            box-shadow:
                0 25px 50px rgba(0, 0, 0, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        .notification-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--accent-red);
            color: white;
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 10px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: var(--accent-purple);
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: var(--bg-primary);
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(var(--accent-purple), var(--accent-blue));
            border-radius: 5px;
        }

        /* Floating Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .floating {
            animation: float 6s ease-in-out infinite;
        }

        /* Typing Animation */
        .typing {
            border-right: 2px solid var(--accent-purple);
            animation: typing 1s steps(40, end), blink-caret 0.75s step-end infinite;
        }

        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: var(--accent-purple) }
        }
    </style>
@endsection

@section('main_content')
<div class="container-fluid py-4">
    <!-- Header with Gradient -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="text-white fw-bold mb-2 display-6">
                        <span class="typing">Edit Template</span>
                    </h1>
                    <div class="text-light opacity-75">
                        <i class="fas fa-code me-2"></i>
                        Customize your notification template with real-time preview
                    </div>
                </div>
                <div class="d-flex gap-3">
                    <button class="btn btn-outline-light btn-lg floating" onclick="previewTemplate()">
                        <i class="fas fa-eye me-2"></i>Live Preview
                    </button>
                    <a href="{{ route('notification.template.index') }}" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-arrow-left me-2"></i>Back
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Main Editor -->
        <div class="col-lg-8">
            <div class="glass-card rounded-3 p-4 mb-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="position-relative me-3">
                        <div class="rounded-circle p-3 bg-gradient-primary">
                            <i class="fas fa-edit fa-2x text-white"></i>
                        </div>
                        <span class="notification-badge">{{ $template->id }}</span>
                    </div>
                    <div>
                        <h3 class="text-white mb-1">{{ $template->display_name }}</h3>
                        <small class="text-light opacity-75">
                            Last updated: {{ $template->updated_at->diffForHumans() }}
                        </small>
                    </div>
                </div>

                <form action="{{ route('notification.template.update', $template->id) }}" method="POST" id="templateForm">
                    @csrf @method('PUT')

                    <!-- Subject Input -->
                    <div class="mb-4">
                        <label class="form-label text-light fw-bold mb-3">
                            <i class="fas fa-heading me-2"></i>Subject
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-gradient-primary border-0">
                                <i class="fas fa-tag"></i>
                            </span>
                            <input type="text" name="subj" class="form-control border-start-0"
                                   value="{{ old('subj', $template->subj ?? $template->subject) }}"
                                   required placeholder="Enter notification subject...">
                            <button type="button" class="btn btn-outline-light" onclick="suggestSubject()">
                                <i class="fas fa-wand-magic-sparkles"></i>
                            </button>
                        </div>
                        <div class="form-text text-light opacity-75 mt-2">
                            <i class="fas fa-info-circle me-1"></i>
                            This will be used as the email subject and push notification title
                        </div>
                    </div>

                    <!-- Tabs -->
                    <div class="mb-4">
                        <ul class="nav nav-tabs nav-fill mb-4" id="notificationTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="email-tab" data-bs-toggle="tab"
                                        data-bs-target="#email-panel" type="button">
                                    <i class="fas fa-envelope me-2"></i>
                                    Email Body
                                    <span class="badge bg-primary ms-2">Rich Text</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="sms-tab" data-bs-toggle="tab"
                                        data-bs-target="#sms-panel" type="button">
                                    <i class="fas fa-sms me-2"></i>
                                    SMS Message
                                    <span class="badge bg-info ms-2">160 chars</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="push-tab" data-bs-toggle="tab"
                                        data-bs-target="#push-panel" type="button">
                                    <i class="fas fa-bell me-2"></i>
                                    Push Notification
                                    <span class="badge bg-warning ms-2">Mobile</span>
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content p-4 rounded-bottom" style="background: rgba(15, 23, 42, 0.5);">
                            <!-- Email Panel -->
                            <div class="tab-pane fade show active" id="email-panel" role="tabpanel">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <label class="form-label text-light fw-bold mb-0">
                                        <i class="fas fa-edit me-2"></i>Rich Text Editor
                                    </label>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="formatText('bold')">
                                            <i class="fas fa-bold"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="formatText('italic')">
                                            <i class="fas fa-italic"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="insertShortcode()">
                                            <i class="fas fa-code"></i>
                                        </button>
                                    </div>
                                </div>
                                <textarea name="email_body" class="form-control summernote d-none">
                                    {{ old('email_body', $template->email_body) }}
                                </textarea>
                                <div id="emailEditor" class="border rounded p-3" style="min-height: 300px; background: rgba(15, 23, 42, 0.8);">
                                    {!! old('email_body', $template->email_body) !!}
                                </div>
                            </div>

                            <!-- SMS Panel -->
                            <div class="tab-pane fade" id="sms-panel" role="tabpanel">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <label class="form-label text-light fw-bold mb-0">
                                        <i class="fas fa-sms me-2"></i>SMS Content
                                    </label>
                                    <div>
                                        <span id="smsCount" class="character-count">0/160</span>
                                    </div>
                                </div>
                                <textarea name="sms_body" class="form-control" rows="5" maxlength="160"
                                          placeholder="Type your SMS message here (maximum 160 characters)..."
                                          oninput="updateSmsCounter(this)">{{ old('sms_body', $template->sms_body) }}</textarea>
                                <div class="form-text text-light opacity-75 mt-2">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    SMS messages are limited to 160 characters
                                </div>
                            </div>

                            <!-- Push Panel -->
                            <div class="tab-pane fade" id="push-panel" role="tabpanel">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-light fw-bold">
                                            <i class="fas fa-heading me-2"></i>Push Title
                                        </label>
                                        <input type="text" name="push_title" class="form-control"
                                               value="{{ old('push_title', $template->push_title) }}"
                                               maxlength="60" placeholder="Push notification title...">
                                        <div class="form-text text-light opacity-75 mt-2">
                                            <i class="fas fa-info-circle me-1"></i>
                                            Maximum 60 characters
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-light fw-bold">
                                            <i class="fas fa-comment me-2"></i>Push Message
                                        </label>
                                        <textarea name="push_body" class="form-control" rows="3" maxlength="240"
                                                  placeholder="Push notification message...">{{ old('push_body', $template->push_body) }}</textarea>
                                        <div class="form-text text-light opacity-75 mt-2">
                                            <i class="fas fa-info-circle me-1"></i>
                                            Maximum 240 characters
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Channels -->
                    <div class="mb-5">
                        <h5 class="text-light fw-bold mb-4">
                            <i class="fas fa-broadcast-tower me-2"></i>Delivery Channels
                        </h5>
                        <div class="channel-toggle">
                            @foreach(['email_status' => ['Email', 'fas fa-envelope', 'primary'],
                                     'sms_status' => ['SMS', 'fas fa-sms', 'info'],
                                     'push_status' => ['Push', 'fas fa-bell', 'warning']] as $field => $data)
                                <div class="toggle-item {{ $template->$field ? 'active' : '' }}"
                                     onclick="toggleChannel('{{ $field }}')">
                                    <div class="mb-3">
                                        <i class="{{ $data[1] }} fa-2x text-{{ $data[2] }}"></i>
                                    </div>
                                    <h6 class="text-light mb-2">{{ $data[0] }}</h6>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="{{ $field }}"
                                               value="1" id="{{ $field }}"
                                               {{ $template->$field ? 'checked' : '' }}>
                                        <label class="form-check-label text-light opacity-75" for="{{ $field }}">
                                            {{ $template->$field ? 'Enabled' : 'Disabled' }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-between align-items-center pt-4 border-top border-light opacity-25">
                        <div>
                            <button type="button" class="btn btn-outline-light" onclick="resetForm()">
                                <i class="fas fa-redo me-2"></i>Reset
                            </button>
                        </div>
                        <div class="d-flex gap-3">
                            <button type="button" class="btn btn-info btn-lg" onclick="previewTemplate()">
                                <i class="fas fa-eye me-2"></i>Preview Template
                            </button>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-2"></i>Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Shortcodes Sidebar -->
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 20px;">
                <!-- Shortcodes Card -->
                <div class="glass-card rounded-3 p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="text-light fw-bold mb-0">
                            <i class="fas fa-code me-2"></i>Dynamic Shortcodes
                        </h5>
                        <span class="shortcode-badge">{{ count($template->shortcodes ?? []) }}</span>
                    </div>

                    <div class="mb-4">
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="fas fa-search text-light"></i>
                            </span>
                            <input type="text" class="form-control border-start-0"
                                   placeholder="Search shortcodes..."
                                   onkeyup="searchShortcodes(this.value)">
                        </div>
                    </div>

                    <div id="shortcodesList">
                        @forelse($template->shortcodes ?? [] as $key => $desc)
                            <div class="clickable-shortcode" data-code="{{ '{' . $key . '}' }}">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <code class="text-info fw-bold fs-6">{{ '{' . $key . '}' }}</code>
                                    <button class="btn btn-sm btn-outline-light"
                                            onclick="copyShortcode('{{ '{' . $key . '}' }}')">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                                <div class="text-light opacity-75 small">{{ $desc }}</div>
                                <div class="mt-2">
                                    <small class="text-light opacity-50">
                                        <i class="fas fa-tag me-1"></i>{{ $key }}
                                    </small>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4">
                                <i class="fas fa-code fa-3x text-light opacity-50 mb-3"></i>
                                <p class="text-light opacity-75 mb-0">No shortcodes available</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-light w-100" onclick="showAllShortcodes()">
                            <i class="fas fa-list me-2"></i>View All Shortcodes
                        </button>
                    </div>
                </div>

                <!-- Template Stats -->
                <div class="glass-card rounded-3 p-4">
                    <h6 class="text-light fw-bold mb-3">
                        <i class="fas fa-chart-line me-2"></i>Template Statistics
                    </h6>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="text-center p-3 rounded" style="background: rgba(59, 130, 246, 0.1);">
                                <div class="text-primary fw-bold fs-4">{{ $template->usage_count ?? 0 }}</div>
                                <small class="text-light opacity-75">Total Uses</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 rounded" style="background: rgba(16, 185, 129, 0.1);">
                                <div class="text-success fw-bold fs-4">{{ $template->success_rate ?? '95' }}%</div>
                                <small class="text-light opacity-75">Success Rate</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div class="modal fade preview-modal" id="previewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="preview-card">
            <div class="modal-header border-bottom border-light opacity-25">
                <h5 class="modal-title text-white">
                    <i class="fas fa-eye me-2"></i>Template Preview
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Preview content will be dynamically loaded here -->
            </div>
            <div class="modal-footer border-top border-light opacity-25">
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="sendTest()">
                    <i class="fas fa-paper-plane me-2"></i>Send Test
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/editor/summernote/summernote.js') }}"></script>
<script>
    // Initialize with a proper single instance
    $(document).ready(function() {
        // Initialize Summernote
        $('.summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onChange: function(contents) {
                    // Sync with our custom editor
                    document.getElementById('emailEditor').innerHTML = contents;
                }
            }
        });

        // Initialize SMS counter
        updateSmsCounter(document.querySelector('[name="sms_body"]'));

        // Set up custom editor
        setupCustomEditor();
    });

    // Custom Editor Functions
    function setupCustomEditor() {
        const editor = document.getElementById('emailEditor');
        if (!editor) return;

        editor.setAttribute('contenteditable', 'true');
        editor.addEventListener('input', function() {
            $('.summernote').summernote('code', this.innerHTML);
        });
    }

    function formatText(command) {
        document.execCommand(command, false, null);
        syncEditors();
    }

    function syncEditors() {
        const customContent = document.getElementById('emailEditor').innerHTML;
        $('.summernote').summernote('code', customContent);
    }

    function updateSmsCounter(textarea) {
        const counter = document.getElementById('smsCount');
        if (!counter) return;

        const length = textarea.value.length;
        counter.textContent = `${length}/160`;

        counter.className = 'character-count';
        if (length > 150) {
            counter.classList.add('warning');
        }
        if (length > 160) {
            counter.classList.add('error');
        }
    }

    function toggleChannel(field) {
        const checkbox = document.querySelector(`[name="${field}"]`);
        const toggleItem = checkbox.closest('.toggle-item');

        checkbox.checked = !checkbox.checked;
        toggleItem.classList.toggle('active');

        // Update label
        const label = toggleItem.querySelector('.form-check-label');
        label.textContent = checkbox.checked ? 'Enabled' : 'Disabled';
    }

    function insertShortcode() {
        const shortcodes = document.querySelectorAll('.clickable-shortcode');
        if (shortcodes.length > 0) {
            const code = shortcodes[0].dataset.code;
            document.execCommand('insertHTML', false,
                `<span class="shortcode-highlight" contenteditable="false">${code}</span>`);
            syncEditors();
        }
    }

    function copyShortcode(code) {
        navigator.clipboard.writeText(code).then(() => {
            showToast('Shortcode copied to clipboard!', 'success');
        });
    }

    function searchShortcodes(query) {
        const shortcodes = document.querySelectorAll('.clickable-shortcode');
        shortcodes.forEach(shortcode => {
            const text = shortcode.textContent.toLowerCase();
            shortcode.style.display = text.includes(query.toLowerCase()) ? 'block' : 'none';
        });
    }

    function suggestSubject() {
        const subjects = [
            'Important Update Regarding Your Account',
            'New Notification from Our Platform',
            'Action Required: Please Review',
            'Exciting News Just for You!',
            'Reminder: Your Subscription Renewal'
        ];
        const randomSubject = subjects[Math.floor(Math.random() * subjects.length)];
        document.querySelector('[name="subj"]').value = randomSubject;
        showToast('Subject suggestion applied!', 'info');
    }

    function resetForm() {
        if (confirm('Are you sure you want to reset all changes?')) {
            document.getElementById('templateForm').reset();
            showToast('Form reset successfully', 'warning');
        }
    }

    function previewTemplate() {
        // Get all form data
        const formData = new FormData(document.getElementById('templateForm'));
        const previewData = {};

        for (let [key, value] of formData.entries()) {
            previewData[key] = value;
        }

        // Get summernote content
        previewData.email_body = $('.summernote').summernote('code');

        // Show loading
        const modalBody = document.querySelector('#previewModal .modal-body');
        modalBody.innerHTML = `
            <div class="text-center py-5">
                <div class="loading-spinner mx-auto mb-3"></div>
                <div class="text-light">Generating preview...</div>
            </div>
        `;

        // Show modal
        const previewModal = new bootstrap.Modal(document.getElementById('previewModal'));
        previewModal.show();

        // Simulate loading
        setTimeout(() => {
            renderPreview(previewData);
        }, 500);
    }

    function renderPreview(data) {
        const modalBody = document.querySelector('#previewModal .modal-body');
        const shortcodes = Array.from(document.querySelectorAll('.clickable-shortcode'))
            .map(el => el.dataset.code);

        // Highlight shortcodes in content
        function highlightShortcodes(text) {
            shortcodes.forEach(code => {
                const regex = new RegExp(code.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'), 'g');
                text = text.replace(regex, `<span class="badge bg-primary">${code}</span>`);
            });
            return text;
        }

        modalBody.innerHTML = `
            <div class="row g-4">
                <div class="col-12">
                    <div class="preview-section">
                        <h6 class="text-light mb-3"><i class="fas fa-tag me-2"></i>Subject</h6>
                        <div class="bg-dark rounded p-3 text-light">
                            ${data.subj || '<em class="text-muted">No subject</em>'}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="preview-section">
                        <h6 class="text-light mb-3"><i class="fas fa-envelope me-2"></i>Email Preview</h6>
                        <div class="bg-dark rounded p-3" style="min-height: 200px;">
                            ${data.email_body ? highlightShortcodes(data.email_body) :
                              '<div class="text-center text-muted py-4">No email content</div>'}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="preview-section">
                        <h6 class="text-light mb-3"><i class="fas fa-sms me-2"></i>SMS Preview</h6>
                        <div class="bg-dark rounded p-3 text-light font-monospace">
                            ${data.sms_body || '<em class="text-muted">No SMS content</em>'}
                        </div>
                        <div class="mt-2 text-end">
                            <small class="text-muted">Characters: ${data.sms_body?.length || 0}/160</small>
                        </div>
                    </div>

                    <div class="preview-section">
                        <h6 class="text-light mb-3"><i class="fas fa-bell me-2"></i>Push Preview</h6>
                        <div class="bg-dark rounded p-3">
                            <div class="fw-bold text-light mb-2">${data.push_title || 'No title'}</div>
                            <div class="text-light opacity-75">${data.push_body || 'No message'}</div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="preview-section">
                        <h6 class="text-light mb-3"><i class="fas fa-broadcast-tower me-2"></i>Delivery Status</h6>
                        <div class="row text-center">
                            <div class="col-md-4">
                                <div class="p-3 rounded bg-dark">
                                    <i class="fas fa-envelope fa-2x mb-2 ${data.email_status ? 'text-primary' : 'text-muted'}"></i>
                                    <div class="text-light">Email</div>
                                    <span class="badge ${data.email_status ? 'bg-primary' : 'bg-secondary'}">
                                        ${data.email_status ? 'Active' : 'Inactive'}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 rounded bg-dark">
                                    <i class="fas fa-sms fa-2x mb-2 ${data.sms_status ? 'text-info' : 'text-muted'}"></i>
                                    <div class="text-light">SMS</div>
                                    <span class="badge ${data.sms_status ? 'bg-info' : 'bg-secondary'}">
                                        ${data.sms_status ? 'Active' : 'Inactive'}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 rounded bg-dark">
                                    <i class="fas fa-bell fa-2x mb-2 ${data.push_status ? 'text-warning' : 'text-muted'}"></i>
                                    <div class="text-light">Push</div>
                                    <span class="badge ${data.push_status ? 'bg-warning' : 'bg-secondary'}">
                                        ${data.push_status ? 'Active' : 'Inactive'}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    function sendTest() {
        showToast('Test notification sent!', 'success');
    }

    function showToast(message, type = 'info') {
        // Create toast element
        const toast = document.createElement('div');
        toast.className = `toast align-items-center text-white bg-${type} border-0`;
        toast.setAttribute('role', 'alert');
        toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'} me-2"></i>
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        `;

        // Add to container
        const container = document.getElementById('toastContainer') || createToastContainer();
        container.appendChild(toast);

        // Initialize and show
        const bsToast = new bootstrap.Toast(toast);
        bsToast.show();

        // Remove after hide
        toast.addEventListener('hidden.bs.toast', () => {
            toast.remove();
        });
    }

    function createToastContainer() {
        const container = document.createElement('div');
        container.id = 'toastContainer';
        container.className = 'toast-container position-fixed top-0 end-0 p-3';
        document.body.appendChild(container);
        return container;
    }

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + P for preview
        if ((e.ctrlKey || e.metaKey) && e.key === 'p') {
            e.preventDefault();
            previewTemplate();
        }
        // Ctrl/Cmd + S to save
        if ((e.ctrlKey || e.metaKey) && e.key === 's') {
            e.preventDefault();
            document.querySelector('button[type="submit"]').click();
        }
    });
</script>
@endsection
