<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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

    <label for="id">Enter ID:</label>
    <input type="text" name="id" id="id" placeholder="00-000000" required>
    <br>

    <label for="email">Enter Email:</label>
    <input type="email" name="email" id="email" placeholder="@my.jru.edu" required>
    <br>

    <label for="password">Enter Password:</label>
    <input type="password" name="password" id="password" placeholder="password" required>
    <br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" id="confirm_password" placeholder="confirm password" required>
    <br>

    <!-- Wrapper for the button and label -->
    <div class="send-code-wrapper">
        <button type="button" id="send-code">Send Code</button>
        <input type="text" name="verification_code" id="verification_code" placeholder="Verification Code" required>
    </div>
    <br>

    <button type="submit">Sign Up</button>
</form>

<script>
    document.getElementById('send-code').addEventListener('click', function () {
        alert('Verification code sent to your email! (Simulate via backend later)');
    });
</script>

</body>
</html>
