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
            'pin' => 'confirmed'
        ]);

        $user = Auth::user();
        $enablePinOrNot = $request->has('enable_pin')
            ? true
            : false;

        if ($data['pin']) {
            $user->pin = Hash::make($data['pin']);
            $user->save();
        }

        session()->flash('settings.updated', 'PIN changes successfully updated!');
        /*
         * We don't want PIN verification to be enabled if the PIN column is
         * null or the PIN input is null.
         * */
        $this->twoStepAuth($enablePinOrNot, $data['pin'] || $user->pin);
        return redirect()->back();
    }


    /**
     * Update the Enable Two Step Auth via PIN option.
     *
     * @param bool $option
     * @param bool $shouldUpdate
     *
     * @return boolean
     */
    public function twoStepAuth(bool $option, bool $shouldUpdate)
    {
        $user = Auth::user();

        if ($shouldUpdate) {
            $user->options->enable_pin = $option;
            $user->options->save();
            return true;
        }
        session()->flash('settings.updated', 'No changes was made.');
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
