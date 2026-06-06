@extends('layout.master')

@section('title', 'Edit Driver')

@section('main_content')
<div class="page-content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0"><i class="fas fa-user-edit"></i> Edit Driver</h4>
                <a href="{{ route('drivers.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Back to list
                </a>
            </div>

            <div class="card-body">
                <form action="{{ route('drivers.update', $driver) }}" method="POST" class="ajax-form">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Driver Name</label>
                            <input type="text" class="form-control" value="{{ $driver->user?->name ?? '—' }}" disabled>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label required">License Number</label>
                            <input type="text" name="license_number" class="form-control @error('license_number') is-invalid @enderror"
                                   value="{{ old('license_number', $driver->license_number) }}" required>
                            @error('license_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="available" {{ old('status', $driver->status) == 'available' ? 'selected' : '' }}>Available</option>
                                <option value="busy"     {{ old('status', $driver->status) == 'busy'     ? 'selected' : '' }}>Busy</option>
                                <option value="offline"  {{ old('status', $driver->status) == 'offline'  ? 'selected' : '' }}>Offline</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Online Status</label>
                            <div class="form-check form-switch mt-2">
                                <input name="is_online" type="checkbox" class="form-check-input" {{ old('is_online', $driver->is_online) ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Score (0–5)</label>
                            <input type="number" name="score" step="0.01" min="0" max="5" class="form-control"
                                   value="{{ old('score', $driver->score ?? 5.00) }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Acceptance Rate (%)</label>
                            <input type="number" name="acceptance_rate" step="0.1" min="0" max="100" class="form-control"
                                   value="{{ old('acceptance_rate', $driver->acceptance_rate ?? 100) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Penalties</label>
                            <input type="number" name="penalties" min="0" class="form-control"
                                   value="{{ old('penalties', $driver->penalties ?? 0) }}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary px-4 me-2">
                        <i class="fas fa-save"></i> Update Driver
                    </button>
                    <a href="{{ route('drivers.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
