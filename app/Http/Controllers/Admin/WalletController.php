<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WalletController extends Controller
{
    private function checkSession()
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.')->send();
        }
        return User::findOrFail(Session::get('LoggedIn'));
    }

    public function index(Request $request)
    {
        $user_session = $this->checkSession();

        $query = Wallet::with(['driver.user', 'transactions'])
            ->withSum('transactions as total_credits', 'amount', function ($q) {
                $q->where('direction', 'CREDIT');
            })
            ->withSum('transactions as total_debits', 'amount', function ($q) {
                $q->where('direction', 'DEBIT');
            });

        // Filter by status (active / blocked / expired)
        if ($request->has('status')) {
            if ($request->status === 'blocked') {
                $query->where('is_blocked', true);
            } elseif ($request->status === 'active') {
                $query->where('is_blocked', false)
                      ->where(function ($q) {
                          $q->where('wallet_status', '!=', 'expired')
                            ->orWhereNull('wallet_status');
                      });
            } elseif ($request->status === 'expired') {
                $query->where('wallet_status', 'expired');
            }
        }

        // Filter by balance range
        if ($request->filled('min_balance')) {
            $query->where('balance', '>=', $request->min_balance);
        }
        if ($request->filled('max_balance')) {
            $query->where('balance', '<=', $request->max_balance);
        }

        // Search by driver name or ID
        if ($request->filled('search')) {
            $query->whereHas('driver.user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            })->orWhere('driver_id', $request->search);
        }

        $wallets = $query->latest()->paginate(20);

        $stats = [
            'total_balance' => Wallet::sum('balance'),
            'total_wallets' => Wallet::count(),
            'blocked_wallets' => Wallet::where('is_blocked', true)->count(),
            'active_wallets' => Wallet::where('is_blocked', false)
                ->where(function ($q) {
                    $q->where('wallet_status', '!=', 'expired')
                      ->orWhereNull('wallet_status');
                })->count(),
        ];

        return view('admin.wallets.index', compact('wallets', 'stats', 'user_session'));
    }

    public function show(Wallet $wallet)
    {
        $user_session = $this->checkSession();

        $wallet->load(['driver.user', 'driver.vehicles']);

        $transactions = $wallet->transactions()
            ->with('admin')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $stats = [
            'total_credits' => $wallet->transactions()->where('direction', 'CREDIT')->sum('amount'),
            'total_debits' => $wallet->transactions()->where('direction', 'DEBIT')->sum('amount'),
            'topup_count' => $wallet->transactions()->where('type', 'topup')->count(),
            'commission_count' => $wallet->transactions()->where('type', 'commission_debit')->count(),
            'adjustment_count' => $wallet->transactions()->where('type', 'adjustment')->count(),
            'expiration_count' => $wallet->transactions()->where('type', 'balance_expiration')->count(),
        ];

        return view('admin.wallets.show', compact('wallet', 'transactions', 'stats', 'user_session'));
    }

    public function toggleBlock(Wallet $wallet)
    {
        $user_session = $this->checkSession();

        try {
            $wallet->update([
                'is_blocked' => !$wallet->is_blocked,
                'blocked_reason' => $wallet->is_blocked ? null : request('reason', 'Manual block by admin'),
                'blocked_at' => $wallet->is_blocked ? null : now(),
            ]);

            $action = $wallet->is_blocked ? 'blocked' : 'unblocked';

            return response()->json([
                'success' => true,
                'message' => "Wallet has been {$action} successfully",
                'is_blocked' => $wallet->is_blocked
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update wallet status: ' . $e->getMessage()
            ], 500);
        }
    }

    public function adjustBalance(Request $request, Wallet $wallet)
    {
        $user_session = $this->checkSession();

        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'type' => 'required|in:credit,debit',
            'reason' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            $amount = abs($request->amount);
            $type = $request->type;
            $reason = $request->reason;

            if ($type === 'credit') {
                $wallet->credit($amount, 'adjustment');
                $direction = 'CREDIT';
            } else {
                if ($wallet->balance < $amount) {
                    throw new \Exception('Insufficient balance for debit adjustment');
                }
                $wallet->debit($amount, 'adjustment');
                $direction = 'DEBIT';
            }

            // Add admin reference
            $transaction = $wallet->transactions()->latest()->first();
            $transaction->update([
                'created_by_admin_id' => $user_session->id,
                'reference_type' => 'adjustment',
                'reference_id' => $reason,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => "Balance adjusted successfully",
                'new_balance' => $wallet->fresh()->balance,
                'transaction_id' => $transaction->id
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }
}