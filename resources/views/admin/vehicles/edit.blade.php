@extends('layout.master')

@section('title', 'Edit Vehicle')

@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0"><i class="fas fa-truck-loading"></i> Edit Vehicle</h4>
                <a href="{{ route('vehicles.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>

            <div class="card-body">
                <form action="{{ route('vehicles.update', $vehicle) }}" method="POST" class="ajax-form">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Driver</label>
                            <select name="driver_id" class="form-select" required>
                                @foreach($drivers as $d)
                                    <option value="{{ $d->id }}" {{ old('driver_id', $vehicle->driver_id) == $d->id ? 'selected' : '' }}>
                                        {{ $d->user?->name ?? '—' }} ({{ $d->license_number ?? 'no license' }})
                                    </option>
                                @endforeach
                            </select>
                            @error('driver_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Plate Number</label>
                            <input type="text" name="plate_number" class="form-control text-uppercase"
                                   value="{{ old('plate_number', $vehicle->plate_number) }}" required>
                            @error('plate_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label required">Type</label>
                            <select name="type" class="form-select" required>
                                <option value="car"        {{ old('type', $vehicle->type) == 'car'        ? 'selected' : '' }}>Car</option>
                                <option value="van"        {{ old('type', $vehicle->type) == 'van'        ? 'selected' : '' }}>Van</option>
                                <option value="truck"      {{ old('type', $vehicle->type) == 'truck'      ? 'selected' : '' }}>Truck</option>
                                <option value="motorcycle" {{ old('type', $vehicle->type) == 'motorcycle' ? 'selected' : '' }}>Motorcycle</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label required">Weight Capacity (kg)</label>
                            <input type="number" name="capacity_weight" step="10" min="50" class="form-control"
                                   value="{{ old('capacity_weight', $vehicle->capacity_weight) }}" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Volume Capacity (m³)</label>
                            <input type="number" name="capacity_volume" step="0.1" min="0" class="form-control"
                                   value="{{ old('capacity_volume', $vehicle->capacity_volume) }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Expiration Date</label>
                        <input type="date" name="expiration_date" class="form-control"
                              value="{{ old('expiration_date', $vehicle->expiration_date ? \Carbon\Carbon::parse($vehicle->expiration_date)->format('Y-m-d') : '') }}"
>
                    </div>

                    <button type="submit" class="btn btn-primary px-4 me-2">
                        <i class="fas fa-save"></i> Update Vehicle
                    </button>
                    <a href="{{ route('vehicles.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
