<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceRateController extends Controller
{
    private function checkSession(): User
    {
        if (!Session::has('LoggedIn')) {
            abort(redirect('admin/login')->with('fail', 'Debes iniciar sesión primero.'));
        }
        return User::findOrFail(Session::get('LoggedIn'));
    }

    public function index()
    {
        $user_session = $this->checkSession();
        $rates = ServiceRate::orderBy('service_type')->get();

        return view('admin.service-rates.index', compact('user_session', 'rates'));
    }

    public function update(Request $request, ServiceRate $serviceRate)
    {
        $this->checkSession();

        $request->validate([
            'price_per_minute'             => 'required|numeric|min:0.01|max:999',
            'minimum_fare'                 => 'required|numeric|min:0|max:9999',
            'average_speed_kmh'            => 'required|numeric|min:1|max:200',
            'passenger_surcharge_from'     => 'nullable|integer|min:1|max:20',
            'passenger_surcharge_per_head' => 'nullable|numeric|min:0|max:999',
            'max_passengers'               => 'nullable|integer|min:1|max:20',
        ]);

        $data = [
            'price_per_minute'  => $request->input('price_per_minute'),
            'minimum_fare'      => $request->input('minimum_fare'),
            'average_speed_kmh' => $request->input('average_speed_kmh'),
        ];

        // Passenger surcharge only applies to taxi
        if ($serviceRate->service_type === 'taxi') {
            $data['passenger_surcharge_from']     = $request->input('passenger_surcharge_from');
            $data['passenger_surcharge_per_head'] = $request->input('passenger_surcharge_per_head');
            $data['max_passengers']               = $request->input('max_passengers');
        } else {
            $data['passenger_surcharge_from']     = null;
            $data['passenger_surcharge_per_head'] = null;
            $data['max_passengers']               = null;
        }

        $serviceRate->update($data);

        return redirect()->route('admin.service-rates.index')
            ->with('success', "Tarifa de {$serviceRate->label} actualizada correctamente.");
    }

    public function updateCommission(Request $request)
    {
        $this->checkSession();

        $request->validate([
            'commission_rate_pct' => 'required|numeric|min:0|max:100',
        ]);

        $rate = (float) $request->input('commission_rate_pct') / 100;

        ServiceRate::query()->update(['commission_rate' => $rate]);

        return redirect()->route('admin.service-rates.index')
            ->with('success', sprintf('Comisión actualizada a %.1f%% para todos los servicios.', $request->input('commission_rate_pct')));
    }
}
