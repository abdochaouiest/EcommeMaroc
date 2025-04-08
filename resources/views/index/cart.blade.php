@extends('layouts.app')
@section('title', 'Cart')
@section('contents')
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Cart</h1>
                </div>
            </div>
            <div class="col-lg-7">
                
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->



<div class="untree_co-section before-footer-section">
<div class="container">
  <div class="row mb-5">
      <div class="site-blocks-table">
        <table class="table">
          <thead>
            <tr>
              <th class="product-thumbnail">Image</th>
              <th class="product-name">Product</th>
              <th class="product-price">Price</th>
              <th class="product-quantity">Quantity</th>
              <th class="product-total">Total</th>
              <th class="product-remove">Remove</th>
            </tr>
          </thead>
          <tbody>
            @if ($cartItems->count())
            @foreach($cartItems as $item)
                <tr id="cart-item-{{ $item->id }}">
                    <td class="product-thumbnail">
                        <img src="{{ $item->product->photo }}" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                        <h2 class="h5 text-black">{{ $item->product->name }}</h2>
                    </td>
                    <td>${{ $item->product->price }}</td>
                    <td>
                
                      <button class="increment" data-id="{{ $item->id }}" data-action="increment" style="border: none;">+</button>
                    <span id="quantity-{{ $item->id }}">{{ $item->quantity }}</span>
                    <button class="decrement" data-id="{{ $item->id }}" data-action="decrement" style="border: none;">-</button>
                    </td>
                    <td id="total-{{ $item->id }}">${{ $item->product->price * $item->quantity }}</td>
                    <td>
                      <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="border: none;">X</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center text-muted py-5">
                    Your cart is empty.
                </td>
            </tr>
        @endif
          </tbody>
        </table>
      </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="row mb-5">
        <div class="col-md-6 mb-3 mb-md-0">
          <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-black btn-sm btn-block">Clear Cart</button>
        </form>
          
        </div>
        <div class="col-md-6">
          <a href="{{ route('shop') }}" class="btn btn-outline-black btn-sm btn-block">
            Continue Shopping
        </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <label class="text-black h4" for="coupon">Coupon</label>
          <p>Enter your coupon code if you have one.</p>
        </div>
        <div class="col-md-8 mb-3 mb-md-0">
          <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
        </div>
        <div class="col-md-4">
          <button class="btn btn-black">Apply Coupon</button>
        </div>
      </div>
    </div>
    <div class="col-md-6 pl-5">
      <div class="row justify-content-end">
        <div class="col-md-7">
          <div class="row">
            <div class="col-md-12 text-right border-bottom mb-5">
              <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <span class="text-black">Subtotal</span>
            </div>
            <div class="col-md-6 text-right">
              <strong class="text-black">$230.00</strong>
            </div>
          </div>
          <div class="row mb-5">
            <div class="col-md-6">
              <span class="text-black">Total</span>
            </div>
            <div class="col-md-6 text-right">
              <strong class="text-black">$230.00</strong>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='checkout.html'">Proceed To Checkout</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
        $(document).ready(function() {
            $('.increment').on('click', function() {
                const itemId = $(this).data('id');
                updateQuantity(itemId, 'increment');
            });

            $('.decrement').on('click', function() {
                const itemId = $(this).data('id');
                updateQuantity(itemId, 'decrement');
            });

            function updateQuantity(itemId, action) {
                $.ajax({
                    url: '/cart/update', 
                    method: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        item_id: itemId,
                        action: action
                    },
                    success: function(response) {
                        if (response.success) {
                            const newQuantity = response.new_quantity;
                            const newTotal = response.new_total;
                            $('#quantity-' + itemId).text(newQuantity);
                            $('#total-' + itemId).text(newTotal + ' MAD');
                        }
                    }
                });
            }
        });
</script>


@endsection