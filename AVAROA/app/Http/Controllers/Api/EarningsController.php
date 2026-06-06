<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use App\Models\WalletTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EarningsController extends Controller
{
    /**
     * Get earnings summary (today, week, month)
     * GET /api/driver/earnings
     */
    public function summary()
    {
        $driver = Auth::user()->driver;

        if (!$driver) {
            return response()->json(['error' => 'Driver not found'], 404);
        }

        $today = Carbon::today();
        $weekStart = Carbon::now()->startOfWeek();
        $monthStart = Carbon::now()->startOfMonth();

        // Today's earnings (completed trips) - use updated_at instead of completed_at
        $todayEarnings = Trip::where('driver_id', $driver->id)
            ->where('status', 'completed')
            ->whereDate('updated_at', $today)
            ->sum('price') ?? 0;

        // Weekly earnings - use updated_at instead of completed_at
        $weeklyEarnings = Trip::where('driver_id', $driver->id)
            ->where('status', 'completed')
            ->whereBetween('updated_at', [$weekStart, now()])
            ->sum('price') ?? 0;

        // Monthly earnings - use updated_at instead of completed_at
        $monthlyEarnings = Trip::where('driver_id', $driver->id)
            ->where('status', 'completed')
            ->whereBetween('updated_at', [$monthStart, now()])
            ->sum('price') ?? 0;

        // Total trips count
        $totalTrips = Trip::where('driver_id', $driver->id)
            ->where('status', 'completed')
            ->count();

        // Total online hours - use total_online_hours column (not total_online_seconds)
        $totalOnlineHours = \App\Models\DriverAvailability::where('driver_id', $driver->id)
            ->sum('total_online_hours') ?? 0;

        return response()->json([
            'success' => true,
            'data' => [
                'todayEarnings' => round($todayEarnings, 2),
                'weeklyEarnings' => round($weeklyEarnings, 2),
                'monthlyEarnings' => round($monthlyEarnings, 2),
                'totalTrips' => $totalTrips,
                'totalOnlineHours' => round($totalOnlineHours, 1),
                'ratePerMinute' => 1.20,
                'commissionRate' => 0.13,
            ],
        ]);
    }

    /**
     * Get daily breakdown for chart
     * GET /api/driver/earnings/daily
     */
    public function dailyBreakdown()
    {
        $driver = Auth::user()->driver;

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Get daily earnings for current week - use updated_at instead of completed_at
        $dailyData = Trip::where('driver_id', $driver->id)
            ->where('status', 'completed')
            ->whereBetween('updated_at', [$startOfWeek, $endOfWeek])
            ->select(
                DB::raw('DATE(updated_at) as date'),
                DB::raw('SUM(price) as total')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        // Build array for all 7 days (fill zeros for days with no earnings)
        $days = ['L', 'M', 'X', 'J', 'V', 'S', 'D'];
        $breakdown = [];

        for ($i = 0; $i < 7; $i++) {
            $date = $startOfWeek->copy()->addDays($i)->format('Y-m-d');
            $breakdown[] = [
                'day' => $days[$i],
                'date' => $date,
                'amount' => round($dailyData[$date]->total ?? 0, 2),
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $breakdown,
        ]);
    }

    /**
     * Get earnings transactions (commissions and earnings)
     * GET /api/driver/earnings/transactions
     */
    public function transactions()
    {
        $driver = Auth::user()->driver;
        $wallet = \App\Models\Wallet::where('driver_id', $driver->id)->first();

        if (!$wallet) {
            return response()->json(['data' => []]);
        }

        // Get commission debits and earnings
        $transactions = WalletTransaction::where('wallet_id', $wallet->id)
            ->whereIn('type', ['commission_debit', 'topup', 'adjustment'])
            ->orderBy('created_at', 'desc')
            ->take(50)
            ->get()
            ->map(function ($txn) {
                $isCommission = $txn->type === 'commission_debit';

                return [
                    'id' => $txn->id,
                    'type' => $txn->type,
                    'amount' => $txn->amount,
                    'direction' => $txn->direction,
                    'description' => $isCommission
                        ? 'Comisi¨®n Viaje #' . substr($txn->reference_id, -4)
                        : ($txn->type === 'topup' ? 'Recarga Aprobada' : 'Ajuste'),
                    'date' => $txn->created_at,
                    'isCommission' => $isCommission,
                ];
            });

        return response()->json([
            'success' => true,
            'data' => $transactions,
        ]);
    }
}