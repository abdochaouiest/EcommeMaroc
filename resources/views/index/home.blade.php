<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #343a40;
        }
        #search {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .product-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            width: 250px;
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .product-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }
        .cart {
            position: fixed;
            top: 0;
            right: -300px;
            width: 280px;
            height: 100vh;
            background: white;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2);
            padding: 20px;
            overflow-y: auto;
            transition: right 0.3s ease-in-out;
        }
        .cart.show {
            right: 0;
        }
        .cart h2 {
            text-align: left;
            color: #343a40;
        }
        .cart ul {
            list-style: none;
            padding: 0;
            text-align: left;
        }
        .cart ul li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn-order, .btn-cart {
            background: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-order:hover, .btn-cart:hover {
            background: #218838;
        }
        .btn-remove {
            background: #dc3545;
            color: white;
            border: none;
            padding: 5px;
            cursor: pointer;
            border-radius: 3px;
        }
        .btn-remove:hover {
            background: #c82333;
        }
        .cart-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .cart-toggle:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <a href="{{route('login')}}">Login</a>
    <a href="{{route('register')}}">Register</a>
    <input type="text" id="search" placeholder="Search products..." onkeyup="searchProducts()">
    
    <button class="cart-toggle" onclick="toggleCart()">🛒 View Cart</button>

    <div class="product-container" id="products">
        @foreach($products as $product)
            <div class="product-card" data-category="{{ $product->category_id }}">
                <img src="{{ $product->photo }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>Price: {{ $product->price }} MAD</p>
                <form method="POST" action="{{ route('cart.add', $product->id) }}">
                    @csrf
                    <input type="number" name="quantity" value="1" min="1">
                    <button type="submit" class="btn-order">Add to Cart</button>
                </form>
            </div>
        @endforeach
    </div>

    <script>
        function searchProducts() {
            const searchValue = document.getElementById("search").value.toLowerCase();
            const products = document.querySelectorAll(".product-card");
            products.forEach(product => {
                const productName = product.querySelector("h3").textContent.toLowerCase();
                product.style.display = productName.includes(searchValue) ? "block" : "none";
            });
        }

        function toggleCart() {
            const cart = document.getElementById("cart");
            cart.classList.toggle("show");
        }
    </script>
</body>
</html>
