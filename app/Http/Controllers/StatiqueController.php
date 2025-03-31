<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StatiqueController extends Controller
{
    public function dashboardAdmin(){
        return view('dashboard.admin');
    }
    public function dashboardUser(){
        return view('dashboard.user');
    }
    public function index()
    {
        $products = Product::all();
        return view('index.home', compact('products'));
    }
    
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::all()->take(4);
        return view('index.show',compact('product','products'));
    }
}
