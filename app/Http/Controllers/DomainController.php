<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DomainController extends Controller
{
    /**
     * show the form to create domain.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('dashboard.setup-domain');
    }

    /**
     * Create a new domain to validate submission on users'
     * endpoint.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $this->validateRequest($request);
        $data = $request->only(['name', 'email_from', 'email_subject', 'email_primary', 'email_secondary']);

        // Create the domain on their endpoint
        Auth::user()->endpoint
            ->domains()
            ->create(array_merge(
                $data,
                ['is_active' => $request->get('is_active', 1)]
            ));

        session()->flash('domain-created', true);
        return redirect()->route('setup-domain');
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {

    }

    /**
     * Validates the creation request form.
     *
     * @param Request $request
     * @return mixed
     */
    protected function validateRequest(Request $request)
    {
        return $request->validate([
            'name' => 'required|unique:domains',
            'email_from' => 'required',
            'email_subject' => 'required',
            'email_primary' => 'required|email',
            'email_secondary' => '',
            'is_active' => 'required',
        ]);
    }
}
