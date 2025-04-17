@include('flash::message')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order #{{ $order->order_number }} - Admin Panel</title>


    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3b5d50;
            --secondary-color: #3b5d50;
            --success-color: #4cc9f0;
            --danger-color: #f8961e;
            --warning-color: #f8961e;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --border-radius: 0.5rem;
            --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        a{
            text-decoration: none;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fb;
            color: #333;
            line-height: 1.6;
        }

        .container-fluid {
            padding: 40px;
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            transition: var(--transition);
            margin-bottom: 2rem;
            background-color: white;
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
            padding: 1.25rem 1.5rem;
            border-bottom: none;
        }

        .card-header h4 {
            font-weight: 600;
            margin-bottom: 0;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Badge Styles */
        .badge {
            font-weight: 500;
            padding: 0.5rem 0.75rem;
            border-radius: 50px;
            font-size: 0.8rem;
            text-transform: capitalize;
        }

        .bg-primary { background-color: var(--primary-color); }
        .bg-success { background-color: var(--success-color); }
        .bg-danger { background-color: var(--danger-color); }
        .bg-warning { background-color: var(--warning-color); }

        /* Table Styles */
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table th {
            background-color: #f8f9fa;
            color: #495057;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            padding: 0.75rem;
            vertical-align: top;
            border-bottom: 2px solid #dee2e6;
        }

        .table td {
            padding: 0.75rem;
            vertical-align: middle;
            border-top: 1px solid #dee2e6;
            text-align: center
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .table-active {
            background-color: rgba(0, 0, 0, 0.05);
        }

        /* Button Styles */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            line-height: 1.5;
            border-radius: var(--border-radius);
            transition: var(--transition);
            cursor: pointer;
        }

        .btn-primary {
            color: #fff;
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-outline-secondary {
            color: #6c757d;
            border-color: #6c757d;
            background-color: transparent;
        }

        .btn-outline-secondary:hover {
            color: #fff;
            background-color: #3b5d50;
            border-color: #6c757d;
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
            background-color: transparent;
        }

        .btn-outline-primary:hover {
            color: #fff;
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Avatar Styles */
        .avatar {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            background-color: var(--primary-color);
            color: white;
            border-radius: 50%;
        }

        /* Timeline Styles */
        .timeline {
            position: relative;
            padding-left: 1.5rem;
        }

        .timeline li {
            position: relative;
            padding-bottom: 1rem;
            margin-bottom: 1rem;
            border-left: 2px solid var(--primary-color);
            padding-left: 1.5rem;
        }

        .timeline li:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .timeline li::before {
            content: "";
            position: absolute;
            left: -9px;
            top: 0;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background-color: var(--primary-color);
            border: 3px solid white;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .col-lg-8, .col-lg-4 {
                width: 100%;
            }
            
            .row {
                flex-direction: column;
            }
        }

        /* Utility Classes */
        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .align-items-center {
            align-items: center;
        }

        .mb-0 { margin-bottom: 0 !important; }
        .mb-1 { margin-bottom: 0.25rem !important; }
        .mb-2 { margin-bottom: 0.5rem !important; }
        .mb-3 { margin-bottom: 1rem !important; }
        .mb-4 { margin-bottom: 1.5rem !important; }
        .mb-5 { margin-bottom: 2rem !important; }

        .me-1 { margin-right: 0.25rem !important; }
        .me-2 { margin-right: 0.5rem !important; }
        .me-3 { margin-right: 1rem !important; }

        .text-muted { color: #6c757d !important; }
        .text-end { text-align: end !important; }

        .rounded { border-radius: 0.25rem !important; }
        .rounded-circle { border-radius: 50% !important; }

        .shadow-sm { box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important; }

        .list-unstyled {
            padding-left: 0;
            list-style: none;
        }

        .border-bottom {
            border-bottom: 1px solid #dee2e6 !important;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        /* Custom Section Styles */
        .section-title {
            font-weight: 600;
            color: var(--dark-color);
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        address {
            font-style: normal;
            line-height: 1.6;
        }
        .col-md-6 p{
            margin-bottom: 20px;
        }

        .order-totals table {
            font-size: 0.9rem;
            width: 100%;
        }

        .order-totals table td {
            padding: 0.5rem;
        }

        /* Product Image Styles */
        .product-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Order #{{ $order->order_number }}</h4>
                    <div>
                        <span class="badge bg-{{ $order->status === 'delivered' ? 'success' : ($order->status === 'pending' ? 'warning' : 'danger') }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <!-- Order Information Column -->
                    <div class="col-lg-8">
                        <div class="order-details-section mb-5">
                            <h5 class="section-title">Order Items</h5>
                            
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Product</th>
                                            <th>Unit Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->orderItems as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($item->product->image)
                                                    <img src="{{ asset('storage/'.$item->product->image) }}" 
                                                         class="product-img me-3" 
                                                         alt="{{ $item->product->name }}">
                                                    @endif
                                                    <div>
                                                        <h6 class="mb-0">{{ $item->product->name }}</h6>
                                                        <small class="text-muted">Product ID: {{ $item->product_id }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>${{ number_format($item->price, 2) }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="order-totals mt-4">
                                <div class="row">
                                    <div class="col-md-6 offset-md-6">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td class="text-end"><strong>Subtotal:</strong></td>
                                                <td>${{ number_format($order->subtotal, 2) }}</td>
                                            </tr>
                                            @if($order->discount > 0)
                                            <tr>
                                                <td class="text-end"><strong>Discount:</strong></td>
                                                <td>-${{ number_format($order->discount, 2) }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td class="text-end"><strong>Shipping:</strong></td>
                                                <td>${{ number_format($order->shipping_cost, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-end"><strong>Tax:</strong></td>
                                                <td>${{ number_format($order->tax, 2) }}</td>
                                            </tr>
                                            <tr class="table-active">
                                                <td class="text-end"><strong>Grand Total:</strong></td>
                                                <td><strong>${{ number_format($order->total, 2) }}</strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Payment Information -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Payment Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
                                        <p><strong>Payment Status:</strong> 
                                            <span class="badge bg-{{ $order->payment_status === 'paid' ? 'success' : 'danger' }}">
                                                {{ ucfirst($order->payment_status) }}
                                            </span>
                                        </p>
                                        @if($order->paypal_payment_id)
                                        <p><strong>PayPal ID:</strong> {{ $order->paypal_payment_id }}</p>
                                        @endif
                                        <p><strong>Order Type:</strong> {{ ucfirst($order->type) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Customer Information Column -->
                    <div class="col-lg-4">
                        <!-- Customer Card -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Customer Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar me-3">
                                        {{ substr($order->user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $order->user->name }}</h6>
                                        <small class="text-muted">CIN: {{ $order->user->cin }}</small>
                                    </div>
                                </div>
                                
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="fas fa-envelope me-2 text-muted"></i>
                                        {{ $order->user->email }}
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-phone me-2 text-muted"></i>
                                        {{ $order->user->primary_phone }}
                                    </li>
                                    @if($order->user->additional_phone)
                                    <li class="mb-2">
                                        <i class="fas fa-phone-alt me-2 text-muted"></i>
                                        {{ $order->user->additional_phone }}
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Shipping Address -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Shipping Details</h5>
                            </div>
                            <div class="card-body">
                                <address class="mb-0">
                                    <strong>{{ $order->address }}<br></strong><br>
                                    {{ $order->city }}, {{ $order->state }}<br>
                                    {{ $order->zip }}, {{ $order->country }}<br>
                                </address>
                            </div>
                        </div>
                        
                        <!-- Order Timeline -->
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Order Timeline</h5>
                            </div>
                            <div class="card-body">
                                <ul class="timeline">
                                    <li class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Order Placed</span>
                                            <small class="text-muted">{{ $order->created_at->format('M d, Y h:i A') }}</small>
                                        </div>
                                    </li>
                                    @if($order->delivered_date)
                                    <li class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Delivered</span>
                                            <small class="text-muted">{{ $order->delivered_date->format('M d, Y h:i A') }}</small>
                                        </div>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('dashboard.admin') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Back to Dashboard
                            </a>
                        </div>
                        <form method="POST" action="{{ route('orders.cancel', $order->id) }}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-times-circle me-2"></i> Mark as Cancelled
                            </button>
                        </form>
                        
                        <div>
                            <button class="btn btn-primary">
                                <i class="fas fa-print me-1"></i> Print Invoice
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
    <script>
        document.querySelector('.btn-primary').addEventListener('click', () => {
    window.print();
});
    </script>
</body>
</html>