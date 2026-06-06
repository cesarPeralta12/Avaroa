<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VehicleController extends Controller
{
    public function index()
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));
        $vehicles = Vehicle::with('driver.user')->latest()->paginate(15);

        return view('admin.vehicles.index', compact('vehicles', 'user_session'));
    }

    public function create()
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));
        $drivers = Driver::with('user')->get();

        return view('admin.vehicles.create', compact('drivers', 'user_session'));
    }

    public function store(Request $request)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Please login first.'], 401);
        }

        $validated = $request->validate([
            'driver_id'         => 'required|exists:drivers,id',
            'plate_number'      => 'required|string|max:15|unique:vehicles,plate_number',
            'type'              => 'required|in:car,van,truck,motorcycle',
            'capacity_weight'   => 'required|numeric|min:0',
            'capacity_volume'   => 'nullable|numeric|min:0',
            'expiration_date'   => 'nullable|date|after:today',
        ]);

        Vehicle::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Vehicle added successfully.',
            'redirect' => route('admin.vehicles.index')
        ]);
    }

    public function edit(Vehicle $vehicle)
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));
        $drivers = Driver::with('user')->get();

        return view('admin.vehicles.edit', compact('vehicle', 'drivers', 'user_session'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Please login first.'], 401);
        }

        $validated = $request->validate([
            'driver_id'         => 'required|exists:drivers,id',
            'plate_number'      => 'required|string|max:15|unique:vehicles,plate_number,' . $vehicle->id,
            'type'              => 'required|in:car,van,truck,motorcycle',
            'capacity_weight'   => 'required|numeric|min:0',
            'capacity_volume'   => 'nullable|numeric|min:0',
            'expiration_date'   => 'nullable|date|after:today',
        ]);

        $vehicle->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Vehicle updated successfully.',
            'redirect' => route('admin.vehicles.index')
        ]);
    }

    public function destroy(Vehicle $vehicle)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $vehicle->delete();
        return response()->json(['success' => true, 'message' => 'Vehicle deleted']);
    }

    public function bulkDelete(Request $request)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        Vehicle::whereIn('id', $request->ids ?? [])->delete();
        return response()->json(['success' => true, 'message' => 'Selected vehicles deleted']);
    }
}
