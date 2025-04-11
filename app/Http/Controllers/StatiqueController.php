<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StatiqueController extends Controller
{
    public function dashboardAdmin(Request $request){
        $products = Product::all();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalCustomers = User::where('role', 'user')->count(); 
        $totalRevenue = Order::sum('total');
        $recentOrders = Order::with('user')->latest()->take(5)->get();
        $orders = Order::with('user')
        ->when($request->search, function($query, $search) {
            return $query->where('order_number', 'like', "%{$search}%");
        })
        ->when($request->status && $request->status != 'all', function($query, $status) {
            return $query->where('status', $status);
        })
        ->latest()
        ->paginate(10);
        $users = User::where('role', 'user')
        ->select([
            'id',
            'name',
            'email',
            'role',
            'created_at'
        ])
        ->withCount('orders')
        ->withSum('orders', 'total')
        ->get();
    
    return view('dashboard.admindashboard', compact(
        'products',
        'totalProducts',
        'totalOrders',
        'totalCustomers',
        'totalRevenue',
        'recentOrders',
        'orders',
        'users'  
    ));
    }
    public function showordersdetails($id)
    {
        // Retrieve the order with all necessary relationships
        $order = Order::with([
            'user',
            'orderItems.product',
        ])->findOrFail($id);

        // Prepare the data for the view
        return view('dashboard.orderdetails', [
            'order' => $order,
        ]);
    }

    public function cancel($orderId)
{
    try{
        $order = Order::findOrFail($orderId);
    if ($order->status === 'cancelled') {
        return back()->with('error', 'Order #' . $orderId . ' is already cancelled!');
    }

    if ($order->status === 'shipped') {
        return back()->with('error', 'Cannot cancel shipped order #' . $orderId);
    }
    $order->update(['status' => 'cancelled']);

        return back()->with('success', 'Order #' . $orderId . ' cancelled successfully!');

    } catch (ModelNotFoundException $e) {
        return back()->with('error', 'Order not found!');

}
}
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $validated['status'];
        
        if ($validated['status'] === 'completed') {
            $order->delivered_date = now();
        }

        $order->save();

        return redirect()->route('dashboard.orderdetails', $order->id)
            ->with('success', 'Order status updated successfully');
    }

    public function getCustomerDetails($id)
{
    try {
        $customer = User::findOrFail($id, ['id', 'name','email','cin','primary_phone','additional_phone', 'created_at']);



        return response()->json([  
            'success' => true,
            'customer' => $customer,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to load customer details',
            'error' => $e->getMessage()
        ], 500);
    }
}

    public function dashboardUser(){
        $products = Product::all();
        return view('dashboard.user',compact('products'));
    }
    public function index()
    {
        $products = Product::all()->take(3);
        return view('index.home', compact('products'));
    }

    public function shop()
    {
        $products = Product::all();
        return view('index.shop', compact('products'));
    }
    
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::all()->take(4);
        return view('index.show',compact('product','products'));
    }

    public function aboutUs()
    {
        return view('index.aboutus');
    }
    public function contactUs()
    {
        return view('index.contactus');
    }
    public function services()
    {
        $products = Product::all()->take(3);
        return view('index.services',compact('products'));
    }
}
