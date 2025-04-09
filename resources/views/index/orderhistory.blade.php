@extends('layouts.app')
@section('contents')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - ShopEase</title>
    <link href="{{ asset('index/css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <main>
        <section class="page-header">
            <div class="container">
                <h1>My Orders</h1>
            </div>
        </section>

        <section class="orders-section">
            <div class="container">
                <form method="GET" action="{{ route('orders') }}">
                    <div class="orders-filters">
                        <div class="orders-search">
                            <input type="text" name="search" placeholder="Search by order number..." 
                                   value="{{ request('search') }}">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                        <div class="orders-filter">
                            <label for="order-status">Filter by Status:</label>
                            <select id="order-status" name="status" onchange="this.form.submit()">
                                <option value="all" {{ request('status') == 'all' || !request('status') ? 'selected' : '' }}>All Orders</option>
                                <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                    </div>
                </form>

                <div class="orders-list">
                    @foreach ($orders as $order)
                        <!-- Order Item -->
                        <div class="order-card">
                            <div class="order-header">
                                <div class="order-id">
                                    <span>Order #</span>
                                    <strong>{{ $order->order_number }}</strong>
                                </div>
                                <div class="order-date">
                                    <span>Placed on</span>
                                    <strong>{{ $order->created_at->format('F j, Y') }}</strong>
                                </div>
                                <div class="order-total">
                                    <span>Total</span>
                                    <strong>${{ number_format($order->total, 2) }}</strong>
                                </div>
                                <div class="order-status {{ strtolower($order->status) }}">
                                    <span>Status</span>
                                    <strong>{{ ucfirst($order->status) }}</strong>
                                </div>
                            </div>
                
                            <div class="order-content">
                                <div class="order-items">
                                    @forelse ($order->items as $item)
                                        <div class="order-item">
                                            <div class="order-item-image">
                                                <img src="{{ $item->product->photo ?? 'https://via.placeholder.com/100' }}" 
                                                     alt="{{ $item->product->name ?? 'Product' }}">
                                            </div>
                                            <div class="order-item-details">
                                                <h4>{{ $item->product->name ?? 'Unnamed Product' }}</h4>
                                                <p>Price: ${{ number_format($item->price, 2) }} | Quantity: {{ $item->quantity }}</p>
                                            </div>
                                        </div>
                                    @empty
                                        <p>No items in this order.</p>
                                        <div class="order-item">
                                            <div class="order-item-image">
                                                <img src="https://via.placeholder.com/100" alt="Placeholder Product">
                                            </div>
                                            <div class="order-item-details">
                                                <h4>Placeholder Product</h4>
                                                <p>Price: $19.99 | Quantity: 1</p>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                                <div class="order-actions">
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-small">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="pagination">
                    {{ $orders->appends(request()->query())->links() }}
                </div>
            </div>
        </section>
    </main>

    <script>
        document.querySelector('input[name="search"]').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                this.form.submit();
            }
        });
    </script>
</body>
</html>
@endsection