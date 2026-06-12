<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\Models\FundingPlan;
use App\Models\User;
use App\Models\Withdrawal;
use App\Notifications\WithdrawalStatusChanged;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class AdminWithdrawalController extends Controller
{
    public function index()
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));

        $withdrawals = Withdrawal::query()
            ->with([
                'user',                     // ← no column restriction
                'challenge.fundingPlan',    // ← clean & safe
            ])
            ->latest()
            ->paginate(20);



        return view('admin.withdrawals.index', compact('withdrawals', 'user_session'));
    }

    public function approve(Withdrawal $withdrawal)
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        if (!$withdrawal->isPending()) {
            return back()->with('fail', 'Only pending withdrawals can be approved.');
        }

        DB::transaction(function () use ($withdrawal) {
            $withdrawal->update([
                'status'      => Withdrawal::STATUS_APPROVED,
                'approved_by' => Session::get('LoggedIn'),
                'approved_at' => now(),
            ]);
        });

        // Send notification to user
        $withdrawal->user->notify(new WithdrawalStatusChanged($withdrawal, 'approved'));

        return back()->with('success', 'Withdrawal #' . $withdrawal->id . ' approved successfully.');
    }

    public function reject(Request $request, Withdrawal $withdrawal)
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        if (!$withdrawal->isPending()) {
            return back()->with('fail', 'Only pending withdrawals can be rejected.');
        }

        $request->validate([
            'admin_feedback' => 'required|string|min:8|max:500',
        ]);

        DB::transaction(function () use ($withdrawal, $request) {
            if ($withdrawal->challenge) {
                $withdrawal->challenge->increment('current_balance', $withdrawal->amount);
            }

            $withdrawal->update([
                'status'         => Withdrawal::STATUS_REJECTED,
                'admin_feedback' => $request->admin_feedback,
                'rejected_by'    => Session::get('LoggedIn'),
                'rejected_at'    => now(),
            ]);
        });

        // Send notification to user
        $withdrawal->user->notify(new WithdrawalStatusChanged($withdrawal, 'rejected'));

        return back()->with('success', 'Withdrawal #' . $withdrawal->id . ' rejected and amount refunded.');
    }

    public function process(Request $request, Withdrawal $withdrawal)
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        if (!$withdrawal->isApproved()) {
            return back()->with('fail', 'Only approved withdrawals can be processed.');
        }

        $request->validate([
            'utr' => [
                'required',
                'string',
                'min:6',
                'max:60',
                Rule::unique('withdrawals', 'utr')->ignore($withdrawal->id),
            ],
            'sent_amount' => [
                'required',
                'numeric',
                'min:1',
                function ($attribute, $value, $fail) use ($withdrawal) {
                    $diff = abs($value - $withdrawal->final_amount);
                    if ($diff > 15) {
                        $fail("Sent amount should be very close to requested amount (₹{$withdrawal->final_amount})");
                    }
                },
            ],
        ]);

        DB::transaction(function () use ($withdrawal, $request) {
            $withdrawal->update([
                'utr'          => $request->utr,
                'sent_amount'  => $request->sent_amount,
                'status'       => Withdrawal::STATUS_PROCESSED,
                'processed_by' => Session::get('LoggedIn'),
                'processed_at' => now(),
            ]);
        });

        // Send notification to user
        $withdrawal->user->notify(new WithdrawalStatusChanged($withdrawal, 'processed'));

        return back()->with('success', 'Withdrawal #' . $withdrawal->id . ' processed successfully.');
    }
}
