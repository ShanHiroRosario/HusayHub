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
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('signup.submit') }}">
    @csrf

    <h3 class="normal">Create your <span class="husayhub">HusayHub</span> Account</h2>
    <div class="input-container">
    <input type="text" name="id" id="id" placeholder=" " required pattern="^\d{2}-\d{6}$" title="Please enter ID in the format: 00-000000">
    <label for="id">Enter JRU ID</label>
    <span class="format-hint">00-000000</span>
    </div>

    <div class="input-container">
    <input type="email" name="email" id="email" placeholder=" " required>
    <label for="email">Enter Email</label>

    </div>

    <div class="input-container">
    <input type="password" name="password" id="password" placeholder=" " >
    <label for="password">Enter Password</label>
    </div>

    <div class="input-container">
    <input type="password" name="confirm_password" id="confirm_password" placeholder=" " required>
    <label for="confirm_password">Confirm Password</label>
    </div>

    <button type="submit">Sign Up</button>
</form>

@vite(['resources/js/app.js'])
</body>
</html>
