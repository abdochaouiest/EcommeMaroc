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
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="cin">CIN:</label>
                <input type="text" id="cin" name="cin" required>
            </div>
            <div class="form-group">
                <label for="primary_phone">Primary Phone:</label>
                <input type="text" id="primary_phone" name="primary_phone" required>
            </div>
            <div class="form-group">
                <label for="additional_phone">Additional Phone:</label>
                <input type="text" id="additional_phone" name="additional_phone">
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