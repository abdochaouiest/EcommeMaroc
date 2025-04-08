<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Use Laravel's asset() helper for CSS -->
    <link rel="stylesheet" href="{{ asset('Auth/style.css') }}">
    <style>
        .container {
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-group input {
            width: calc(100% - 20px); /* Adjust width to account for padding */
            padding: 10px;
            margin: 0 auto;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: block;
        }
    </style>
</head>
<body>
    
    <div class="container">
    <h1 style="text-align: center;">Welcome Back</h1>
    <p style="text-align: center;">Please sign in to your account</p>
        <form id="loginForm" method="POST" action="{{ route('login.action') }}">
            @csrf <!-- Laravel's CSRF protection -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
    </div>

    {{-- <script src="{{ asset('Auth/script.js') }}"></script> --}}
</body>
</html>