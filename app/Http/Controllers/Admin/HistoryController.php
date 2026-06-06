<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserLogin;
use App\Models\NotificationLog;
use App\Models\WalletTransaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class HistoryController extends Controller
{
    /**
     * Check session and get logged in user
     */
    private function checkSession()
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }
        return User::findOrFail(Session::get('LoggedIn'));
    }

    /**
     * Login History
     */
    public function loginHistory(Request $request)
    {
        // Check session
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));

        $query = UserLogin::with('user')
            ->orderBy('created_at', 'desc');

        // Filters
        if ($request->filled('search')) {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%'.$request->search.'%')
                  ->orWhere('email', 'like', '%'.$request->search.'%');
            })->orWhere('user_ip', 'like', '%'.$request->search.'%');
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }

        // Stats
        $stats = [
            'total_today' => UserLogin::whereDate('created_at', today())->count(),
            'total_week' => UserLogin::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'unique_users' => UserLogin::whereDate('created_at', today())->distinct('user_id')->count(),
            'unique_countries' => UserLogin::distinct('country')->count(),
        ];

        $logins = $query->paginate(20);
        $countries = UserLogin::distinct()->pluck('country')->filter();

        return view('admin.history.login', compact('logins', 'stats', 'countries', 'user_session'));
    }

    /**
     * Notification History
     */
    public function notificationHistory(Request $request)
    {
        // Check session
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));

        $query = NotificationLog::with('user')
            ->orderBy('created_at', 'desc');

        // Filters
        if ($request->filled('search')) {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%'.$request->search.'%');
            })->orWhere('sent_to', 'like', '%'.$request->search.'%')
              ->orWhere('subject', 'like', '%'.$request->search.'%');
        }

        if ($request->filled('type')) {
            $query->where('notification_type', $request->type);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Stats
        $stats = [
            'total_today' => NotificationLog::whereDate('created_at', today())->count(),
            'total_week' => NotificationLog::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'email_count' => NotificationLog::where('notification_type', 'email')->count(),
            'sms_count' => NotificationLog::where('notification_type', 'sms')->count(),
        ];

        $notifications = $query->paginate(20);
        $types = NotificationLog::distinct()->pluck('notification_type')->filter();

        return view('admin.history.notification', compact('notifications', 'stats', 'types', 'user_session'));
    }

    /**
     * Transaction History (Wallet)
     */
    public function transactionHistory(Request $request)
    {
        // Check session
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));

        $query = WalletTransaction::with(['wallet.driver.user', 'admin'])
            ->orderBy('created_at', 'desc');

        // Filters
        if ($request->filled('search')) {
            $query->whereHas('wallet.driver.user', function($q) use ($request) {
                $q->where('name', 'like', '%'.$request->search.'%')
                  ->orWhere('email', 'like', '%'.$request->search.'%');
            })->orWhere('reference_id', 'like', '%'.$request->search.'%');
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('direction')) {
            $query->where('direction', $request->direction);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Stats
        $stats = [
            'total_credit' => WalletTransaction::where('direction', 'CREDIT')->sum('amount'),
            'total_debit' => WalletTransaction::where('direction', 'DEBIT')->sum('amount'),
            'today_count' => WalletTransaction::whereDate('created_at', today())->count(),
            'total_count' => WalletTransaction::count(),
        ];

        $transactions = $query->paginate(20);

        return view('admin.history.transaction', compact('transactions', 'stats', 'user_session'));
    }

    /**
     * Export Login History
     */
    public function exportLoginHistory(Request $request)
    {
        // Check session
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));

        // Add your export logic here
        return redirect()->back()->with('success', 'Export functionality coming soon');
    }

    /**
     * Export Transaction History
     */
    public function exportTransactionHistory(Request $request)
    {
        // Check session
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));

        // Add your export logic here
        return redirect()->back()->with('success', 'Export functionality coming soon');
    }
}
