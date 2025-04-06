<?php

namespace App\Http\Controllers;
use App\Models\Address;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $user = Auth::user();
        $shippingAddress = Address::where('user_id', $user->id)
            ->where('is_default', true)->first();
            
            $cartItems = Cart::where('user_id', $user->id)
            ->with('product')
        ->get();
    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
    }
            $subtotal = $cartItems->sum(function ($item) {
                return $item->quantity * $item->product->price;
            });
            
            $shippingCost = 10;
            $tax = $this->calculateTax($subtotal);
            $total = $subtotal + $shippingCost + $tax;

        return view('index.checkout', compact('shippingAddress', 'cartItems', 'subtotal','shippingCost','tax','total'));

    }
    private function calculateTax($subtotal)
{
    return $subtotal * 0.08;
}
}
