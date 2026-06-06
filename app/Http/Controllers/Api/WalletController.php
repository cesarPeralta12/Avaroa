<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use App\Models\TopUpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    /**
     * Get wallet with latest transactions
     * GET /api/driver/wallet
     */
    public function show()
    {
        $driver = Auth::user()->driver;

        if (!$driver) {
            return response()->json([
                'success' => false,
                'error' => 'Driver not found'
            ], 404);
        }

        $wallet = Wallet::firstOrCreate(
            ['driver_id' => $driver->id],
            [
                'balance' => 0,
                'is_blocked' => false,
                'currency' => 'Bs',
            ]
        );

        // Get last 20 transactions
        $transactions = WalletTransaction::where('wallet_id', $wallet->id)
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get()
            ->map(function ($txn) {
                return [
                    'id' => $txn->id,
                    'walletId' => $txn->wallet_id,
                    'type' => $txn->type,
                    'amount' => (int) $txn->amount,
                    'direction' => $txn->direction,
                    'referenceType' => $txn->reference_type,
                    'referenceId' => $txn->reference_id,
                    'createdByAdminId' => $txn->created_by_admin_id,
                    'createdAt' => $txn->created_at->toIso8601String(),
                ];
            });

        return response()->json([
            'success' => true,
            'wallet' => [
                'id' => $wallet->id,
                'driverId' => $driver->id,
                'balance' => (int) $wallet->balance,
                'isBlocked' => (bool) $wallet->is_blocked,
                'blockedReason' => $wallet->blocked_reason,
                'currency' => $wallet->currency,
                'blockedAt' => $wallet->blocked_at?->toIso8601String(),
                'createdAt' => $wallet->created_at->toIso8601String(),
                'updatedAt' => $wallet->updated_at->toIso8601String(),
            ],
            'transactions' => $transactions,
        ]);
    }

    /**
     * Get all transactions (paginated)
     * GET /api/driver/wallet/transactions
     */
    public function transactions(Request $request)
    {
        $driver = Auth::user()->driver;
        
        if (!$driver) {
            return response()->json([
                'success' => false,
                'error' => 'Driver not found'
            ], 404);
        }
        
        $wallet = Wallet::where('driver_id', $driver->id)->first();

        if (!$wallet) {
            return response()->json([
                'success' => true,
                'data' => [],
                'pagination' => [
                    'currentPage' => 1,
                    'lastPage' => 1,
                    'total' => 0,
                ]
            ]);
        }

        $perPage = $request->get('per_page', 50);
        $transactions = WalletTransaction::where('wallet_id', $wallet->id)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $transactions->map(function ($txn) {
                return [
                    'id' => $txn->id,
                    'walletId' => $txn->wallet_id,
                    'type' => $txn->type,
                    'amount' => (int) $txn->amount,
                    'direction' => $txn->direction,
                    'referenceType' => $txn->reference_type,
                    'referenceId' => $txn->reference_id,
                    'createdByAdminId' => $txn->created_by_admin_id,
                    'createdAt' => $txn->created_at->toIso8601String(),
                ];
            }),
            'pagination' => [
                'currentPage' => $transactions->currentPage(),
                'lastPage' => $transactions->lastPage(),
                'total' => $transactions->total(),
                'perPage' => $transactions->perPage(),
            ],
        ]);
    }

    /**
     * Request top-up via WhatsApp
     * POST /api/driver/wallet/topup-request
     */
    public function requestTopUp(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer|min:10|max:1000',
            'method' => 'required|in:WHATSAPP,BANK_TRANSFER,QR',
        ]);

        $driver = Auth::user()->driver;
        
        if (!$driver) {
            return response()->json([
                'success' => false,
                'message' => 'Driver not found'
            ], 404);
        }
        
        $wallet = Wallet::firstOrCreate(
            ['driver_id' => $driver->id],
            [
                'balance' => 0,
                'is_blocked' => false,
                'currency' => 'Bs',
            ]
        );

        try {
            DB::beginTransaction();
            
            $topUp = TopUpRequest::create([
                'driver_id' => $driver->id,
                'wallet_id' => $wallet->id,
                'amount' => $request->amount,
                'method' => $request->method,
                'status' => 'pending',
            ]);
            
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Top-up request created successfully',
                'data' => [
                    'id' => $topUp->id,
                    'driverId' => $driver->id,
                    'walletId' => $wallet->id,
                    'amount' => (int) $topUp->amount,
                    'method' => $topUp->method,
                    'status' => $topUp->status,
                    'whatsappNumber' => config('app.support_whatsapp', '59162095357'),
                    'referenceMessage' => "Hola, solicito recarga de {$topUp->amount} Bs. ID: {$topUp->id}",
                    'createdAt' => $topUp->created_at->toIso8601String(),
                ],
            ], 201);
            
        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to create top-up request',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}