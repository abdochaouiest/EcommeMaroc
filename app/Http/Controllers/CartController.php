<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }
    public function addToCart(Request $request, $productId)
=======
    public function addToCart(Request $request,$productId)
>>>>>>> 7ab7acbf43d18fba7bc456c2c6a1598c298d743a
    {
        $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $productId)->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $request->quantity);
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => $request->quantity
            ]);
        }

        return back()->with('success', 'Produit ajouté au panier');
    }
    public function removeFromCart($productId)
    {
        Cart::where('user_id', Auth::id())->where('product_id', $productId)->delete();
        return back()->with('success', 'Produit retiré du panier');
    }
}
