<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontstyles.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Navigation Bar (Header) -->
  <header class="navbar">
        <div class="logo-container">
            <!-- Logo Image placed in the navbar -->
            <img src="{{ asset('images/jru-logo.png') }}" alt="Site Logo" class="logo">
        </div>
    </header>

    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <h1 class="sour-gummy-Title">
            <span class="husayhub">HusayHub</span>
        </h1>
        <div class="input-container">
            <input type="email" name="email" id="email" placeholder=" " required>
            <label for="email">Email</label>
        </div>

        <div class="input-container">
            <input type="password" name="password" id="password" placeholder=" " required>
            <label for="password">Password</label>
            <span class="toggle-password" data-target="password">
                <i class="fa fa-eye-slash"></i> <!-- Default to eye icon -->
            </span>
            @error('password')
            <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit">Login</button>
        <p> Don't have an account? <a href="{{ route('signup.form') }}">Sign up here</a>.</p>
    </form>

    @vite(['resources/js/togglePassword.js', 'resources/js/app.js'])

    <script>
        // Check if there's a success message in the session
        @if (session('success'))
            // If success message exists, show the popup
            alert('{{ session('success') }}');
        @endif
    </script>

</body>
</html>
