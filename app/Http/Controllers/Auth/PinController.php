<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PinController extends Controller
{
    /**
     * @var string
     */
    protected $view = 'auth.pin';

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showForm()
    {
        return view($this->view);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request)
    {
        $this->validatePin($request);
        $pin = $request->input('pin');
        $user = auth()->user();
        if (Hash::check($pin, $user->pin)) {
            return $this->handleAuthorization($request);
        }
        return $this->handleFailedPin();
    }

    /**
     * called when pin verification is successful.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function handleAuthorization(Request $request)
    {
        $request->session()->put('pin-verified', true);

        return redirect()
            ->intended(route('dashboard'));
    }

    /**
     * Handle failed pin verification.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function handleFailedPin()
    {
        return redirect()->route('pin-verification')
            ->withErrors([
                'authFailed' => true,
            ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    protected function validatePin(Request $request)
    {
        return $request->validate([
            'pin' => 'required|max:10'
        ]);
    }
}
