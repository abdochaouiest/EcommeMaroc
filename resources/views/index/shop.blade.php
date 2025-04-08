@extends('layouts.app')
@section('title', 'Shop')
@section('contents')
<!-- Start Hero Section -->
<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Shop</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">

                    @if ($products->count())
                    @foreach ( $products as $prod)
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="{{ route('product.show', $prod->id) }}">
							<img src="{{ $prod->photo }}" class="img-fluid product-thumbnail">
							<h3 class="product-title">{{$prod->name}}</h3>
							<strong class="product-price">${{$prod->price}}</strong>
							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div> 
                    @endforeach
            @else
            <div class="col-12 col-md-4 col-lg-3 mb-5">
                <a class="product-item" href="#">
                    <img src="images/product-3.png" class="img-fluid product-thumbnail">
                    <h3 class="product-title">{{$prod->name}}</h3>
                    <strong class="product-price">${{$prod->price}}</strong>

                    <span class="icon-cross">
                        <img src="images/cross.svg" class="img-fluid">
                    </span>
                </a>
            </div> 
        @endif

		      	</div>
		    </div>
		</div>
 @endsection       