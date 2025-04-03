<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $cartItems = Cart::with('product')->get();
        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
        return view('index.cart', compact('cartItems', 'total'));
    }

    public function add(Product $product) {
        $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $product->id)->first(); 
    
        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id' =>Auth::id(), 
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }
    
        return redirect()->route('cart.index');
    }

    public function update(Request $request) {
        $cartItem = Cart::find($request->item_id);
    
        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Item not found.']);
        }
    
        if ($request->action == 'increment') {
            $cartItem->increment('quantity');
        } elseif ($request->action == 'decrement' && $cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
        }
    
        $newTotal = $cartItem->product->price * $cartItem->quantity;
    
        $cartTotal = Cart::with('product')->get()->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    
        return response()->json([
            'success' => true,
            'new_quantity' => $cartItem->quantity,
            'new_total' => $newTotal,
            'cart_total' => $cartTotal
        ]);
    }

    public function remove(Cart $cartItem) {
        $cartItem->delete();
        return redirect()->route('cart.index');
    }

    public function clear() {
        Cart::truncate();
        return redirect()->route('cart.index');
    }
}
