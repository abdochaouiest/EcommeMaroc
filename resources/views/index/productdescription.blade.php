@extends('layouts.app')
  
@section('title', 'ProdcutDescription')
  
@section('contents')
  <!-- Start Hero Section -->
  <div class="hero">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-5">
          <div class="intro-excerpt">
            <h1>Product Description</h1>
          </div>
        </div>
        <div class="col-lg-7">
          
        </div>
      </div>
    </div>
  </div>
  <!-- End Hero Section -->

  <!-- Start Product Detail Section -->
  <div class="product-details-section">
    <div class="container">
      <a href="{{ route('shop') }}" class="back-to-shop">
        <i class="fa fa-chevron-left me-2"></i> Back to Products
      </a>
      
      <div class="row">
        <div class="col-lg-6">
          <div class="product-detail-img mb-4">
            <img src="images/product-1.png" alt="Premium Leather Backpack" class="img-fluid" id="mainImage">
          </div>
        </div>
        
        <div class="col-lg-6">
          <div class="ps-lg-4">
            <span class="d-block text-secondary text-uppercase mb-2">ACCESSORIES</span>
            <h2 class="mb-4">{$product->name}</h2>
            <p class="h4 mb-4">${$product->prix}</p>
            
            <p class="mb-4">Handcrafted leather backpack with ample storage space and premium finishes. Made from full-grain leather that ages beautifully over time, this backpack features multiple compartments including a padded laptop sleeve, water bottle pockets, and hidden security pockets. The adjustable straps are padded for comfort during extended wear. Perfect for daily commutes, travel, or weekend adventures.</p>
            
            <div class="quantity-selector mb-4">
              <label class="form-label">Quantity</label>
              <div class="quantity-controls">
                <button class="quantity-btn" onclick="decrementQuantity()">-</button>
                <input type="number" class="quantity-input" id="quantity" value="1" min="1">
                <button class="quantity-btn" onclick="incrementQuantity()">+</button>
              </div>
            </div>
            
            <div class="d-flex mb-4">
              <button class="btn btn-primary py-3 px-4 me-3" onclick="addToCart()">
                <i class="fa fa-shopping-cart me-2"></i> Add to Cart
              </button>
              <button class="wishlist-btn" onclick="toggleWishlist()">
                <i class="fa fa-heart heart-icon" id="wishlistIcon"></i>
              </button>
            </div>
            
            <div class="details-section">
              <div class="row mb-3">
                <div class="col-md-3">
                  <strong>Shipping</strong>
                </div>
                <div class="col-md-9">
                  Free shipping on orders over $50. Estimated delivery: 3-5 business days.
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-3">
                  <strong>Returns</strong>
                </div>
                <div class="col-md-9">
                  30-day return policy. See our <a href="#">return policy</a> for more details.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Product Detail Section -->

  
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/tiny-slider.js"></script>
  <script src="js/custom.js"></script>
  
  <script>
    function changeImage(src, thumbnail) {
      document.getElementById('mainImage').src = src;
      
      // Remove active class from all thumbnails
      const thumbnails = document.querySelectorAll('.product-thumbnail');
      thumbnails.forEach(thumb => {
        thumb.classList.remove('active');
      });
      
      // Add active class to the clicked thumbnail
      thumbnail.classList.add('active');
    }
    
    function incrementQuantity() {
      const quantityInput = document.getElementById('quantity');
      quantityInput.value = parseInt(quantityInput.value) + 1;
    }
    
    function decrementQuantity() {
      const quantityInput = document.getElementById('quantity');
      if (parseInt(quantityInput.value) > 1) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
      }
    }
    
    function addToCart() {
      const quantity = document.getElementById('quantity').value;
      alert(`Added ${quantity} Premium Leather Backpack(s) to your cart!`);
      // Here you would normally handle the cart logic with AJAX or form submission
    }
    
    function toggleWishlist() {
      const wishlistIcon = document.getElementById('wishlistIcon');
      wishlistIcon.classList.toggle('filled');
      
      if (wishlistIcon.classList.contains('filled')) {
        alert('Added to your wishlist!');
      } else {
        alert('Removed from your wishlist!');
      }
      // Here you would normally handle the wishlist logic with AJAX
    }
  </script>

@endsection
