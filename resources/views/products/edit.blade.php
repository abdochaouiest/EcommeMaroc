    @extends('layouts.app')
    
    @section('title', 'Edit Product')
    
    @section('contents')
        <h1 class="mb-0">Edit Product</h1>
        <hr />
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $product->name }}">
                </div>
                <div class="col mb-3">
                    <label class="form-label">Price</label>
                    <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">product code</label>
                    <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ $product->product_code }}">
                </div>
                <div class="col mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" placeholder="Descriptoin">{{ $product->description }}</textarea>
                </div>
                <div class="col mb-3">
                    <label class="form-label"><img src="{{ $product->photo }}" style="max-width: 100px;"></label>
                    <input type="file" class="form-control" name="photo" placeholder= "Photo" value="{{ $product->photo }}">
                </div>
                <div class="col mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="text" name="quantity" class="form-control" placeholder="Quantity" value="{{ $product->quantity }}">
                </div>
            </div>
            <div class="row">
                <div class="d-grid">
                    <button class="btn btn-warning">Update</button>
                </div>
            </div>
        </form>
    @endsection