<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome User</h1>
    <p>You have limited access. Feel free to explore your profile and orders.</p>

    <a href="">View Profile</a>
    <a href="">View Orders</a>

    <a href="{{ route('logout') }}">Logout</a>
    @yield('content')
</body>
</html>