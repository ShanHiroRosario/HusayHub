<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/styles.css">
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

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="enter email" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="enter password">
        <br>

        <button type="submit">Login</button>
    <p> Don't have an account? <a href="{{ route('signup.form') }}">Sign up here</a>.</p>

    </form>

</body>
</html>
