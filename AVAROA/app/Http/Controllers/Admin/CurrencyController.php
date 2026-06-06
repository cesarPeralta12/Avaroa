<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\User;
use App\Traits\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CurrencyController extends Controller
{
    use General;
    public function index()
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['title'] = 'Currency Setting';
            $data['navApplicationSettingParentActiveClass'] = 'mm-active';
            $data['subNavGlobalSettingsActiveClass'] = 'mm-active';
            $data['subNavCurrencyActiveClass'] = 'active';
            $data['currencies'] = Currency::all();

            return view('admin.application_settings.general.currency', $data);
        }
    }

    public function edit($id)
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['title'] = 'Edit Currency';
            $data['navApplicationSettingParentActiveClass'] = 'mm-active';
            $data['subNavGlobalSettingsActiveClass'] = 'mm-active';
            $data['subNavCurrencyActiveClass'] = 'active';
            $data['currency'] = Currency::findOrFail($id);
            return view('admin.application_settings.general.currency-edit', $data);
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'currency_code' => 'required|unique:currencies,currency_code',
            'symbol' => 'required',
            'currency_placement' => 'required',
        ]);

        $currency = new Currency();
        $currency->currency_code = $request->currency_code;
        $currency->symbol = $request->symbol;
        $currency->currency_placement = $request->currency_placement;
        $currency->save();

        if ($request->current_currency) {
            Currency::where('id', $currency->id)->update(['current_currency' => 'on']);
            Currency::where('id', '!=', $currency->id)->update(['current_currency' => 'off']);
        }



        return redirect()->route('settings.currency.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'currency_code' => 'required|unique:currencies,currency_code,' . $id,
            'symbol' => 'required',
            'currency_placement' => 'required',
        ]);

        $currency = Currency::findOrfail($id);
        $currency->currency_code = $request->currency_code;
        $currency->symbol = $request->symbol;
        $currency->currency_placement = $request->currency_placement;
        $currency->save();

        if ($request->current_currency) {
            Currency::where('id', $currency->id)->update(['current_currency' => 'on']);
            Currency::where('id', '!=', $currency->id)->update(['current_currency' => 'off']);
        }
        session()->flash('success', 'Updated Successful');


        return redirect()->route('settings.currency.index');
    }

    public function delete($id)
    {
        $item = Currency::findOrFail($id);
        $item->delete();
        session()->flash('success', 'Deleted Successful');

        return redirect()->back();
    }
}
