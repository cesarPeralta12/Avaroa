<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationTemplate extends Model
{
    protected $table = 'notification_templates';

    protected $guarded = ['id'];

    // Fix: Cast shortcodes as array, not object
    protected $casts = [
        'shortcodes'   => 'array',        // ← Change from 'object' to 'array'
        'email_status' => 'boolean',
        'sms_status'   => 'boolean',
        'push_status'  => 'boolean',
    ];

    public function getDisplayNameAttribute()
    {
        return match($this->act) {
            'BAL_ADD'            => 'Balance - Added',
            'BAL_SUB'            => 'Balance - Subtracted',
            'DEPOSIT_COMPLETE'   => 'Deposit - Successful',
            'DEPOSIT_APPROVE'    => 'Deposit - Manual Approved',
            'DEPOSIT_REJECT'     => 'Deposit - Manual Rejected',
            'DEPOSIT_REQUEST'    => 'Deposit - Requested',
            'PASS_RESET_CODE'    => 'Password Reset - Code',
            'PASS_RESET_DONE'    => 'Password Reset - Done',
            'ADMIN_SUPPORT_REPLY'=> 'Support Ticket Reply',
            'EVER_CODE'          => 'Email Verification',
            'SVER_CODE'          => 'SMS Verification',
            'WITHDRAW_APPROVE'   => 'Withdraw Approved',
            'WITHDRAW_REJECT'    => 'Withdraw Rejected',
            'WITHDRAW_REQUEST'   => 'Withdraw Requested',
            'DEFAULT'            => 'Default Template',
            'REFERRAL_COMMISSION'=> 'Referral Commission',
            'RECEIVED_MONEY'     => 'Money Received',
            'TRANSFER_MONEY'     => 'Money Transferred',
            default              => str_replace('_', ' ', ucwords(strtolower($this->act), '_')),
        };
    }
}
