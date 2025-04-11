@extends('layouts.app')
@section('title', 'About Us')
@section('contents')

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>About Glissa</h1>
                    <p class="mb-4">Welcome to Glissa, your ultimate destination for high-quality, stylish furniture. Our goal is to provide you with an exceptional shopping experience that combines comfort, design, and convenience.</p>
                    <p><a href="{{route('shop')}}" class="btn btn-secondary me-2">Shop Now</a><a href="{{route('home')}}" class="btn btn-white-outline">Explore</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="{{asset('images/couch.png')}}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title">Why Choose Glissa</h2>
                <p>At Glissa, we’re committed to providing you with the best furniture experience. Our curated collection blends aesthetics, functionality, and affordability to enhance your living space.</p>

                <div class="row my-5">
                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="images/truck.svg" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Fast & Free Shipping</h3>
                            <p>Enjoy swift and free delivery on all orders, ensuring your new furniture arrives quickly and safely at your doorstep.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="images/bag.svg" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Easy to Shop</h3>
                            <p>Shopping for your dream furniture has never been easier. Our intuitive website makes it simple to browse, select, and order your favorite pieces.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="images/support.svg" alt="Image" class="imf-fluid">
                            </div>
                            <h3>24/7 Customer Support</h3>
                            <p>We offer round-the-clock support to assist with any questions or issues you may have, ensuring a seamless shopping experience.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="images/return.svg" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Hassle-Free Returns</h3>
                            <p>If you're not satisfied with your purchase, our easy return process ensures you can send it back without any hassle.</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-5">
                <div class="img-wrap">
                    <img src="images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Why Choose Us Section -->

<!-- Start Team Section -->
<div class="untree_co-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-5 mx-auto text-center">
                <h2 class="section-title">Meet the Glissa Team</h2>
            </div>
        </div>

        <div class="row">

            <!-- Start Column 1 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="images/person_1.jpg" class="img-fluid mb-5">
                <h3><a href="#"><span class="">Lawson</span> Arnold</a></h3>
                <span class="d-block position mb-4">CEO & Founder</span>
                <p>At Glissa, Lawson leads with a vision to redefine home decor with stylish and affordable furniture that elevates living spaces.</p>
                <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
            </div>
            <!-- End Column 1 -->

            <!-- Start Column 2 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="images/person_2.jpg" class="img-fluid mb-5">

                <h3><a href="#"><span class="">Jeremy</span> Walker</a></h3>
                <span class="d-block position mb-4">Creative Director</span>
                <p>Jeremy ensures every piece at Glissa reflects creativity and quality, blending form and function for the perfect home experience.</p>
                <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>

            </div>
            <!-- End Column 2 -->

            <!-- Start Column 3 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="images/person_3.jpg" class="img-fluid mb-5">
                <h3><a href="#"><span class="">Patrik</span> White</a></h3>
                <span class="d-block position mb-4">Marketing Manager</span>
                <p>Patrik is responsible for building Glissa’s brand and connecting customers with the best in home furniture.</p>
                <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
            </div>
            <!-- End Column 3 -->

            <!-- Start Column 4 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="images/person_4.jpg" class="img-fluid mb-5">

                <h3><a href="#"><span class="">Kathryn</span> Ryan</a></h3>
                <span class="d-block position mb-4">Operations Manager</span>
                <p>Kathryn ensures Glissa’s operations run smoothly, from sourcing to delivery, making sure customers get the best service.</p>
                <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>

            </div>
            <!-- End Column 4 -->

        </div>
    </div>
</div>
<!-- End Team Section -->

<!-- Start Testimonials Section -->
<div class="testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="section-title">What Our Customers Say</h2>
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
                                            <p>&ldquo;Glissa has transformed my living room! The furniture is gorgeous, and the service was exceptional. I highly recommend Glissa to anyone looking for quality home furnishings.&rdquo;</p>
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
                                            <p>&ldquo;I was impressed with the quality and comfort of my new sofa. Glissa made shopping so easy, and I received my order on time. Highly recommend for anyone looking for top-notch furniture.&rdquo;</p>
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
                                            <p>&ldquo;Glissa is my go-to for all things home furniture. Their selection is amazing, and everything I’ve bought has been perfect for my space. Great quality and fantastic service!&rdquo;</p>
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
<!-- End Testimonials Section -->

@endsection
