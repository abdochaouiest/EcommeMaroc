<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();
        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

return view('index.cart', compact('cartItems', 'total'));
    }

    public function add(Request $request, Product $product)
    {
        $quantity = (int) $request->input('quantity', 1); // Default to 1 if nothing passed
    
        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('product_id', $product->id)
                        ->first(); 
    
        if ($cartItem) {
            $cartItem->increment('quantity', $quantity);
            $message = 'Product quantity updated in your cart!';
             $messageType = 'info';
        } else {
            Cart::create([
                'user_id' => Auth::id(), 
                'product_id' => $product->id,
                'quantity' => $quantity
            ]);
            $message = 'Product added to cart!';
        $messageType = 'success'; 
        }
    
        return redirect()->back()->with([
            'message' => $message,
            'message_type' => $messageType
        ]);

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
