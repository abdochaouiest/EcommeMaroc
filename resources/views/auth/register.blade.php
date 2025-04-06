<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Use Laravel's asset() helper for CSS -->
    <link rel="stylesheet" href="{{ asset('Auth/style.css') }}">
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">Create Account</h1>
        <p style="text-align: center;">Sign up for your account</p>
        <form id="registerForm" method="POST" action="{{ route('register.save') }}">
            @csrf <!-- Laravel's CSRF protection -->
            <div class="form-group" style="display: flex; gap: 10px;">
                <div style="flex: 1;">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div style="flex: 1;">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
    </div>
    <!-- Use Laravel's asset() helper for JavaScript -->
    <script src="{{ asset('Auth/script.js') }}"></script>
</body>
</html>