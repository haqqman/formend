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
        // We also need domain names to be unique.
        $this->validateRequest($request, ['name' => 'required|unique:domains',]);

        $data = $request->only(['name', 'email_from', 'email_subject', 'email_primary', 'email_secondary']);

        // Create the domain on their endpoint
        $is_active = $request->get('is_active', 1) == 1 ? true : false;
        Auth::user()->endpoint
            ->domains()
            ->create(array_merge(
                $data,
                ['is_active' => $is_active]
            ));

        session()->flash('domain-created', true);
        return redirect()->route('setup-domain');
    }

    public function list()
    {
        $domains = Auth::user()->endpoint->domains;
        return view('dashboard.manage-domain')
            ->with('domains', $domains);
    }

    public function showUpdateForm($id)
    {
        $domain = Auth::user()->endpoint->domains()->findOrFail($id);

        return view('dashboard.setup-domain')
            ->with('domain', $domain);
    }


    public function update(Request $request, $id)
    {
        $domain = Auth::user()->endpoint->domains()->findOrFail($id);
        $this->validateRequest($request);

        $data = $request->except(['_token']);
        $domain->update($data);
        session()->flash('domain-updated', true);

        return redirect()->route('setup-domain');

    }

    /**
     * Validates the creation request form.
     *
     * @param Request $request
     * @param $extra array additional options to check for.
     * @return mixed
     */
    protected function validateRequest(Request $request, $extra = [])
    {
        return $request->validate(array_merge([
            'email_from' => 'required',
            'email_subject' => 'required',
            'email_primary' => 'required|email',
            'email_secondary' => '',
            'is_active' => 'required',
        ], $extra));
    }
}
