@extends('layout.master')

@section('title', 'Login History')

@section('css')
<style>
    .status-success { background: #10b981; color: #fff; }
    .status-failed { background: #ef4444; color: #fff; }
    .login-card {
        border-left: 4px solid;
        transition: all 0.3s ease;
    }
    .login-card:hover {
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .login-card.success { border-left-color: #10b981; }
    .login-card.failed { border-left-color: #ef4444; }
    .device-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background: #f3f4f6;
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
                        <h6>Today's Logins</h6>
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
                        <h6>Unique Users Today</h6>
                        <h3>{{ $stats['unique_users'] }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h6>Countries</h6>
                        <h3>{{ $stats['unique_countries'] }}</h3>
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
                               placeholder="Search user or IP" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="country" class="form-select">
                            <option value="">All Countries</option>
                            @foreach($countries as $country)
                                <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>
                                    {{ $country }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="date_from" class="form-control"
                               placeholder="From" value="{{ request('date_from') }}">
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="date_to" class="form-control"
                               placeholder="To" value="{{ request('date_to') }}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Filter
                        </button>
                        <a href="{{ route('login.history') }}" class="btn btn-secondary">
                            <i class="fas fa-redo"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        {{-- Login List --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Login History</h4>
                <a href="{{ route('login.history.export') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-download"></i> Export
                </a>
            </div>
            <div class="card-body">
                @forelse($logins as $login)
                <div class="login-card success card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <div class="d-flex align-items-center">
                                    <div class="device-icon me-3">
                                        <i class="fas fa-desktop text-primary fa-lg"></i>
                                    </div>
                                    <div>
                                        <strong>{{ $login->user?->name ?? 'Unknown User' }}</strong>
                                        <br>
                                        <small class="text-muted">ID: {{ $login->user_id }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-1">
                                    <i class="fas fa-map-marker-alt text-danger"></i>
                                    <strong>{{ $login->city ?? 'Unknown' }}, {{ $login->country ?? 'Unknown' }}</strong>
                                </div>
                                <small class="text-muted">IP: {{ $login->user_ip }}</small>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-1">
                                    <i class="fas fa-browser text-info"></i> {{ $login->browser ?? 'Unknown Browser' }}
                                </div>
                                <small class="text-muted"><i class="fas fa-laptop"></i> {{ $login->os ?? 'Unknown OS' }}</small>
                            </div>
                            <div class="col-md-3 text-end">
                                <div class="mb-2">
                                    <span class="badge bg-light text-dark">
                                        <i class="fas fa-clock"></i> {{ $login->created_at->format('d M Y H:i') }}
                                    </span>
                                </div>
                                <button class="btn btn-sm btn-info view-details"
                                        data-ip="{{ $login->user_ip }}"
                                        data-lat="{{ $login->latitude }}"
                                        data-lng="{{ $login->longitude }}"
                                        data-user="{{ $login->user?->name }}"
                                        data-time="{{ $login->created_at }}">
                                    <i class="fas fa-eye"></i> Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-history fa-3x mb-3"></i>
                    <h5>No login records found</h5>
                </div>
                @endforelse

                {{ $logins->links() }}
            </div>
        </div>
    </div>
</div>

{{-- Details Modal --}}
<div class="modal fade" id="detailsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Login Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless">
                    <tr>
                        <td><strong>User:</strong></td>
                        <td id="detail-user"></td>
                    </tr>
                    <tr>
                        <td><strong>IP Address:</strong></td>
                        <td id="detail-ip"></td>
                    </tr>
                    <tr>
                        <td><strong>Time:</strong></td>
                        <td id="detail-time"></td>
                    </tr>
                    <tr>
                        <td><strong>Coordinates:</strong></td>
                        <td id="detail-coords"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger block-ip">
                    <i class="fas fa-ban"></i> Block IP
                </button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.view-details').click(function() {
        $('#detail-user').text($(this).data('user'));
        $('#detail-ip').text($(this).data('ip'));
        $('#detail-time').text($(this).data('time'));
        $('#detail-coords').text($(this).data('lat') + ', ' + $(this).data('lng'));
        $('#detailsModal').modal('show');
    });
});
</script>
@endsection
