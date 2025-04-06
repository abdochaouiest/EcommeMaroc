<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    <form action="{{ route('register.save') }}" method="POST">
        @csrf

        <label for="name">Full Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required><br>

        <label for="cin">CIN (National ID):</label>
        <input type="text" name="cin" id="cin" value="{{ old('cin') }}"><br>

        <label for="primary_phone">Primary Phone:</label>
        <input type="text" name="primary_phone" id="primary_phone" value="{{ old('primary_phone') }}" required><br>

        <label for="additional_phone">Additional Phone:</label>
        <input type="text" name="additional_phone" id="additional_phone" value="{{ old('additional_phone') }}"><br>


        <label for="agreed_to_terms_and_privacy">
            <input type="checkbox" name="agreed_to_terms_and_privacy" id="agreed_to_terms_and_privacy" {{ old('agreed_to_terms_and_privacy') ? 'checked' : '' }}> I agree to the terms and privacy policy
        </label><br>

        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        </select><br>

        <button type="submit">Register</button>
    </form>

    <a href="{{ route('login') }}">Already have an account? Login</a>
</body>
</html>
