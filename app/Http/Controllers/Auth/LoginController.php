<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends Controller
{
    use ThrottlesLogins;

    /**
     * where to go after successful login
     * @var string
     */
    protected $redirectTo = '/console';

    /**
     * where to go after a logout.
     * @var string
     */
    protected $logoutRedirectTo = '/login';

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['logout']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view($this->view());
    }

    /**
     * The blade file of the login view.
     * @return string
     */
    protected function view()
    {
        return 'auth.login';
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        // Validate the login information sent.
        $credentials = $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return redirect()->intended($this->redirectTo);
        }

        $this->incrementLoginAttempts($request);
        return $this->handleFailedLoginAttempt($request);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth::logout();
        session()->flash('loggedOut', true);
        return redirect($this->logoutRedirectTo);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function handleFailedLoginAttempt(Request $request)
    {
        return redirect()
            ->back()
            ->withErrors([
                'authFailed' => true,
            ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendLockoutResponse(Request $request)
    {
        return redirect()
            ->back()
            ->withErrors([
                'tooManyLoginAttempts' => true,
            ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    protected function validateLogin(Request $request)
    {
        return $request->validate([
            $this->username() => 'required',
            'password' => 'required'
        ]);
    }

    /**
     * field to pick as username
     * @return string
     */
    protected function username()
    {
        return 'email';
    }
}
