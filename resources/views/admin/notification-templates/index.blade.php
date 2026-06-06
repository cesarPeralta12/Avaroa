@extends('layout.master')
@section('title', 'Notification Templates')

@section('css')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        --hover-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }



    .template-card {
        background: white;
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: var(--card-shadow);
        transition: var(--transition);
        overflow: hidden;
    }

    .template-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--hover-shadow);
        border-color: rgba(102, 126, 234, 0.2);
    }

    .template-header {
        background: var(--primary-gradient);
        color: white;
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .template-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
        animation: shimmer 2s infinite;
    }

    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    .status-toggle {
        position: relative;
        display: inline-block;
        margin: 0 8px;
    }

    .status-toggle input {
        display: none;
    }

    .toggle-slider {
        width: 50px;
        height: 26px;
        background: #e2e8f0;
        border-radius: 34px;
        position: relative;
        cursor: pointer;
        transition: var(--transition);
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
    }

    .toggle-slider::before {
        content: '';
        position: absolute;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        left: 2px;
        top: 2px;
        background: white;
        transition: var(--transition);
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    .status-toggle input:checked + .toggle-slider {
        background: #10b981;
    }

    .status-toggle input:checked + .toggle-slider::before {
        transform: translateX(24px);
    }

    .status-toggle input:disabled + .toggle-slider {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .channel-badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
        margin: 2px;
        transition: var(--transition);
    }

    .channel-badge.active {
        background: rgba(16, 185, 129, 0.1);
        color: #10b981;
        border: 1px solid rgba(16, 185, 129, 0.2);
    }

    .channel-badge.inactive {
        background: rgba(226, 232, 240, 0.5);
        color: #64748b;
        border: 1px solid #e2e8f0;
    }

    .channel-badge .indicator {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        margin-right: 6px;
    }

    .channel-badge.active .indicator {
        background: #10b981;
        box-shadow: 0 0 8px #10b981;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }

    .edit-btn {
        background: var(--primary-gradient);
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 10px;
        font-weight: 500;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }

    .edit-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s ease;
    }

    .edit-btn:hover::before {
        left: 100%;
    }

    .edit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    .template-tag {
        display: inline-block;
        padding: 4px 12px;
        background: rgba(102, 126, 234, 0.1);
        color: #667eea;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 500;
        margin-left: 8px;
        border: 1px solid rgba(102, 126, 234, 0.2);
    }

    .search-box {
        background: white;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 12px 20px;
        transition: var(--transition);
    }

    .search-box:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
    }

    .stats-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: var(--card-shadow);
        transition: var(--transition);
    }

    .stats-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--hover-shadow);
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #64748b;
    }

    .empty-state-icon {
        font-size: 4rem;
        color: #e2e8f0;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
</style>
@endsection

@section('main_content')
<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Notification Templates</h1>
                    <p class="text-muted mb-0">Manage and customize your notification templates across all channels</p>
                </div>
                <div class="stats-card" style="min-width: 200px;">
                    <div class="text-center">
                        <div class="h3 fw-bold text-primary mb-1">{{ count($templates) }}</div>
                        <div class="text-sm text-muted">Total Templates</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="row mb-4">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <i class="fas fa-check-circle me-2 fa-lg"></i>
                    <div class="flex-grow-1">{{ session('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <!-- Search and Filter -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0">
                    <i class="fas fa-search text-muted"></i>
                </span>
                <input type="text" class="form-control search-box border-start-0"
                       placeholder="Search templates by name or subject..."
                       id="templateSearch">
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-flex gap-2">
                <button class="btn btn-outline-primary flex-fill" onclick="filterTemplates('all')">
                    <i class="fas fa-layer-group me-2"></i>All
                </button>
                <button class="btn btn-outline-success flex-fill" onclick="filterTemplates('active')">
                    <i class="fas fa-toggle-on me-2"></i>Active
                </button>
                <button class="btn btn-outline-secondary flex-fill" onclick="filterTemplates('default')">
                    <i class="fas fa-star me-2"></i>Default
                </button>
            </div>
        </div>
    </div>

    <!-- Templates Grid -->
    <div class="row" id="templatesContainer">
        @foreach($templates as $tpl)
        <div class="col-lg-6 col-xl-4 mb-4" data-template-id="{{ $tpl->id }}">
            <div class="template-card h-100">
                <!-- Template Header -->
                <div class="template-header">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="fw-bold mb-1">{{ $tpl->display_name }}</h5>
                            @if($tpl->act === 'DEFAULT')
                                <span class="template-tag">
                                    <i class="fas fa-star me-1"></i>Default Template
                                </span>
                            @endif
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light rounded-circle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('notification.template.edit', $tpl->id) }}">
                                        <i class="fas fa-edit me-2"></i>Edit Template
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" onclick="duplicateTemplate({{ $tpl->id }})">
                                        <i class="fas fa-copy me-2"></i>Duplicate
                                    </a>
                                </li>
                                @if($tpl->act !== 'DEFAULT')
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item text-danger" href="#"
                                       onclick="deleteTemplate({{ $tpl->id }}, '{{ $tpl->display_name }}')">
                                        <i class="fas fa-trash me-2"></i>Delete
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Template Body -->
                <div class="p-4">
                    <!-- Subject Preview -->
                    <div class="mb-4">
                        <label class="small text-muted mb-2 d-block">Subject</label>
                        <p class="text-gray-700 mb-0">
                            {{ Str::limit($tpl->subj, 100) }}
                        </p>
                    </div>

                    <!-- Channel Status -->
                    <div class="mb-4">
                        <label class="small text-muted mb-2 d-block">Delivery Channels</label>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="channel-badge {{ $tpl->email_status ? 'active' : 'inactive' }}"
                                  onclick="toggleChannelStatus({{ $tpl->id }}, 'email')">
                                <span class="indicator"></span>
                                <i class="fas fa-envelope me-1"></i>Email
                            </span>
                            <span class="channel-badge {{ $tpl->sms_status ? 'active' : 'inactive' }}"
                                  onclick="toggleChannelStatus({{ $tpl->id }}, 'sms')">
                                <span class="indicator"></span>
                                <i class="fas fa-sms me-1"></i>SMS
                            </span>
                            <span class="channel-badge {{ $tpl->push_status ? 'active' : 'inactive' }}"
                                  onclick="toggleChannelStatus({{ $tpl->id }}, 'push')">
                                <span class="indicator"></span>
                                <i class="fas fa-bell me-1"></i>Push
                            </span>
                        </div>
                    </div>

                    <!-- Template Info -->
                    <div class="d-flex justify-content-between align-items-center text-sm text-muted border-top pt-3">
                        <div>
                            <i class="fas fa-calendar me-1"></i>
                            {{ $tpl->updated_at->format('M d, Y') }}
                        </div>
                        <div class="d-flex gap-3">
                            <a href="{{ route('notification.template.edit', $tpl->id) }}"
                               class="edit-btn btn-sm">
                                <i class="fas fa-pen me-1"></i>Edit Template
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if(count($templates) === 0)
    <div class="row">
        <div class="col-12">
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fas fa-inbox"></i>
                </div>
                <h4 class="text-gray-600 mb-3">No Templates Found</h4>
                <p class="text-muted mb-4">Start by creating your first notification template</p>
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Create Template
                </a>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Toast Container -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="statusToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-check-circle me-2"></i>
                <span id="toastMessage">Status updated successfully</span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Search functionality
    const searchInput = document.getElementById('templateSearch');
    const templateCards = document.querySelectorAll('[data-template-id]');

    searchInput.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();

        templateCards.forEach(card => {
            const templateName = card.querySelector('h5').textContent.toLowerCase();
            const templateSubject = card.querySelector('.text-gray-700').textContent.toLowerCase();

            if (templateName.includes(searchTerm) || templateSubject.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });

    // Filter templates
    window.filterTemplates = function(filter) {
        templateCards.forEach(card => {
            const isDefault = card.querySelector('.template-tag') !== null;
            const hasActiveChannels = card.querySelectorAll('.channel-badge.active').length > 0;

            switch(filter) {
                case 'active':
                    card.style.display = hasActiveChannels ? 'block' : 'none';
                    break;
                case 'default':
                    card.style.display = isDefault ? 'block' : 'none';
                    break;
                default:
                    card.style.display = 'block';
            }
        });
    };
});

// Toggle channel status
window.toggleChannelStatus = function(templateId, channelType) {
    const channelBadge = event.currentTarget;
    const isActive = channelBadge.classList.contains('active');
    const newStatus = !isActive;

    // Show loading state
    const indicator = channelBadge.querySelector('.indicator');
    indicator.style.animation = 'none';
    indicator.style.background = '#fbbf24';

    // Send API request
    fetch("{{ route('notification.template.toggle') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            id: templateId,
            type: channelType,
            status: newStatus ? 1 : 0
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Update UI
            channelBadge.classList.toggle('active');
            channelBadge.classList.toggle('inactive');

            // Show success toast
            showToast(`${channelType.toUpperCase()} channel ${newStatus ? 'activated' : 'deactivated'} successfully`);
        } else {
            throw new Error(data.message || 'Failed to update status');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // Revert UI changes
        channelBadge.classList.toggle('active');
        channelBadge.classList.toggle('inactive');

        // Show error toast
        showToast('Failed to update channel status', 'error');
    })
    .finally(() => {
        // Restore indicator animation
        indicator.style.animation = 'pulse 2s infinite';
    });
};

// Show toast notification
function showToast(message, type = 'success') {
    const toastEl = document.getElementById('statusToast');
    const toastMessage = document.getElementById('toastMessage');
    const toast = new bootstrap.Toast(toastEl);

    // Update toast content
    toastMessage.textContent = message;

    // Update toast color based on type
    if (type === 'error') {
        toastEl.classList.remove('bg-success');
        toastEl.classList.add('bg-danger');
    } else {
        toastEl.classList.remove('bg-danger');
        toastEl.classList.add('bg-success');
    }

    toast.show();
}

// Duplicate template
function duplicateTemplate(id) {
    if (confirm('Duplicate this template?')) {
        // Add loading state
        const btn = event.target.closest('.dropdown-item');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Duplicating...';
        btn.disabled = true;

        // Simulate API call
        setTimeout(() => {
            showToast('Template duplicated successfully');
            btn.innerHTML = originalText;
            btn.disabled = false;
        }, 1000);
    }
}

// Delete template
function deleteTemplate(id, name) {
    if (confirm(`Are you sure you want to delete "${name}"? This action cannot be undone.`)) {
        // Add loading state
        const btn = event.target.closest('.dropdown-item');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Deleting...';
        btn.disabled = true;

        // Simulate API call
        setTimeout(() => {
            showToast('Template deleted successfully');
            // Remove template card from UI
            document.querySelector(`[data-template-id="${id}"]`).remove();
        }, 1000);
    }
}

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + F to focus search
    if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
        e.preventDefault();
        document.getElementById('templateSearch').focus();
    }

    // Escape to clear search
    if (e.key === 'Escape') {
        document.getElementById('templateSearch').value = '';
        document.querySelectorAll('[data-template-id]').forEach(card => {
            card.style.display = 'block';
        });
    }
});
</script>
@endsection
