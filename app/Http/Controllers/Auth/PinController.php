<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PinController extends Controller
{
    protected $view = 'auth.pin';

    public function showForm()
    {
        return view($this->view);
    }

    public function verify(Request $request)
    {
        //@TODO
    }
}
