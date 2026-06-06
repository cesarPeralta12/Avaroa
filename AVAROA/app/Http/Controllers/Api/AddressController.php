<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Get all addresses for the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $addresses = $request->user()->addresses()->orderBy('created_at', 'desc')->get();

        return response()->json([
            'addresses' => $addresses
        ]);
    }

    /**
     * Store a newly created address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'label' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'coordinates' => 'nullable|string|max:255',
            'is_default' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        // If this is the first address or is_default is true, handle default address logic
        $isDefault = $request->is_default ?? false;
        if ($isDefault) {
            // Remove default status from all other addresses
            $request->user()->addresses()->update(['is_default' => false]);
        } else if ($request->user()->addresses()->count() === 0) {
            // If this is the first address, make it default
            $isDefault = true;
        }

        $address = $request->user()->addresses()->create([
            'label' => $request->label,
            'street' => $request->street,
            'city' => $request->city,
            'coordinates' => $request->coordinates ?? '0.0,0.0',
            'is_default' => $isDefault,
        ]);

        return response()->json([
            'message' => 'Address created successfully',
            'address' => $address
        ], 201);
    }

    /**
     * Display the specified address.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $address = $request->user()->addresses()->findOrFail($id);

        return response()->json([
            'address' => $address
        ]);
    }

    /**
     * Update the specified address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'label' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'coordinates' => 'nullable|string|max:255',
            'is_default' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $address = $request->user()->addresses()->findOrFail($id);

        // Handle default address logic
        $isDefault = $request->is_default ?? false;
        if ($isDefault && !$address->is_default) {
            // Remove default status from all other addresses
            $request->user()->addresses()->update(['is_default' => false]);
        }

        $address->update([
            'label' => $request->label,
            'street' => $request->street,
            'city' => $request->city,
            'coordinates' => $request->coordinates ?? $address->coordinates,
            'is_default' => $isDefault,
        ]);

        return response()->json([
            'message' => 'Address updated successfully',
            'address' => $address
        ]);
    }

    /**
     * Remove the specified address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $address = $request->user()->addresses()->findOrFail($id);
        $wasDefault = $address->is_default;

        $address->delete();

        // If the deleted address was the default, set another address as default if available
        if ($wasDefault) {
            $newDefault = $request->user()->addresses()->first();
            if ($newDefault) {
                $newDefault->update(['is_default' => true]);
            }
        }

        return response()->json([
            'message' => 'Address deleted successfully'
        ]);
    }
}
