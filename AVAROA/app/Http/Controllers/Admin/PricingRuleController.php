<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingRule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PricingRuleController extends Controller
{
    public function index()
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));
        $rules = PricingRule::latest()->paginate(15);

        return view('admin.pricing-rules.index', compact('rules', 'user_session'));
    }

    public function create()
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));
        return view('admin.pricing-rules.create', compact('user_session'));
    }

    public function store(Request $request)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Please login first.'], 401);
        }

        $validated = $request->validate([
            'type'       => 'required|string|max:50',
            'value'      => 'required|numeric',
            'conditions' => 'nullable|json',
            'active'     => 'boolean',
        ]);

        PricingRule::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pricing rule created.',
            'redirect' => route('admin.pricing-rules.index')
        ]);
    }

    public function edit(PricingRule $pricingRule)
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));
        return view('admin.pricing-rules.edit', compact('pricingRule', 'user_session'));
    }

    public function update(Request $request, PricingRule $pricingRule)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Please login first.'], 401);
        }

        $validated = $request->validate([
            'type'       => 'required|string|max:50',
            'value'      => 'required|numeric',
            'conditions' => 'nullable|json',
            'active'     => 'boolean',
        ]);

        $pricingRule->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pricing rule updated.',
            'redirect' => route('admin.pricing-rules.index')
        ]);
    }

    public function destroy(PricingRule $pricingRule)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $pricingRule->delete();
        return response()->json(['success' => true, 'message' => 'Pricing rule deleted']);
    }

    public function bulkDelete(Request $request)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        PricingRule::whereIn('id', $request->ids ?? [])->delete();
        return response()->json(['success' => true, 'message' => 'Selected rules deleted']);
    }
}
