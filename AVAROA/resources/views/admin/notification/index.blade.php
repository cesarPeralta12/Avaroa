@extends('layout.master')
@section('title', 'Notification Settings')

@section('main_content')
<div class="container-fluid pt-4">

    <h2 class="mb-4">Push Notification Settings</h2>
    <div class="alert alert-info">
        <strong>Note:</strong> If you want to send push notification by the firebase, Your system must be SSL certified
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('admin.notification.update') }}" method="POST">
        @csrf @method('PUT')

        <!-- Push Notification -->
        <div class="card mb-5 shadow-sm">
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-4">
                        <label class="form-label">API Key <span class="text-danger">*</span></label>
                        <input type="text" name="fcm_api_key" class="form-control" value="{{ old('fcm_api_key', $setting->fcm_api_key) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Auth Domain <span class="text-danger">*</span></label>
                        <input type="text" name="fcm_auth_domain" class="form-control" value="{{ old('fcm_auth_domain', $setting->fcm_auth_domain) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Project Id <span class="text-danger">*</span></label>
                        <input type="text" name="fcm_project_id" class="form-control" value="{{ old('fcm_project_id', $setting->fcm_project_id) }}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Storage Bucket <span class="text-danger">*</span></label>
                        <input type="text" name="fcm_storage_bucket" class="form-control" value="{{ old('fcm_storage_bucket', $setting->fcm_storage_bucket) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Messaging Sender Id <span class="text-danger">*</span></label>
                        <input type="text" name="fcm_messaging_sender_id" class="form-control" value="{{ old('fcm_messaging_sender_id', $setting->fcm_messaging_sender_id) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">App Id <span class="text-danger">*</span></label>
                        <input type="text" name="fcm_app_id" class="form-control" value="{{ old('fcm_app_id', $setting->fcm_app_id) }}" required>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Measurement Id <span class="text-danger">*</span></label>
                        <input type="text" name="fcm_measurement_id" class="form-control" value="{{ old('fcm_measurement_id', $setting->fcm_measurement_id) }}" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- SMS Settings -->
        <h2 class="mb-4">SMS Notification Settings</h2>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-12">
                        <label class="form-label">SMS Send Method</label>
                        <select name="sms_provider" class="form-select form-select-lg">
                            <option value="nexmo" {{ $setting->sms_provider == 'nexmo' ? 'selected' : '' }}>Nexmo</option>
                            <option value="twilio" {{ $setting->sms_provider == 'twilio' ? 'selected' : '' }}>Twilio</option>
                            <option value="msg91" {{ $setting->sms_provider == 'msg91' ? 'selected' : '' }}>MSG91</option>
                            <option value="textlocal" {{ $setting->sms_provider == 'textlocal' ? 'selected' : '' }}>TextLocal</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <h4>Nexmo Configuration</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">API Key</label>
                                <input type="text" name="nexmo_api_key" class="form-control" value="{{ old('nexmo_api_key', $setting->nexmo_api_key) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">API Secret</label>
                                <input type="password" name="nexmo_api_secret" class="form-control" value="{{ old('nexmo_api_secret', $setting->nexmo_api_secret) }}" placeholder="••••••••••••••••">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary btn-lg px-5">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
