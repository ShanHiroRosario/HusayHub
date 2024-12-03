<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="{{ asset('js/dashboard.js') }}"></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-left">
            <a href="#" id="home-link">Home</a>
        </div>
        <div class="navbar-right">
            <a href="#" id="settings-link">Settings</a>
            <button id="logout-button">Logout</button>
        </div>
    </nav>

    <!-- Posts Feed -->
    <div id="post-feed" class="post-feed">
        <!-- Posts will be dynamically loaded here -->
    </div>

    <!-- Settings Section (hidden by default) -->
    <div id="settings-section" class="settings-section hidden">
        <h2>User Settings</h2>
        <form id="settings-form">
            <label for="username">Change Username:</label>
            <input type="text" id="username" name="username" placeholder="New Username">
            <button type="submit">Save</button>
        </form>
    </div>
</body>
</html>
