<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontstyles.css') }}">

</head>

<body>

    <!-- Navigation Bar (Header) -->
    <header class="navbar">
        <div class="logo-container">
            <!-- Logo Image placed in the navbar -->
            <img src="{{ asset('images/jru-logo.png') }}" alt="Site Logo" class="logo">
        </div>
    </header>

    <!-- Main Content (Signup Form) -->

    @if ($errors->any())
    <div class="error-box">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form method="POST" action="{{ route('signup.submit') }}">
    @csrf

    <h3 class="normal">Create your <span class="husayhub">HusayHub</span> Account</h3>

    <div class="input-container">
        <input type="text" name="jru_id" id="jru_id" placeholder=" " required pattern="^\d{2}-\d{6}$" title="Please enter ID in the format: 00-000000">
        <label for="jru_id">Enter JRU ID</label>
        <span class="format-hint">00-000000</span>
        @error('jru_id')
            <small class="error">{{ $message }}</small>
        @enderror
    </div>

    <div class="input-container">
        <input type="email" name="email" id="email" placeholder=" " required>
        <label for="email">Enter Email</label>
        @error('email')
            <small class="error">{{ $message }}</small>
        @enderror
    </div>

    <div class="input-container">
    <input type="password" name="password" id="password" placeholder=" " required>
    <label for="password">Enter Password</label>
    <span class="toggle-password" data-target="password">
        <i class="fa fa-eye-slash"></i> <!-- Default to eye icon -->
    </span>
    @error('password')
        <small class="error">{{ $message }}</small>
    @enderror
</div>

<div class="input-container">
    <input type="password" name="password_confirmation" id="confirm_password" placeholder=" " required>
    <label for="confirm_password">Confirm Password</label>
    <span class="toggle-password" data-target="confirm_password">
        <i class="fa fa-eye-slash"></i> <!-- Default to eye icon -->
    </span>
</div>


    <button type="submit" aria-label="Sign Up for an account">Sign Up</button>
</form>

@vite(['resources/js/togglePassword.js'])

</body>
</html>
