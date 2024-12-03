<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Debugging: Ensure user is not null
        if (!$user) {
            abort(403, 'Unauthorized');
        }

        return view('index', ['user' => $user]);
    }
}

