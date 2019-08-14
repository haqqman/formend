<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        /*
         * Aggregate statistical report on dashboard.
         * */
        $statistic = [
            'active_domain' => $user->endpoint->domains()
                ->where('is_active', true)
                ->count(),

            'inactive_domain' => $user->endpoint->domains()
                ->where('is_active', false)
                ->count(),

            'submissions' => 3420,
        ];

        return view('dashboard.index')
            ->with('user', $user)
            ->with('statistic', $statistic);
    }
}
