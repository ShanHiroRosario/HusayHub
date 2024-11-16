<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class AuthController extends Controller
{
    public function showSignupForm()
    {
        return view('signup');
    }

    public function handleSignup(Request $request)
{
    // Validate the input fields
    $request->validate([
        'id' => ['required', 'regex:/^\d{2}-\d{6}$/'], // Matches format 00-000000
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8', 'confirmed'], // Confirmed matches "confirm_password"
        'verification_code' => ['nullable', 'digits:6'], // Validation for code during final submission
    ]);

    // Generate a verification code
    if (!$request->has('verification_code')) {
        $verificationCode = random_int(100000, 999999);

        // Simulate email sending
        Mail::raw("Your verification code is: $verificationCode", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Verification Code');
        });

        // Store verification code in session for validation
        session(['verification_code' => $verificationCode]);

        return back()->with('status', 'Verification code sent to your email.');
    }

    // Check verification code validity
    $isCodeValid = $request->verification_code == session('verification_code'); // Compare with session-stored code
    if (!$isCodeValid) {
        return back()->withErrors(['verification_code' => 'Invalid verification code.']);
    }

    // Create a new user record in the database
    User::create([
        'id' => $request->id, // Store the user ID
        'email' => $request->email, // Store the email
        'password' => Hash::make($request->password), // Hash the password for security
    ]);

    // Clear session-stored verification code
    session()->forget('verification_code');

    // Redirect the user with a success message
    return redirect('/')->with('success', 'Signup successful! You can now log in.');
}

    public function showLoginForm()
    {
        return view('login');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Use Laravel's built-in authentication
        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect('/')->with('success', 'Login successful!');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }



}

