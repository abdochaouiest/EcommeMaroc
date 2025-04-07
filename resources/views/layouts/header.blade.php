<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

<div class="container">
    <a class="navbar-brand" href="index.html">Furni<span>.</span></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsFurni">
        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
            <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item {{ Request::routeIs('shop') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('shop') }}">Shop</a>
            </li>
            <li class="nav-item {{ Request::routeIs('aboutus') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('aboutus') }}">About us</a>
            </li>
            <li class="nav-item {{ Request::routeIs('services') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('services') }}">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="blog.html">Blog</a>
            </li>
            <li class="nav-item {{ Request::routeIs('contactus') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('contactus') }}">Contact us</a>
            </li>
        </ul>

        @guest
    <div class="custom-navbar-cta ms-5">
        <a class="btn btn-primary text-white me-2" href="{{ route('login') }}">Login</a>
        <a class="btn btn-secondary text-white me-2" href="{{ route('register') }}">Register</a>
    </div>
@endguest

@auth
    <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
        <li><a class="nav-link" href="#"><img src="{{ asset('images/user.svg') }}"></a></li>
        <li><a class="nav-link" href="{{ route('cart.index') }}"><img src="{{ asset('images/cart.svg') }}"></a></li>
    </ul>
@endauth
    </div>
</div>
    
</nav>