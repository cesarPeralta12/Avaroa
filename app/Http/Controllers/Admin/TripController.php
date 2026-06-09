<?php

namespace App\Http\Controllers\Admin;

use App\Events\NewDeliveryRequest;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\DriverRequest;
use App\Models\PricingQuote;
use App\Models\Trip;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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
        $customers    = User::where('account_type', 'customer')->orderBy('name')->get();
        $drivers      = Driver::whereIn('status', ['available', 'online'])
                              ->with(['user:id,name,whatsapp_number', 'vehicles:id,driver_id,model,plate_number,type'])
                              ->get();

        return view('admin.trips.create', compact('customers', 'drivers', 'user_session'));
    }

    public function store(Request $request)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Please login first.'], 401);
        }

        $validated = $request->validate([
            'customer_id'       => 'required|exists:users,id',
            'driver_id'         => 'nullable|exists:drivers,id',
            'service_type'      => 'required|in:Taxi,Delivery,Cargo',
            'origin_url'        => 'nullable|string|max:255',
            'origin_address'    => 'nullable|string|max:500',
            'origin_lat'        => 'required|numeric',
            'origin_lng'        => 'required|numeric',
            'destination_url'   => 'nullable|string|max:255',
            'destination_address' => 'nullable|string|max:500',
            'destination_lat'   => 'required|numeric',
            'destination_lng'   => 'required|numeric',
            'payment_method'    => 'required|in:cash,qr,card,bank_transfer',
            'estimated_fare'    => 'nullable|numeric|min:0',
            'currency'          => 'nullable|string|max:10',
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
            // Siempre 'pending' para que aparezca en /deliveries/available de la app.
            // La diferencia está en el DriverRequest: directo = 1 conductor, broadcast = todos.
            $driverId = $request->driver_id ?: null;
            $status   = 'pending';

            $trip = Trip::create(array_merge($validated, [
                'status'          => $status,
                'driver_id'       => $driverId,
                'tracking_token'  => Str::random(32),
                'currency'        => $validated['currency'] ?? 'Bs',
            ]));

            // Quote básico
            PricingQuote::create([
                'trip_id'       => $trip->id,
                'distance'      => 0,
                'duration'      => 0,
                'base_fare'     => $validated['estimated_fare'] ?? 0,
                'total_fare'    => $validated['estimated_fare'] ?? 0,
                'applied_rules' => json_encode([]),
                'inputs'        => json_encode([]),
            ]);

            DB::commit();

            // ── Crear DriverRequest + Notificar ───────────────────────────────
            // DriverRequest es necesario para que /deliveries/available devuelva
            // el viaje a la app móvil (además del push WebSocket).
            if ($driverId) {
                // Asignación directa → crear request para ese conductor
                DriverRequest::create([
                    'trip_id'   => $trip->id,
                    'driver_id' => $driverId,
                    'status'    => 'pending',
                    'sent_at'   => now(),
                ]);

                try {
                    broadcast(new NewDeliveryRequest($trip->fresh(['customer']), [$driverId]));
                } catch (\Exception $e) {
                    Log::warning('Broadcast directo falló: ' . $e->getMessage());
                }
            } else {
                // Sin conductor → crear request para CADA conductor disponible
                $availableDriverIds = Driver::whereIn('status', ['available', 'online'])
                    ->pluck('id')->toArray();

                foreach ($availableDriverIds as $dId) {
                    DriverRequest::create([
                        'trip_id'   => $trip->id,
                        'driver_id' => $dId,
                        'status'    => 'pending',
                        'sent_at'   => now(),
                    ]);
                }

                if (!empty($availableDriverIds)) {
                    try {
                        broadcast(new NewDeliveryRequest($trip->fresh(['customer']), $availableDriverIds));
                    } catch (\Exception $e) {
                        Log::warning('Broadcast general falló: ' . $e->getMessage());
                    }
                }
            }

            return response()->json([
                'success'  => true,
                'message'  => $driverId
                    ? '✅ Viaje creado y asignado al conductor.'
                    : '✅ Viaje creado. Notificando a conductores disponibles...',
                'redirect' => route('trips.index'),
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
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
            'redirect' => route('trips.index')
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
