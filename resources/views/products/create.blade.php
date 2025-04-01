@extends ('layouts.app')

@section ('contents')
    <h1 class="mb-0">Add Product</h1>
    <hr>
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf   
        <div class="row mb-3">
            <div class="col">
                <input type="file" name="photo" class="form-control @error('name')is-invalid @enderror" placeholder="Photo">
            </div>
            <div class="col">
                <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" placeholder="Name">
            </div>
            <div class="col">
                <input type="text" name="Category" class="form-control @error('name')is-invalid @enderror" placeholder="Category">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="" name="quantity" class="form-control @error('name')is-invalid @enderror" placeholder="Quantity">
            </div>
            <div class="col">
                <input type="text" class="form-control @error('name')is-invalid @enderror" name="price" placeholder= "Price"> </input>
            </div>
            <div class="col">
                <input type="text" class="form-control @error('name')is-invalid @enderror" name="product_code" placeholder= "Product code"> </input>
            </div>
        </div> 
        <div class="row mb-3">
            <div class="col">
                <textarea class="form-control @error('name')is-invalid @enderror" name="description" placeholder= "Description"> </textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection