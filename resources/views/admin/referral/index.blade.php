<!-- resources/views/admin/referral/index.blade.php -->
@extends('layout.master')
@section('title', 'Manage Referral - ₹ Only')

@section('main_content')
<div class="container-fluid pt-4">
    <h2 class="mb-4"><i class="fa fa-users"></i> Manage Referral Program (India)</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-primary">
        <div class="card-body">
            <form action="{{ url('admin/referral-settings') }}" method="POST">
                @csrf @method('PUT')

                <!-- Enable/Disable -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Referral Program Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="referral_enabled" value="1"
                                   {{ $setting->referral_enabled ? 'checked' : '' }} style="transform:scale(1.5);">
                            <label class="form-check-label fs-5">{{ $setting->referral_enabled ? 'Enabled' : 'Disabled' }}</label>
                        </div>
                    </div>
                </div>

                <!-- Bonus Type -->
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Bonus Type</label>
                        <select name="bonus_type" class="form-select" id="bonusType">
                            <option value="fixed" {{ $setting->bonus_type == 'fixed' ? 'selected' : '' }}>Fixed Amount (₹)</option>
                            <option value="percentage" {{ $setting->bonus_type == 'percentage' ? 'selected' : '' }}>Percentage (%)</option>
                        </select>
                    </div>

                    <!-- Fixed Amount Field -->
                    <div class="col-md-6" id="fixedField">
                        <label class="form-label">Referral Bonus (Fixed)</label>
                        <div class="input-group">
                            <span class="input-group-text fw-bold text-success">₹</span>
                            <input type="number" step="1" name="referral_bonus_amount" class="form-control form-control-lg text-end"
                                   value="{{ old('referral_bonus_amount', $setting->referral_bonus_amount) }}" placeholder="500">
                        </div>
                        <small class="text-muted">e.g., ₹500 bonus per referral</small>
                    </div>

                    <!-- Percentage Field -->
                    <div class="col-md-6" id="percentageField" style="display:{{ $setting->bonus_type == 'percentage' ? 'block' : 'none' }}">
                        <label class="form-label">Referral Bonus (Percentage)</label>
                        <div class="input-group">
                            <input type="number" step="0.01" name="referral_percentage" class="form-control form-control-lg text-end"
                                   value="{{ old('referral_percentage', $setting->referral_percentage) }}" placeholder="10">
                            <span class="input-group-text fw-bold">%</span>
                        </div>
                        <small class="text-muted">e.g., 10% of first deposit</small>
                    </div>

                    <!-- Minimum Deposit -->
                    <div class="col-md-6">
                        <label class="form-label">Minimum Deposit to Activate Bonus</label>
                        <div class="input-group">
                            <span class="input-group-text fw-bold text-success">₹</span>
                            <input type="number" name="minimum_deposit_for_bonus" class="form-control form-control-lg text-end"
                                   value="{{ old('minimum_deposit_for_bonus', $setting->minimum_deposit_for_bonus) }}" placeholder="1000">
                        </div>
                    </div>

                    <!-- Expiry & Limits -->
                    <div class="col-md-6">
                        <label class="form-label">Bonus Expires After (Days)</label>
                        <input type="number" name="bonus_expiry_days" class="form-control"
                               value="{{ old('bonus_expiry_days', $setting->bonus_expiry_days) }}" min="1" max="365">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Max Referrals Per User (0 = Unlimited)</label>
                        <input type="number" name="max_referrals_per_user" class="form-control"
                               value="{{ old('max_referrals_per_user', $setting->max_referrals_per_user) }}" min="0">
                    </div>

                    <!-- Terms -->
                    <div class="col-12 mt-3">
                        <label class="form-label">Terms & Conditions (Optional)</label>
                        <textarea name="terms_conditions" rows="4" class="form-control" placeholder="Enter referral program rules...">{{ old('terms_conditions', $setting->terms_conditions) }}</textarea>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <button type="submit" class Cau class="btn btn-success btn-lg px-5">
                        <i class="fa fa-save"></i> Save Referral Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('bonusType').addEventListener('change', function() {
    document.getElementById('fixedField').style.display = this.value === 'fixed' ? 'block' : 'none';
    document.getElementById('percentageField').style.display = this.value === 'percentage' ? 'block' : 'none';
});
</script>
@endsection
