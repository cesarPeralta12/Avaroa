<?php
// app/Http/Controllers/Admin/TopUpController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TopUpRequest;
use App\Models\Wallet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TopUpController extends Controller
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

        $query = TopUpRequest::with(['driver.user', 'wallet', 'reviewer'])
            ->orderBy('created_at', 'desc');

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by method
        if ($request->filled('method')) {
            $query->where('method', $request->method);
        }

        // Search by driver or request ID
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('id', $request->search)
                    ->orWhereHas('driver.user', function ($sq) use ($request) {
                        $sq->where('name', 'like', '%' . $request->search . '%');
                    });
            });
        }

        $requests = $query->paginate(20);

        $stats = [
            'pending' => TopUpRequest::where('status', 'pending')->count(),
            'approved' => TopUpRequest::where('status', 'approved')->count(),
            'rejected' => TopUpRequest::where('status', 'rejected')->count(),
            'total_amount' => TopUpRequest::where('status', 'approved')->sum('amount'),
        ];

        return view('admin.topup-requests.index', compact('requests', 'stats', 'user_session'));
    }

    public function show(TopUpRequest $topUpRequest)
    {
        $user_session = $this->checkSession();

        $topUpRequest->load(['driver.user', 'wallet', 'reviewer']);
        return view('admin.topup-requests.show', compact('topUpRequest', 'user_session'));
    }

    public function approve(Request $request, TopUpRequest $topUpRequest)
    {
        $user_session = $this->checkSession();

        if ($topUpRequest->status !== 'pending') {
            return response()->json([
                'success' => false,
                'message' => 'This request has already been processed'
            ], 400);
        }

        $request->validate([
            'review_note' => 'nullable|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            // Update request status
            $topUpRequest->update([
                'status' => 'approved',
                'reviewed_by_admin_id' => $user_session->id,
                'review_note' => $request->review_note,
            ]);

            // Credit wallet
            $wallet = $topUpRequest->wallet;
            $wallet->credit($topUpRequest->amount, 'topup');

            // Update transaction with reference
            $wallet->transactions()->latest()->first()->update([
                'created_by_admin_id' => $user_session->id,
                'reference_type' => 'topup',
                'reference_id' => $topUpRequest->id,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Top-up request approved successfully',
                'new_balance' => $wallet->fresh()->balance
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to approve request: ' . $e->getMessage()
            ], 500);
        }
    }

    public function reject(Request $request, TopUpRequest $topUpRequest)
    {
        $user_session = $this->checkSession();

        if ($topUpRequest->status !== 'pending') {
            return response()->json([
                'success' => false,
                'message' => 'This request has already been processed'
            ], 400);
        }

        $request->validate([
            'review_note' => 'required|string|max:255',
        ]);

        try {
            $topUpRequest->update([
                'status' => 'rejected',
                'reviewed_by_admin_id' => $user_session->id,
                'review_note' => $request->review_note,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Top-up request rejected successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to reject request: ' . $e->getMessage()
            ], 500);
        }
    }
}
