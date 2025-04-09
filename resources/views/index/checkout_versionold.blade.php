@extends('layouts.app')

@section('title', 'Checkout')

@section('contents')
<section class="page-header">
    <div class="container">
        <h1>Checkout</h1>
    </div>
</section>
<section class="checkout-section">
    <div class="container">
        <div class="checkout-content">
            <div class="checkout-form-container">
                <div >
                    <h2>Review Your Order</h2>
                    <div class="review-sections">
                        <div class="review-section">
                            <div class="review-header">
                                <h3>Shipping Information</h3>
                                <a href="" class="btn-link edit-button">Edit</a>
                            </div>
                            <div class="review-content">
                                <p><strong>{{ $shippingAddress->first_name }} {{ $shippingAddress->last_name }}</strong></p>
                                <p>{{ $shippingAddress->address_line1 }} @if($shippingAddress->address_line2), {{ $shippingAddress->address_line2 }} @endif</p>
                                <p>{{ $shippingAddress->city }}, {{ $shippingAddress->state }} {{ $shippingAddress->zip }}</p>
                                <p>{{ $shippingAddress->country_name }}</p>
                                <p>Phone: {{ $shippingAddress->phone }}</p>
                            </div>
                        </div>
                        <div class="review-section">
                            <div class="review-header">
                                <h3>Order Items</h3>
                            </div>
                            <div class="review-content">
                                <div class="review-items">
                                    @foreach($cartItems as $item)
                                    <div class="review-item">
                                        <div class="review-item-image">
                                            <img src="{{ $item->product->photo }}" alt="{{ $item->product->name }}">
                                        </div>
                                        <div class="review-item-details">
                                            <h4>{{ $product->name}}</h4>
                                            <p>Qty: {{ $item->quantity }}</p>
                                            @if($item->color || $item->size)
                                            <p>
                                                @if($item->color)Color: {{ $item->color }}@endif
                                                @if($item->size) | Size: {{ $item->size }}@endif
                                            </p>
                                            @endif
                                            <p class="review-item-price">${{ number_format($item->product->price * $item->quantity, 2) }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="place-order-form" action="{{ route('paypal.create') }}" method="POST">
                        @csrf
                        <div class="form-actions">
                            <button class="btn btn-secondary prev-step" data-prev="payment-step">Back to Cart</button>
                            <button type="submit" id="place-order-btn" class="btn btn-primary">Place Order</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="order-summary">
                <h2>Order Summary</h2>
                <div class="summary-items">
                    <div class="summary-item">
                        <span>Items ({{ $cartItems->sum('quantity') }}):</span>
                        <span>${{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="summary-item">
                        <span>Shipping:</span>
                        <span id="shipping-cost">${{ number_format($shippingCost, 2) }}</span>
                    </div>
                    <div class="summary-item">
                        <span>Tax:</span>
                        <span>${{ number_format($tax, 2) }}</span>
                    </div>
                </div>
                <div class="summary-total">
                    <span>Order Total:</span>
                    <span id="order-total">${{ number_format($total, 2) }}</span>
                </div>
                <div class="order-details">
                    <div class="order-items-preview">
                        <h3>In Your Cart <span>({{ $cartItems->count() }})</span></h3>
                        <div class="preview-items">
                            @foreach($cartItems as $item)
                            <div class="preview-item">
                                <img src="{{ $item->product->photo }}" alt="{{ $item->product->name }}">
                                <div class="preview-item-info">
                                    <p>{{ $item->product->name }}</p>
                                    <span>${{ number_format($item->product->price, 2) }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="secure-checkout">
                    <div class="secure-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <p>Your payment is secure. Your personal information is protected with industry-standard encryption.</p>
                </div>
                <div class="supported-payment">
                    <p>We Accept:</p>
                    <div class="payment-icons">
                        <i class="fab fa-cc-visa"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-cc-amex"></i>
                        <i class="fab fa-cc-paypal"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <div class="modal" id="order-success-modal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h2>Order Placed Successfully!</h2>
        </div>
        <div class="modal-body">
            <p>Your order has been received and is being processed.</p>
            <div class="order-confirmation">
                <p>Order Number: <strong id="order-number-display"></strong></p>
                <p>A confirmation email has been sent to <strong>{{ Auth::user()->email }}</strong></p>
            </div>
            <div class="delivery-estimate">
                <h3>Estimated Delivery</h3>
                <p id="delivery-estimate-display"></p>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ route('dashboard.user') }}" class="btn btn-secondary">Continue Shopping</a>
        </div>
    </div>
</div> --}}

<script>
</script>
@endsection