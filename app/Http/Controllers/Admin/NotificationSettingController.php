<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NotificationSetting;
use Illuminate\Http\Request;

class NotificationSettingController extends Controller
{


    public function index()
    {
        $setting = NotificationSetting::firstOrCreate([]);
        $user_session = session('LoggedIn')
            ? \App\Models\User::find(session('LoggedIn'))
            : null;
        return view('admin.notification.index', compact('setting','user_session'));
    }

    public function update(Request $request)
    {
        $request->validate([
            // Firebase Push
            'fcm_api_key'             => 'required|string',
            'fcm_auth_domain'         => 'required|string',
            'fcm_project_id'          => 'required|string',
            'fcm_storage_bucket'      => 'required|string',
            'fcm_messaging_sender_id' => 'required|string',
            'fcm_app_id'              => 'required|string',
            'fcm_measurement_id'      => 'required|string',

            // SMS
            'sms_provider'            => 'required|in:nexmo,twilio,msg91,textlocal',
            'nexmo_api_key'           => 'required_if:sms_provider,nexmo',
            'nexmo_api_secret'        => 'required_if:sms_provider,nexmo',
        ]);

        $setting = NotificationSetting::first();
        $setting->update($request->all());

        return back()->with('success', 'Notification settings updated successfully!');
    }
}
