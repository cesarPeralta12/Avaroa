<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReferralSetting;
use Illuminate\Http\Request;

class ReferralSettingController extends Controller
{


    public function index()
    {
        $setting = ReferralSetting::firstOrCreate([], [
            'referral_bonus_amount' => 10.00,
            'referral_percentage' => 10.00,
            'minimum_deposit_for_bonus' => 100,
            'bonus_expiry_days' => 30,
        ]);
        $user_session = session('LoggedIn')
            ? \App\Models\User::find(session('LoggedIn'))
            : null;

        return view('admin.referral.index', compact('setting', 'user_session'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'referral_enabled'           => 'required|boolean',
            'bonus_type'                  => 'required|in:fixed,percentage',
            'referral_bonus_amount'       => 'required_if:bonus_type,fixed|numeric|min:1|max:10000',
            'referral_percentage'         => 'required_if:bonus_type,percentage|numeric|min:1|max:100',
            'minimum_deposit_for_bonus'   => 'required|numeric|min:100|max:100000',
            'bonus_expiry_days'           => 'required|integer|min:1|max:365',
            'max_referrals_per_user'      => 'required|integer|min:0',
            'terms_conditions'            => 'nullable|string',
        ]);

        $setting = ReferralSetting::first();
        $setting->update($request->all());

        return back()->with('success', 'Referral settings updated successfully!');
    }
}
