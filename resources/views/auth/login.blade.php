<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>

<body>
    <h1>Login</h1>

    @if ($errors->has('message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $errors->first('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <form action="{{ route('login.action') }}" method="POST">
        @csrf


        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <label for="remember">Remember Me:</label>
        <input type="checkbox" name="remember" id="remember"><br>

        <button type="submit">Login</button>
    </form>

    <a href="{{ route('register') }}">Don't have an account? Register</a>
</body>


</html>
