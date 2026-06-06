@extends('layout.master')

@section('title', 'Add New Vehicle')

@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-truck"></i> Add New Vehicle</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('vehicles.store') }}" method="POST" class="ajax-form">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Assigned Driver</label>
                            <select name="driver_id" class="form-select" required>
                                <option value="">— Select driver —</option>
                                @foreach($drivers as $d)
                                <option value="{{ $d->id }}" {{ old('driver_id') == $d->id ? 'selected' : '' }}>
                                    {{ $d->user?->name ?? '—' }} ({{ $d->license_number ?? 'no license' }})
                                </option>
                                @endforeach
                            </select>
                            @error('driver_id')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Plate Number</label>
                            <input type="text" name="plate_number" class="form-control text-uppercase" value="{{ old('plate_number') }}" required>
                            @error('plate_number')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label required">Vehicle Type</label>
                            <select name="type" class="form-select" required>
                                <option value="car"        {{ old('type')=='car'?'selected':'' }}>Car</option>
                                <option value="van"        {{ old('type')=='van'?'selected':'' }}>Van</option>
                                <option value="truck"      {{ old('type')=='truck'?'selected':'' }}>Truck</option>
                                <option value="motorcycle" {{ old('type')=='motorcycle'?'selected':'' }}>Motorcycle</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label required">Weight Capacity (kg)</label>
                            <input type="number" name="capacity_weight" step="10" min="50" class="form-control" value="{{ old('capacity_weight', 500) }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Volume Capacity (m³)</label>
                            <input type="number" name="capacity_volume" step="0.1" min="0" class="form-control" value="{{ old('capacity_volume') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Expiration Date</label>
                        <input type="date" name="expiration_date" class="form-control" value="{{ old('expiration_date') }}">
                    </div>

                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save"></i> Save Vehicle
                    </button>
                    <a href="{{ route('vehicles.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
