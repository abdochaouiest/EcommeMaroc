<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StatiqueController extends Controller
{
    public function dashboardAdmin(){
        return view('dashboard.admin');
    }
    public function dashboardUser(){
        $products = Product::all();
        return view('dashboard.user',compact('products'));
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
        return view('index.services');
    }


}
