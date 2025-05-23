<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="{{ asset('index/css/page.css') }}" rel="stylesheet" />
</head>
<body>
<section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
           <div class="row gx-4 gx-lg-5 align-items-center">
              <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ $product->photo }}" alt="..." /></div>
                <div class="col-md-6">
                <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                <div class="fs-5 mb-5">
                        <span>{{ $product->price }} MAD</span>
                </div>
                <p class="lead">{{ $product->description }}</p>
                <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="{{ $product->quantity }}" style="max-width: 3rem" readonly/>
                        <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                {{-- <a href="{{ route('index.commande', $product->id) }}">Commande</a> --}}
                        </button>
                </div>
           </div>
        </div>
        </div>
</section>
<section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                 @foreach($products as $product)
                    <div class="col mb-5">                        
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ $product->photo }}" alt="Product Image" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                                    <!-- Product price-->
                                    {{ $product->price }} MAD
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('index.show', $product->id) }}">View options</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
        </div>
</section> 
</body>
</html>
