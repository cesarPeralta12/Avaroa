@extends('layout.master')

@section('title', 'Create Pricing Rule')

@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-dollar-sign"></i> Create Pricing Rule</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('pricing-rules.store') }}" method="POST" class="ajax-form">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Rule Type</label>
                            <input type="text" name="type" class="form-control" placeholder="per_km, night_surcharge, zone_fee, ..." value="{{ old('type') }}" required>
                            @error('type')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Value</label>
                            <input type="number" name="value" step="0.01" class="form-control" value="{{ old('value') }}" required>
                            @error('value')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Conditions (JSON)</label>
                        <textarea name="conditions" class="form-control font-monospace" rows="6" placeholder='{"time_range": "20:00-06:00", "zones": [1,3], "vehicle_types": ["van","truck"]}'>{{ old('conditions') }}</textarea>
                        <small class="form-text text-muted">Must be valid JSON. Leave empty if no conditions.</small>
                        @error('conditions')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-check mb-4">
                        <input name="active" type="checkbox" class="form-check-input" id="active" {{ old('active',1)?'checked':'' }}>
                        <label class="form-check-label" for="active">Active</label>
                    </div>

                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save"></i> Create Rule
                    </button>
                    <a href="{{ route('pricing-rules.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
