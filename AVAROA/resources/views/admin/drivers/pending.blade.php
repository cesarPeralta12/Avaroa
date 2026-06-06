
@extends('layout.master')

@section('title', 'Pending Driver Verifications')

@section('main_content')
<div class="page-content">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold  mb-1">
                    <i class="fas fa-user-check text-warning me-2"></i>Pending Verifications
                </h4>
                <p class="text-muted mb-0">Review and approve driver applications</p>
            </div>
            <a href="{{ route('drivers.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i>Back to All Drivers
            </a>
        </div>

        {{-- Filter --}}
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form method="GET" class="row g-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text "><i class="fas fa-search"></i></span>
                            <input type="text" name="search" class="form-control" placeholder="Search by name or email..."
                                   value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Pending Drivers Grid --}}
        <div class="row">
            @forelse($drivers as $driver)
                @php
                    $docs = $driver->documents;
                    $totalDocs = $docs->count();
                    $verifiedDocs = $docs->where('status', 'verified')->count();
                    $rejectedDocs = $docs->where('status', 'rejected')->count();
                    $pendingDocs = $docs->where('status', 'pending')->count();
                    $progress = $totalDocs > 0 ? ($verifiedDocs / $totalDocs) * 100 : 0;
                @endphp

                <div class="col-xl-4 col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        {{-- Header --}}
                        <div class="card-header bg-white border-bottom-0 pt-4">
                            <div class="d-flex align-items-center">
                                <div class="position-relative">
                                    @if($driver->user?->profile_photo)
                                        <img src="{{ \App\Services\FileUploadService::getUrl($driver->user->profile_photo) }}"
                                             class="rounded-circle" width="64" height="64" alt="">
                                    @else
                                        <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center text-primary"
                                             style="width: 64px; height: 64px;">
                                            <i class="fas fa-user fa-2x"></i>
                                        </div>
                                    @endif
                                    <span class="position-absolute bottom-0 end-0 translate-middle p-2 bg-{{ $driver->status == 'under_review' ? 'primary' : 'warning' }} border border-white rounded-circle">
                                        <span class="visually-hidden">Status</span>
                                    </span>
                                </div>
                                <div class="ms-3 flex-grow-1">
                                    <h5 class="mb-1 fw-bold">{{ $driver->user?->name }}</h5>
                                    <p class="mb-0 text-muted small">{{ $driver->user?->email }}</p>
                                    <p class="mb-0 text-muted small">
                                        <i class="fab fa-whatsapp text-success me-1"></i>{{ $driver->user?->whatsapp_number }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Body --}}
                        <div class="card-body">
                            {{-- Progress --}}
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <small class="text-muted">Document Verification</small>
                                    <small class="fw-bold">{{ $verifiedDocs }}/{{ $totalDocs }}</small>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-{{ $progress == 100 ? 'success' : ($progress > 50 ? 'warning' : 'danger') }}"
                                         role="progressbar" style="width: {{ $progress }}%"></div>
                                </div>
                            </div>

                            {{-- Document Status --}}
                            <div class="d-flex gap-2 mb-3 flex-wrap">
                                @if($verifiedDocs > 0)
                                    <span class="badge bg-success">
                                        <i class="fas fa-check me-1"></i>{{ $verifiedDocs }} Verified
                                    </span>
                                @endif
                                @if($pendingDocs > 0)
                                    <span class="badge bg-warning text-dark">
                                        <i class="fas fa-clock me-1"></i>{{ $pendingDocs }} Pending
                                    </span>
                                @endif
                                @if($rejectedDocs > 0)
                                    <span class="badge bg-danger">
                                        <i class="fas fa-times me-1"></i>{{ $rejectedDocs }} Rejected
                                    </span>
                                @endif
                            </div>

                            {{-- Vehicle Info --}}
                            @if($driver->vehicle)
                                <div class="bg-light rounded p-2 mb-3">
                                    <small class="text-muted d-block mb-1">Vehicle Information</small>
                                    <div class="d-flex justify-content-between">
                                        <span><i class="fas fa-car me-1 text-primary"></i>{{ ucfirst($driver->vehicle->type) }}</span>
                                        <span class="fw-bold">{{ $driver->vehicle->plate_number }}</span>
                                    </div>
                                </div>
                            @endif

                            {{-- Registration Date --}}
                            <p class="text-muted small mb-0">
                                <i class="fas fa-calendar-alt me-1"></i>
                                Applied: {{ $driver->created_at->diffForHumans() }}
                            </p>
                        </div>

                        {{-- Footer --}}
                        <div class="card-footer bg-white border-top-0">
                            <div class="d-grid gap-2">
                                <a href="{{ route('drivers.show', $driver) }}" class="btn btn-primary">
                                    <i class="fas fa-search me-1"></i>Review Documents
                                </a>
                                @if($progress == 100 && $rejectedDocs == 0)
                                    <button class="btn btn-success btn-verify-driver" data-driver-id="{{ $driver->id }}">
                                        <i class="fas fa-check-circle me-1"></i>Approve Driver
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body text-center py-5">
                            <i class="fas fa-check-double fa-4x text-success mb-3"></i>
                            <h5>No Pending Verifications</h5>
                            <p class="text-muted">All driver applications have been processed.</p>
                            <a href="{{ route('drivers.index') }}" class="btn btn-primary">
                                View All Drivers
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Showing count --}}
        <div class="text-muted small mt-4 text-center">
            Showing {{ $drivers->count() }} pending applications
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function(){
    // Quick verify from pending list
    $('.btn-verify-driver').on('click', function(){
        const driverId = $(this).data('driver-id');
        const btn = $(this);

        Swal.fire({
            title: 'Approve this driver?',
            text: "The driver will be notified and can start receiving orders.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            confirmButtonText: 'Yes, approve',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if(result.isConfirmed){
                btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-1"></i>Processing...');

                $.post(`{{ url('admin/drivers') }}/${driverId}/verify`, {
                    _token: "{{ csrf_token() }}"
                }).done(function(r){
                    if(r.success){
                        Swal.fire('Approved!', r.message, 'success')
                            .then(() => location.reload());
                    }else{
                        Swal.fire('Error', r.message, 'error');
                        btn.prop('disabled', false).html('<i class="fas fa-check-circle me-1"></i>Approve Driver');
                    }
                }).fail(function(){
                    Swal.fire('Error', 'Server error occurred', 'error');
                    btn.prop('disabled', false).html('<i class="fas fa-check-circle me-1"></i>Approve Driver');
                });
            }
        });
    });
});
</script>
@endpush
