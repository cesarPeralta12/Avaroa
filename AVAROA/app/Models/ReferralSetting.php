<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferralSetting extends Model
{
    protected $table = 'referral_settings';

    protected $fillable = [
        'referral_enabled',
        'referral_bonus_amount',
        'bonus_currency',
        'bonus_type',
        'referral_percentage',
        'minimum_deposit_for_bonus',
        'bonus_expiry_days',
        'max_referrals_per_user',
        'terms_conditions',
    ];

    protected $casts = [
        'referral_enabled' => 'boolean',
    ];
}
