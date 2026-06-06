<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationSetting extends Model
{
    protected $table = 'notification_settings';
    protected $fillable = [
        'fcm_api_key', 'fcm_auth_domain', 'fcm_project_id', 'fcm_storage_bucket',
        'fcm_messaging_sender_id', 'fcm_app_id', 'fcm_measurement_id',
        'sms_provider', 'nexmo_api_key', 'nexmo_api_secret'
    ];
}
