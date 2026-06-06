@extends('layout.master')

@section('title', 'Edit Pricing Rule')

@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0"><i class="fas fa-edit"></i> Edit Pricing Rule #{{ $pricingRule->id }}</h4>
                <a href="{{ route('pricing-rules.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>

            <div class="card-body">
                <form action="{{ route('pricing-rules.update', $pricingRule) }}" method="POST" class="ajax-form">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Rule Type</label>
                            <input type="text" name="type" class="form-control"
                                   value="{{ old('type', $pricingRule->type) }}" required>
                            @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Value</label>
                            <input type="number" name="value" step="0.01" class="form-control"
                                   value="{{ old('value', $pricingRule->value) }}" required>
                            @error('value')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Conditions (JSON)</label>
                        <textarea name="conditions" class="form-control font-monospace" rows="7">
{{ old('conditions', $pricingRule->conditions ?? '{}') }}
                        </textarea>
                        <small class="form-text text-muted">Valid JSON expected. Example: {"time_range": "20:00-06:00", "zones": [1,2]}</small>
                        @error('conditions')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-check mb-4">
                        <input name="active" type="checkbox" class="form-check-input" id="active"
                               {{ old('active', $pricingRule->active ? 'checked' : '') }}>
                        <label class="form-check-label" for="active">Rule is active</label>
                    </div>

                    <button type="submit" class="btn btn-primary px-4 me-2">
                        <i class="fas fa-save"></i> Update Rule
                    </button>
                    <a href="{{ route('pricing-rules.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
