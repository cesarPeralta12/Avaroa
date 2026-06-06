<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuditLogController extends Controller
{
    public function index()
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));

        $logs = AuditLog::with(['user', 'trip', 'conversation'])
            ->latest()
            ->paginate(20);

        return view('admin.audit-logs.index', compact('logs', 'user_session'));
    }

    public function show(AuditLog $auditLog)
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));
        $auditLog->load(['user', 'trip.customer', 'trip.driver', 'conversation']);

        return view('admin.audit-logs.show', compact('auditLog', 'user_session'));
    }
}
