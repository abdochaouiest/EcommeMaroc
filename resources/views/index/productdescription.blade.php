@extends('layouts.app')
  
@section('title', 'ProdcutDescription')
  
@section('contents')

@if(session('message'))
    <div class="alert alert-{{ session('message_type') }} alert-dismissible show" id="message" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

  <div class="hero">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-5">
          <div class="intro-excerpt">
            <h1>Product Description</h1>
            <p><a href="{{route("shop")}}" class="btn btn-secondary me-2">< Back To Shop</a></p>
          </div>
        </div>
        <div class="col-lg-7">
          
        </div>
      </div>
    </div>
  </div>
  <div class="product-details-section">
    <div class="container">   
      <div class="row">
        <div class="col-lg-6">
          <div class="product-detail-img mb-4">
            <img src="{{$product->photo}}" alt="Premium Leather Backpack" class="img-fluid" id="mainImage">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="ps-lg-4">
            <h2 class="mb-4">{{$product->name}}</h2>
            <p class="h4 mb-4">${{$product->price}}</p>
            
            <p class="mb-4">{{$product->description}}</p>
            
            <div class="quantity-selector mb-4">
              <label class="form-label">Quantity</label>
              <div class="quantity-controls">
                <button class="quantity-btn" onclick="decrementQuantity()">-</button>
                <input type="number" class="quantity-input" id="quantity" value="1" min="1">
                <button class="quantity-btn" onclick="incrementQuantity()">+</button>
              </div>
            </div>
            
            <div class="d-flex mb-4">
              <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <input type="hidden" name="quantity" id="hiddenQuantity" value="1">
                <button type="submit" class="btn btn-primary py-3 px-4 me-3">
                    <i class="fa fa-shopping-cart me-2"></i> Add to Cart
                </button>
              </form>
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


  
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/tiny-slider.js"></script>
  <script src="js/custom.js"></script>
  
  <script>
    function changeImage(src, thumbnail) {
      document.getElementById('mainImage').src = src;
      
      const thumbnails = document.querySelectorAll('.product-thumbnail');
      thumbnails.forEach(thumb => {
        thumb.classList.remove('active');
      });
      
      thumbnail.classList.add('active');
    }
    
    const quantityInput = document.getElementById('quantity');
  const hiddenQuantity = document.getElementById('hiddenQuantity');

  quantityInput.addEventListener('input', function () {
    hiddenQuantity.value = quantityInput.value;
  });

  function incrementQuantity() {
    quantityInput.value = parseInt(quantityInput.value) + 1;
    hiddenQuantity.value = quantityInput.value;
  }

  function decrementQuantity() {
    if (parseInt(quantityInput.value) > 1) {
      quantityInput.value = parseInt(quantityInput.value) - 1;
      hiddenQuantity.value = quantityInput.value;
    }
  }
    setTimeout(function() {
    const message = document.getElementById('message');
    if (message) {
      message.classList.add('fade');
      setTimeout(function() {
        message.remove(); 
      }, 500); 
    }
  }, 3000);
  </script>

@endsection
