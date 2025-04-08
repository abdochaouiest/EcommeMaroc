<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Product;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index',['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(ProductCreateRequest $request)
    {   
        try {
            $data = $request->validated();
            if ($request->hasFile('photo')) {
                $fileName = time().$request->file('photo')->getClientOriginalName();
                $path = $request->file('photo')->storeAs('images', $fileName, 'public');
                $data['photo'] = '/storage/'.$path;
            }
    
            Product::create($data);
            
            return redirect()->route('products')->with('success', 'Product added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add product. Please try again.');
        }
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
    public function showUser($id)
    {
        $product = Product::findOrFail($id);
        return view('products.productdescription', compact('product'));
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if($request->hasFile('photo')){
            $fileName = time() . $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $fileName, 'public');
            $product->photo = '/storage/' . $path;
        }
        $product->update($request->except('photo'));
        $product->save();
        return redirect()->route('products')->with('success', 'product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products')->with('success', 'Product deleted successfully');
    }
}
