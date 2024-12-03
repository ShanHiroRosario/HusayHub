<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Missing import for Auth
use App\Models\User;

class AuthController extends Controller
{
    // Show signup form
    public function showSignupForm()
    {
        return view('signup'); // Ensure you have the signup view
    }

    // Handle signup
    public function handleSignup(Request $request)
    {
        $request->validate([
            'jru_id' => ['required', 'regex:/^\d{2}-\d{6}$/', 'unique:users,jru_id'], // Ensure unique JRU ID
            'email' => ['required', 'email', 'unique:users,email'], // Ensure unique email
            'password' => ['required', 'min:8', 'confirmed'], // Password confirmation check
        ]);

        // Create new user
        User::create([
            'jru_id' => $request->jru_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to login form after signup
        return redirect()->route('login.form')->with('success', 'Signup successful! Please log in.');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('login'); // Ensure you have the login view
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

       
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('index'); // Redirect to the dashboard
        }
        
      

        
        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ]);
    }


    public function showDashboard()
{
    // Get the authenticated user
    $user = Auth::user();

    // Pass the user data to the view (index view)
    return view('index', compact('user'));
}


    // Handle logout (optional)
    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login.form')->with('success', 'Logged out successfully');
}

}
