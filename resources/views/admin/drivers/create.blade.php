@extends('layout.master')

@section('title', 'Add New Driver')

@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-user-plus"></i> Add New Driver</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('drivers.store') }}" method="POST" class="ajax-form">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">User</label>
                            <select name="user_id" class="form-select" required>
                                <option value="">— Select driver account —</option>
                                @foreach($users as $u)
                                <option value="{{ $u->id }}" {{ old('user_id') == $u->id ? 'selected' : '' }}>
                                    {{ $u->name }} (#{{ $u->id }})
                                </option>
                                @endforeach
                            </select>
                            @error('user_id')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label required">License Number</label>
                            <input type="text" name="license_number" class="form-control" value="{{ old('license_number') }}" required>
                            @error('license_number')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="available" {{ old('status','available')=='available'?'selected':'' }}>Available</option>
                                <option value="busy" {{ old('status')=='busy'?'selected':'' }}>Busy</option>
                                <option value="offline" {{ old('status')=='offline'?'selected':'' }}>Offline</option>
                                <option value="pending" {{ old('status')=='pending'?'selected':'' }}>Pending</option>
                                <option value="under_review" {{ old('status')=='under_review'?'selected':'' }}>Under Review</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Online</label>
                            <div class="form-check form-switch mt-2">
                                <input name="is_online" type="checkbox" class="form-check-input" {{ old('is_online')?'checked':'' }}>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Score (0–5)</label>
                            <input type="number" name="score" step="0.1" min="0" max="5" class="form-control" value="{{ old('score', 5.0) }}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save"></i> Save Driver
                    </button>
                    <a href="{{ route('drivers.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
