<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\PricingQuote;
use App\Models\Trip;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TripController extends Controller
{
    public function index()
{
    if (!Session::has('LoggedIn')) {
        return redirect('Userlogin')->with('fail', 'Please login first.');
    }

    $user_session = User::findOrFail(Session::get('LoggedIn'));

   $trips = Trip::with([
    'customer:id,name',
    'driver:id,user_id',
    'driver.user:id,name,whatsapp_number',
    'driver.vehicles:id,driver_id,plate_number,type',
    'quote'
])->latest()->paginate(150);

    return view('admin.trips.index', compact('trips', 'user_session'));
}

    public function create()
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));
        $customers = User::where('account_type', 'customer')->get();

        return view('admin.trips.create', compact('customers', 'user_session'));
    }

    public function store(Request $request)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Please login first.'], 401);
        }

        $validated = $request->validate([
            'customer_id'       => 'required|exists:users,id',
            'service_type'      => 'required|in:Taxi,Delivery,Cargo',
            'origin_url'        => 'nullable|string|max:255',
            'origin_lat'        => 'required|numeric',
            'origin_lng'        => 'required|numeric',
            'destination_url'   => 'nullable|string|max:255',
            'destination_lat'   => 'required|numeric',
            'destination_lng'   => 'required|numeric',
            'payment_method'    => 'required|in:cash,qr,card,bank_transfer',
            'num_passengers'    => 'nullable|integer|min:1|max:10',
            'trunk_required'    => 'boolean',
            'scheduled_time'    => 'nullable|date',
            'notes'             => 'nullable|string',
            'cargo_type'        => 'nullable|string|max:100',
            'weight'            => 'nullable|numeric|min:0',
            'volume'            => 'nullable|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            $trip = Trip::create($validated + ['status' => 'NEW']);

            // Optional: Create initial pricing quote (expand as needed)
            PricingQuote::create([
                'trip_id' => $trip->id,
                'distance' => 0, // calculate later
                'duration' => 0,
                'base_fare' => 0,
                'total_fare' => 0,
                'applied_rules' => json_encode([]),
                'inputs' => json_encode([]),
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Trip created successfully.',
                'redirect' => route('admin.trips.index')
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 422);
        }
    }

    public function edit(Trip $trip)
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));
        $customers = User::where('account_type', 'customer')->get();
        $drivers = Driver::where('status', 'available')->with('user')->get();
        $vehicles = Vehicle::where('driver_id', $trip->driver_id)->get();

        return view('admin.trips.edit', compact(
            'trip',
            'customers',
            'drivers',
            'vehicles',
            'user_session'
        ));
    }

    public function update(Request $request, Trip $trip)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Please login first.'], 401);
        }

        $validated = $request->validate([
            'customer_id'       => 'required|exists:users,id',
            'service_type'      => 'required|in:Taxi,Delivery,Cargo',
            'origin_url'        => 'nullable|string|max:255',
            'origin_lat'        => 'required|numeric',
            'origin_lng'        => 'required|numeric',
            'destination_url'   => 'nullable|string|max:255',
            'destination_lat'   => 'required|numeric',
            'destination_lng'   => 'required|numeric',
            'payment_method'    => 'required|in:cash,qr,card,bank_transfer',
            'num_passengers'    => 'nullable|integer|min:1|max:10',
            'trunk_required'    => 'boolean',
            'scheduled_time'    => 'nullable|date',
            'notes'             => 'nullable|string',
            'cargo_type'        => 'nullable|string|max:100',
            'weight'            => 'nullable|numeric|min:0',
            'volume'            => 'nullable|numeric|min:0',
        ]);

        $trip->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Trip updated successfully.',
            'redirect' => route('admin.trips.index')
        ]);
    }

    public function destroy(Trip $trip)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $trip->delete();
        return response()->json(['success' => true, 'message' => 'Trip deleted']);
    }

    public function bulkDelete(Request $request)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        Trip::whereIn('id', $request->ids ?? [])->delete();
        return response()->json(['success' => true, 'message' => 'Selected trips deleted']);
    }

    public function manualAssignment()
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));
        $pendingTrips = Trip::whereIn('status', ['searching', 'DISPATCHING'])->get();
        $availableDrivers = Driver::where('status', 'available')
            ->where('is_online', true)
            ->with('user', 'vehicles')
            ->get();

        return view('admin.trips.manual-assignment', compact('pendingTrips', 'availableDrivers', 'user_session'));
    }

    public function fleet()
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));
        $drivers = Driver::with(['user', 'vehicles', 'trips' => fn($q) => $q->where('status', 'IN_TRIP')])
            ->latest()
            ->paginate(20);

        return view('admin.trips.fleet', compact('drivers', 'user_session'));
    }
}
