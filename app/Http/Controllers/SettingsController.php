<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    /**
     * Show the settings panel
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('dashboard.settings')
            ->with('user', Auth::user());
    }

    /**
     * Change the user's password.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function passwordUpdate(Request $request)
    {
        $data = $request->validate([
            'password' => 'required|confirmed'
        ]);
        $password = Hash::make($data['password']);
        $user = Auth::user();
        $user->password = $password;
        $user->save();

        session()->flash('settings.updated', 'Password successfully updated!');
        return redirect()->back();
    }

    /**
     * Handles PIN updating.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function pinUpdate(Request $request)
    {
        $data = $request->validate([
            'pin' => 'required|confirmed'
        ]);

        $user = Auth::user();
        $user->pin = Hash::make($data['pin']);
        $user->save();

        session()->flash('settings.updated', 'PIN successfully updated!');
        return redirect()->back();
    }

    /**
     * Only for setting the enable PIN authentication /
     * verification process.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function twoStepAuth(Request $request)
    {
        $user = Auth::user();
        $user->options->enable_pin = $request->has('enable_pin')
            ? true
            : false;
        $user->options->save();
        session()->flash('settings.updated', 'Two Step Authentication changed!');
        return redirect()->back();
    }

    /**
     * Handles async request to enable the users'
     * endpoint.
     *
     * @param Request $request
     * @return array
     */
    public function enableEndpoint(Request $request)
    {
        $user = Auth::user();
        $user->endpoint->is_active = true;
        $user->endpoint->save();

        return [
            'status' => true
        ];
    }

    /**
     * Handles the async request to disable the users'
     * endpoint.
     *
     * @param Request $request
     * @return array
     */
    public function disableEndpoint(Request $request)
    {
        $user = Auth::user();
        $user->endpoint->is_active = false;
        $user->endpoint->save();

        return [
            'status' => true
        ];
    }
}
