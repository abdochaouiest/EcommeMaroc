<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="index.html">EcommeMaroc<span>.</span></a>
        
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
            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5 header-icons ">
                <li ><a href="{{ route('profil.show') }}" class="nav-link" title="My Profile"><i class="fas fa-user"></i></a></li>
                <li><a href="" class="nav-link" title="My Orders"><i class="fas fa-box"></i></a></li>
            <li>
                <a href="{{ route('cart.index') }}" class="cart-icon nav-link" title="Shopping Cart">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">0</span>
                </a>
            </li>
            </ul>
        @endauth
            </div>
        </div>
            
        </nav>
</body>
</html>