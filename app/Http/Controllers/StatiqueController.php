<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StatiqueController extends Controller
{
    public function dashboardAdmin(){
        $products = Product::all();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalCustomers = User::where('role', 'user')->count(); 
        $totalRevenue = Order::sum('total');
        $recentOrders = Order::with('user')->latest()->take(6)->get();
        $orders = Order::all();
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
