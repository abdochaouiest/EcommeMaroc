<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Order Page</title>
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
            margin-top: 30px;
            padding: 15px;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: inline-block;
            min-width: 250px;
        }
        .cart ul {
            list-style: none;
            padding: 0;
        }
        .cart ul li {
            padding: 5px;
            border-bottom: 1px solid #ddd;
        }
        .btn-order {
            background: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-order:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <h1>Product List</h1>
    <a href="{{route('login')}}">login</a>
    <a href="{{route('register')}}">register</a>
    
    <input type="text" id="search" placeholder="Search products..." onkeyup="searchProducts()">
    
    <div class="product-container" id="products">
        @foreach($products as $product)
            <div class="product-card" data-category="{{ $product->category_id }}">
                <img src="{{ $product->photo }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>Price: {{ $product->price }} MAD</p>
                <button class="btn-order" onclick="orderProduct('{{ $product->name }}', '{{ $product->price }}')">Order</button>
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
    </script>
</body>
</html>
