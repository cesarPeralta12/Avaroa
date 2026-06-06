<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WalletTransaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WalletTransactionsExport;

class WalletTransactionController extends Controller
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

        $query = WalletTransaction::with(['wallet.driver.user', 'admin'])
            ->orderBy('created_at', 'desc');

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by direction
        if ($request->filled('direction')) {
            $query->where('direction', $request->direction);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Filter by amount range
        if ($request->filled('min_amount')) {
            $query->where('amount', '>=', $request->min_amount);
        }
        if ($request->filled('max_amount')) {
            $query->where('amount', '<=', $request->max_amount);
        }

        // Search by reference or amount
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('reference_id', 'like', '%' . $request->search . '%')
                    ->orWhere('amount', $request->search)
                    ->orWhere('id', $request->search)
                    ->orWhereHas('wallet.driver.user', function ($sq) use ($request) {
                        $sq->where('name', 'like', '%' . $request->search . '%')
                          ->orWhere('email', 'like', '%' . $request->search . '%');
                    });
            });
        }

        $transactions = $query->paginate(30);

        $stats = [
            'total_credits' => WalletTransaction::where('direction', 'CREDIT')->sum('amount'),
            'total_debits' => WalletTransaction::where('direction', 'DEBIT')->sum('amount'),
            'today_volume' => WalletTransaction::whereDate('created_at', today())->sum('amount'),
            'month_volume' => WalletTransaction::whereMonth('created_at', now()->month)->sum('amount'),
            'total_transactions' => WalletTransaction::count(),
            'today_transactions' => WalletTransaction::whereDate('created_at', today())->count(),
        ];

        $types = ['topup', 'commission_debit', 'adjustment', 'balance_expiration'];

        return view('admin.wallet-transactions.index', compact('transactions', 'stats', 'types', 'user_session'));
    }

    public function export(Request $request)
    {
        $user_session = $this->checkSession();

        $filename = 'wallet_transactions_' . now()->format('Y_m_d_His') . '.xlsx';
        return Excel::download(new WalletTransactionsExport($request->all()), $filename);
    }
}