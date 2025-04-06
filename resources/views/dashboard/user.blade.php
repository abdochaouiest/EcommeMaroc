<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background: #f5f5f5;
    text-align: center;
}

.container {
    width: 80%;
    background: white;
    padding: 20px;
    margin: 50px auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

h1 {
    color: #333;
}

input[type="text"] {
    width: 60%;
    padding: 10px;
    margin: 20px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.product-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.product {
    background: white;
    width: 200px;
    margin: 15px;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.product img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 5px;
}

.btn {
    display: inline-block;
}
    </style>
</head>
<body>
    <h1>Welcome User</h1>
    <p>You have limited access. Feel free to explore your profile and orders.</p>

    <a href="">View Profile</a>
    <a href="">View Orders</a>
    <a href="{{route('cart.index')}}">View Cart</a>

    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>🛍️ Nos Produits</h1>

        <input type="text" id="search" placeholder="🔍 Rechercher un produit..." onkeyup="searchProducts()">

        <div class="product-list">
            @foreach($products as $product)
                <div class="product" data-name="{{ strtolower($product->name) }}">
                    <img src="{{ $product->photo }}" alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                    <p>💰 {{ $product->price }} MAD</p>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn">🛒 Ajouter au panier</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function searchProducts() {
            const searchValue = document.getElementById("search").value.toLowerCase();
            const products = document.querySelectorAll(".product");
            products.forEach(product => {
                const productName = product.getAttribute("data-name");
                product.style.display = productName.includes(searchValue) ? "block" : "none";
            });
        }
    </script>
</body>
</html>

    <a href="{{ route('logout') }}">Logout</a>
    @yield('content')
</body>
</html>