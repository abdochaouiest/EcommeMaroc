<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function createPayment()
    {
        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty');
        }

        // Calculate total
        $subtotal = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
        $shipping = 10;
        $tax = $subtotal * 0.08;
        $total = $subtotal + $shipping + $tax;

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('payment.success'),
                "cancel_url" => route('payment.cancel'),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => number_format($total, 2),
                        "breakdown" => [
                            "item_total" => [
                                "currency_code" => "USD",
                                "value" => number_format($subtotal, 2)
                            ],
                            "shipping" => [
                                "currency_code" => "USD",
                                "value" => number_format($shipping, 2)
                            ],
                            "tax_total" => [
                                "currency_code" => "USD",
                                "value" => number_format($tax, 2)
                            ]
                        ]
                    ],
                    "description" => "Order from " . config('app.name'),
                    "items" => $cartItems->map(function ($item) {
                        return [
                            "name" => $item->product->name,
                            "unit_amount" => [
                                "currency_code" => "USD",
                                "value" => number_format($item->product->price, 2)
                            ],
                            "quantity" => $item->quantity,
                            "category" => "PHYSICAL_GOODS"
                        ];
                    })->toArray()
                ]
            ]
        ]);
        
        if (isset($response['id']) && $response['id'] != null) {
            // Store cart and order details in session
            session([
                'paypal_order_id' => $response['id'],
                'cart_items' => $cartItems,
                'order_total' => $total,
                'order_subtotal' => $subtotal,
                'order_shipping' => $shipping,
                'order_tax' => $tax
            ]);

            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => 'ORD-' . Str::upper(Str::random(8)),
                'status' => 'processing',
                'subtotal' => session('order_subtotal'),
                'shipping_cost' => session('order_shipping'),
                'tax' => session('order_tax'),
                'total' => session('order_total'),
                'payment_method' => 'paypal',
                'payment_status' => 'paid',
                'paypal_payment_id' => $response['id'],
                'shipping_address_id' => 2
            ]);
    
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price
                ]);
            }
    
            // Clear cart and session
            Cart::where('user_id', $user->id)->delete();
            session()->forget([
                'paypal_order_id',
                'order_total',
                'order_subtotal',
                'order_shipping',
                'order_tax'
            ]);            
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }
        
        return redirect()->route('payment.error')
            ->with('error', 'Something went wrong with PayPal');

            
    }
    
    public function success()
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        
        $paypalOrderId = session('paypal_order_id');
        
        if (empty($paypalOrderId)) {
            return redirect()->route('cart.index')
                ->with('error', 'Session data missing');
        }
    
        $response = $provider->capturePaymentOrder($paypalOrderId);

        if (isset($response['status']) && in_array($response['status'], ['FAILED', 'CANCELLED'])) {
            return redirect()->route('payment.error')
                ->with('error', 'Payment failed or was cancelled');
        }
    
            // Reload cart items from DB (not session)
            $user = Auth::user();
            $cartItems = Cart::with('product')->where('user_id', $user->id)->get();
    
            // Proceed only if cart is not empty
            if ($cartItems->isEmpty()) {
                return redirect()->route('cart.index')->with('error', 'Your cart is empty');
            }
            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => 'ORD-' . Str::upper(Str::random(8)),
                'status' => 'processing',
                'subtotal' => session('order_subtotal'),
                'shipping_cost' => session('order_shipping'),
                'tax' => session('order_tax'),
                'total' => session('order_total'),
                'payment_method' => 'paypal',
                'payment_status' => 'paid',
                'paypal_payment_id' => $response['id'],
                'shipping_address_id' => 2
            ]);
    
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price
                ]);
            }
    
            // Clear cart and session
            Cart::where('user_id', $user->id)->delete();
            session()->forget([
                'paypal_order_id',
                'order_total',
                'order_subtotal',
                'order_shipping',
                'order_tax'
            ]);
    
    
            
            return redirect()->route('payment.success', $order->id)
                ->with('success', 'Payment completed successfully!');
    
        
    }
    
    public function cancel()
    {
        // Clear session
        session()->forget([
            'paypal_order_id',
            'cart_items',
            'order_total',
            'order_subtotal',
            'order_shipping',
            'order_tax'
        ]);
        
        return redirect()->route('payment.cancel')
            ->with('error', 'Payment was cancelled');
    }
    
}