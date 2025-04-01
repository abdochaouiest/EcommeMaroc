@extends('layouts.app')

@section('contents')
<div>
    <h1>
        Product List
    </h1>
    <a href="{{route('products.create')}}">
        Add Product
    </a>
</div>
<table>
    <thead>
        <tr>
            <th>#</th>
                <th>photo</th>
                <th>name</th>
                <th>Category</th>
                <th>quantity</th>
                <th>price</th>
                <th>description</th>
        </tr>
    </thead>
    <tbody>
        @if ($products->count())
            @foreach ( $products as $prod)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{ $prod->photo }}" style="max-width: 100px;"></td>
                    <td>{{$prod->name}}</td>
                    <td>{{$prod->Category}}</td>
                    <td>{{$prod->quantity}}</td>
                    <td>{{$prod->price}}</td>
                    <td>{{$prod->description}}</td>
                    <td>
                        <div>
                            <a href="{{ route('products.show', $prod->id) }}" type="button">Detail</a>
                            <a href="{{ route('products.edit', $prod->id)}}" type="button">Edit</a>
                            <form action="{{ route('products.destroy', $prod->id) }}" method="POST" type="button">
                                @csrf
                                @method('DELETE')
                                <button>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            @else
                <tr>
                    <td>Product not found</td>
                </tr>
        @endif
    </tbody>
</table>
    
@endsection