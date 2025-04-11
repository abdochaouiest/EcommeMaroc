@extends('layouts.app')
@section('title', 'Shop')
@section('contents')
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Shop</h1>
                    <p class="mb-4">
                        @auth
                            Welcome back, {{ auth()->user()->name }}! Explore our latest products and find something you love.
                        @else
                            Welcome! Please log in to explore our latest products.
                        @endauth
                    </p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="images/product-6.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="orders-filters">
            <div class="orders-search">
                <input type="text" id="product-search" placeholder="Search products...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="orders-filter">
                <label for="category-filter">Filter by Category:</label>
                <select id="category-filter">
                    <option value="">All Categories</option>
                    <option value="office-chairs">Office Chairs</option>
                    <option value="ergonomic-chairs">Ergonomic Chairs</option>
                    <option value="recliners">Recliners</option>
                    <option value="gaming-chairs">Gaming Chairs</option>
                    <option value="dining-chairs">Dining Chairs</option>
                    <option value="outdoor-chairs">Outdoor Chairs</option>
                    <option value="accent-chairs">Accent Chairs</option>
                </select>
            </div>
        </div>
        <div class="row" id="products-container">
            @if ($products->count())
                @foreach ($products as $prod)
                    <div class="col-12 col-md-4 col-lg-3 mb-5 product-card" data-name="{{ strtolower($prod->name) }}" data-category="{{ strtolower($prod->category) }}">
                        <a class="product-item" href="{{ route('product.showuser', $prod->id) }}">
                            <img src="{{ $prod->photo }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">{{$prod->name}}</h3>
                            <strong class="product-price">${{$prod->price}}</strong>
                            <span class="icon-cross">
                                <img src="images/cross.svg" class="img-fluid">
                            </span>
                        </a>
                    </div> 
                @endforeach
            @else
                <div class="col-12">
                    <p>No products found.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('product-search');
    const categoryFilter = document.getElementById('category-filter');
    const productCards = document.querySelectorAll('.product-card');
    
    function filterProducts() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedCategory = categoryFilter.value.toLowerCase();
        
        productCards.forEach(card => {
            const productName = card.dataset.name;
            const productCategory = card.dataset.category;
            
            const matchesSearch = productName.includes(searchTerm);
            const matchesCategory = selectedCategory === '' || productCategory === selectedCategory;
            
            if (matchesSearch && matchesCategory) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
    
    searchInput.addEventListener('input', filterProducts);
    categoryFilter.addEventListener('change', filterProducts);
});
</script>
@endsection