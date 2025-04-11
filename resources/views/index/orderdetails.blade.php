@extends('layouts.app')


@section('contents')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details - ShopEase</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .order-details-section {
            padding: 40px 0px;
            
        }
        
        .order-info {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        
        .order-info-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        
        @media (max-width: 768px) {
            .order-info-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 480px) {
            .order-info-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .info-card {
            padding: 15px;
            border-radius: 6px;
            background-color: #fff;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .info-card h4 {
            margin: 0 0 8px 0;
            color: #666;
            font-size: 14px;
        }
        
        .info-card p {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
        }
        
        .order-status-timeline {
            display: flex;
            justify-content: space-between;
            margin: 40px 0;
            position: relative;
        }
        
        .order-status-timeline::before {
            content: '';
            position: absolute;
            top: 30px;
            left: 0;
            right: 0;
            height: 4px;
            background-color: #e9e9e9;
            z-index: 1;
        }
        
        .timeline-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
            width: 20%;
        }
        
        .step-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            border: 4px solid #e9e9e9;
            font-size: 24px;
            color: #999;
            background-color: #fff;
        }
        
        .step-icon.active {
            border-color: #4caf50;
            color: #4caf50;
        }
        
        .step-icon.completed {
            border-color: #4caf50;
            background-color: #4caf50;
            color: #fff;
        }
        
        .step-label {
            font-size: 14px;
            font-weight: 600;
            color: #666;
            text-align: center;
            width: 100%;
        }
        
        .step-date {
            font-size: 12px;
            color: #999;
            margin-top: 4px;
        }
        
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        
        .items-table th {
            background-color: #f5f5f5;
            text-align: left;
            padding: 12px 15px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }
        
        .items-table td {
            padding: 15px;
            border-bottom: 1px solid #e9e9e9;
        }
        
        .items-table tr:last-child td {
            border-bottom: none;
        }
        
        .item-info {
            display: flex;
            align-items: center;
        }
        
        .item-image {
            width: 60px;
            height: 60px;
            border-radius: 6px;
            overflow: hidden;
            margin-right: 15px;
        }
        
        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .item-details h4 {
            margin: 0 0 5px 0;
            font-size: 16px;
        }
        
        .item-details p {
            margin: 0;
            color: #666;
            font-size: 14px;
        }
        
        .order-summary {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            margin-top: 30px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e9e9e9;
        }
        
        .summary-row:last-child {
            border-bottom: none;
            font-weight: 700;
            font-size: 18px;
            padding-top: 15px;
        }
        
        .actions-container {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
            margin-bottom: 70px;
        }
        
        .back-button {
            background-color: #f1f1f1;
            color: #333;
        }
        
        @media print {
            .header, .footer, .actions-container {
                display: none;
            }
            
            body {
                background-color: #fff;
            }
            
            .order-details-section {
                padding: 0;
            }
            
            .container {
                width: 100%;
                max-width: none;
                padding: 0;
            }
        }
    </style>
</head>
<body>
        <div class="hero">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-5">
                        <div class="intro-excerpt">
                            <h1>Order Details</h1>
                  <p class="mb-4">{{ auth()->user()->name }}, here are the details for your order.</p>                  
                    <p><a href="{{route("home")}}" class="btn btn-secondary me-2">< Back To Shop</a></p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        
                    </div>
                </div>
            </div>
        </div>

        <section class="order-details-section">
            <div class="container">
                <div class="order-info">
                    <div class="order-info-grid">
                        <div class="info-card">
                            <h4>Order Number</h4>
                            <p id="order-number">{{ $order->order_number }}</p>
                        </div>
                        <div class="info-card">
                            <h4>Order Date</h4>
                            <p id="order-date">{{ $order->created_at->format('F j, Y') }}</p>
                        </div>
                        <div class="info-card">
                            <h4>Payment Method</h4>
                            <p id="payment-method">{{ ucfirst($order->payment_method) }}</p>
                        </div>
                        <div class="info-card">
                            <h4>Order Status</h4>
                            <p id="order-status">{{ ucfirst($order->status) }}</p>
                        </div>
                        
                    </div>
                </div>


                <div class="addresses-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="info-card">
                        <h4>Shipping Address</h4>
                        <p id="shipping-name">John Doe</p>
                        <p id="shipping-address">{{ $order->address }}</p>
                        <p id="shipping-city-state">{{ $order->city }}</p>
                        <p id="shipping-country">{{ $order->country }}</p>
                        <p id="shipping-phone">{{ $order->phone }}</p>
                    </div>
                </div>

                <h2 style="margin-top: 40px;">Order Items</h2>
                <table class="items-table">
                    <thead>
                        <tr>
                            <th style="width: 50%;">Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="order-items">
                        @foreach ($order->items as $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $item->product->photo ?? 'default-image-url.jpg' }}" alt="{{ $item->product->name ?? 'Product' }}" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                                    <span>{{ $item->product->name ?? 'Product not found' }}</span>
                                </div>
                            </td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="order-summary">
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span id="subtotal">${{ $order->subtotal }}</span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping</span>
                        <span id="shipping">${{ $order->shipping_cost }}</span>
                    </div>
                    <div class="summary-row">
                        <span>Tax</span>
                        <span id="tax">${{ $order->tax }}</span>
                    </div>
                    <div class="summary-row">
                        <span>Total</span>
                        <span id="total">${{ $order->total }}</span>
                    </div>
                </div>

                <div class="actions-container">
                    <a class="btn back-button" href="{{route("cart.index")}}">Back to Orders</a>
                    <button class="btn" onclick="window.print()">Print Order</button>
                    <button class="btn" id="cancel-order-btn">Cancel Order</button>
                </div>
            </div>
        </section>

@endsection