@extends('layouts.app')
  
@section('title', 'Services')
  
@section('contents')
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Services</h1>
                    <p class="mb-4">Discover our wide range of professional services designed to meet your needs. From innovative web development to reliable customer support, we’re here to help your business grow and succeed.</p>
                    <p><a href="{{route('shop') }}" class="btn btn-secondary me-2">Shop Now</a><a href="{{route('home') }}" class="btn btn-white-outline">Explore</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="images/couch.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->



<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
<div class="container">
    
    
    <div class="row my-5">
        <div class="col-6 col-md-6 col-lg-3 mb-4">
            <div class="feature">
                <div class="icon">
                    <img src="images/truck.svg" alt="Image" class="imf-fluid">
                </div>
                <h3>Fast &amp; Free Shipping</h3>
                <p>Enjoy quick and reliable shipping at no extra cost. Get your products delivered to your doorstep with speed and efficiency.</p>
            </div>
        </div>
    
        <div class="col-6 col-md-6 col-lg-3 mb-4">
            <div class="feature">
                <div class="icon">
                    <img src="images/bag.svg" alt="Image" class="imf-fluid">
                </div>
                <h3>Easy to Shop</h3>
                <p>Our user-friendly platform makes shopping a breeze. Browse, select, and purchase with ease, all in a few clicks.</p>
            </div>
        </div>
    
        <div class="col-6 col-md-6 col-lg-3 mb-4">
            <div class="feature">
                <div class="icon">
                    <img src="images/support.svg" alt="Image" class="imf-fluid">
                </div>
                <h3>24/7 Support</h3>
                <p>Our dedicated support team is available around the clock to assist you with any inquiries or concerns you may have.</p>
            </div>
        </div>
    
        <div class="col-6 col-md-6 col-lg-3 mb-4">
            <div class="feature">
                <div class="icon">
                    <img src="images/return.svg" alt="Image" class="imf-fluid">
                </div>
                <h3>Hassle Free Returns</h3>
                <p>Changed your mind? No worries! Return your products with ease and get a full refund or exchange, hassle-free.</p>
            </div>
        </div>
    </div>
    

</div>
</div>
<!-- End Why Choose Us Section -->

<!-- Start Product Section -->
<div class="product-section">
    <div class="container">
        <div class="row">

            <!-- Start Column 1 -->
            <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                <h2 class="mb-4 section-title">Crafted with excellent material.</h2>
                <p class="mb-4">Made from premium materials, this product offers both durability and style. Every detail has been carefully designed to ensure a refined and reliable experience</p>
                <p><a href="{{route('shop') }}" class="btn">Explore</a></p>
            </div> 
            <!-- End Column 1 -->

            @if ($products->count())
            @foreach ( $products as $prod)
            <div class="col-12 col-md-4 col-lg-3 mb-5">
                <a class="product-item" href="{{ route('product.showuser', $prod->id) }}">
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
            <h3 class="product-title">No products found</h3>
            <strong class="product-price">$00.00</strong>

            <span class="icon-cross">
                <img src="images/cross.svg" class="img-fluid">
            </span>
        </a>
    </div> 
@endif
        </div>
    </div>
</div>
<!-- End Product Section -->



<!-- Start Testimonial Slider -->
<div class="testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="section-title">Testimonials</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="testimonial-slider-wrap text-center">

                    <div id="testimonial-nav">
                        <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                        <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
                    </div>

                    <div class="testimonial-slider">
                        
                        <div class="item">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 mx-auto">

                                    <div class="testimonial-block text-center">
                                        <blockquote class="mb-5">
                                            <p>&ldquo;I was amazed by the quality and comfort of the chairs I bought from Glissa. The online shopping experience was seamless, and the delivery was fast. Highly recommended for anyone looking to upgrade their home with stylish and comfortable furniture.&rdquo;</p>
                                        </blockquote>

                                        <div class="author-info">
                                            <div class="author-pic">
                                                <img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
                                            </div>
                                            <h3 class="font-weight-bold">Fatima Zahra</h3>
                                            <span class="position d-block mb-3">Interior Designer, Morocco</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> 
                        <!-- END item -->

                        <div class="item">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 mx-auto">

                                    <div class="testimonial-block text-center">
                                        <blockquote class="mb-5">
                                            <p>&ldquo;I love my new Glissa chair! It’s not only beautiful but also incredibly comfortable. The customer service was outstanding, and I received my order on time. I recommend Glissa to anyone in Morocco looking for high-quality furniture.&rdquo;</p>
                                        </blockquote>

                                        <div class="author-info">
                                            <div class="author-pic">
                                                <img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
                                            </div>
                                            <h3 class="font-weight-bold">Sofia Khamlichi</h3>
                                            <span class="position d-block mb-3">Homeowner, Rabat</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> 
                        <!-- END item -->

                        <div class="item">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 mx-auto">

                                    <div class="testimonial-block text-center">
                                        <blockquote class="mb-5">
                                            <p>&ldquo;Glissa offers the best selection of sofas that perfectly fit my living room. The craftsmanship is excellent, and the prices are fair. I will definitely shop here again for all my furniture needs!&rdquo;</p>
                                        </blockquote>

                                        <div class="author-info">
                                            <div class="author-pic">
                                                <img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
                                            </div>
                                            <h3 class="font-weight-bold">Ahmed El-Masri</h3>
                                            <span class="position d-block mb-3">Customer, Casablanca</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> 
                        <!-- END item -->

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection