<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
{
    $user = Auth::user();
    
    $orders = Order::where('user_id', $user->id)
                ->with('items.product')
                ->when($request->search, function($query) use ($request) {
                    return $query->where('order_number', 'like', '%'.$request->search.'%');
                })
                ->when($request->status && $request->status != 'all', function($query) use ($request) {
                    return $query->where('status', $request->status);
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10);
                
    return view('index.orderhistory', compact('orders'));
}
public function show($id)
{
    $user = Auth::user();

    $order = Order::with('items.product')
        ->where('id', $id)
        ->where('user_id', $user->id)
        ->firstOrFail();

    return view('index.orderdetails', [
        'order' => $order,
        'orderItems' => $order->items,
        'isEmpty' => $order->items->isEmpty()
    ]);
}
}
