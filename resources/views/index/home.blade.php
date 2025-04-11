@extends('layouts.app')
@section('title', 'Home')
@section('contents')
		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Glissa Chairs and<span clsas="d-block"> Sofas...</span></h1>
								<p class="mb-4">Shop premium Moroccan chairs and sofas online. Find the perfect pieces to enhance your home’s comfort and style with our unique selection of furniture.</p>
								<p><a href="{{route("shop")}}" class="btn btn-secondary me-2">Shop Now</a></p>
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

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Why Choose Us</h2>
						<p>At Glissa, we offer the finest selection of premium chairs and sofas designed to bring both comfort and style to your home. Our mission is to provide high-quality furniture that meets the diverse needs and tastes of Moroccan families. Experience the difference with us today!</p>
		
						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/truck.svg" alt="Fast & Free Shipping" class="imf-fluid">
									</div>
									<h3>Fast &amp; Free Shipping</h3>
									<p>Enjoy fast and free shipping on all orders across Morocco. We ensure your new furniture arrives at your doorstep promptly and in perfect condition.</p>
								</div>
							</div>
		
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/bag.svg" alt="Easy to Shop" class="imf-fluid">
									</div>
									<h3>Easy to Shop</h3>
									<p>Our user-friendly online platform makes it simple to browse, select, and purchase your favorite chairs and sofas. Shopping with Glissa is quick and hassle-free!</p>
								</div>
							</div>
		
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/support.svg" alt="24/7 Support" class="imf-fluid">
									</div>
									<h3>24/7 Support</h3>
									<p>Our dedicated customer service team is available 24/7 to assist with any questions or concerns you may have, ensuring a smooth and enjoyable shopping experience.</p>
								</div>
							</div>
		
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/return.svg" alt="Hassle-Free Returns" class="imf-fluid">
									</div>
									<h3>Hassle-Free Returns</h3>
									<p>We understand that choosing the perfect piece of furniture can be difficult. That's why we offer a hassle-free return policy to make sure you're completely satisfied with your purchase.</p>
								</div>
							</div>
		
						</div>
					</div>
		
					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="images/why-choose-us-img.jpg" alt="Furniture" class="img-fluid">
						</div>
					</div>
		
				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

		<!-- Start We Help Section -->
		<div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="images/img-grid-1.jpg" alt="Untree.co"></div>
							<div class="grid grid-2"><img src="images/img-grid-2.jpg" alt="Untree.co"></div>
							<div class="grid grid-3"><img src="images/img-grid-3.jpg" alt="Untree.co"></div>
						</div>
					</div>
					<div class="col-lg-5 ps-lg-5">
						<h2 class="section-title mb-4">We Help You Make Modern Interior Design</h2>
						<p>At Glissa, we offer a wide range of high-quality chairs and sofas that blend comfort with style. Whether you’re furnishing your living room or adding a cozy corner, our pieces are designed to suit every home. Our collection combines the latest trends with timeless designs, ensuring that you find the perfect fit for your space.</p>

						<ul class="list-unstyled custom-list my-4">
							<li>We offer a variety of comfortable and stylish chairs and sofas</li>
							<li>Our collection features both modern and classic designs</li>
							<li>Fast and reliable delivery service for all orders</li>
							<li>High-quality materials for durability and comfort</li>
						</ul>
						<p><a href="{{ route('shop') }}" class="btn">Explore</a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- End We Help Section -->

		<!-- Start Popular Product -->
		<div class="popular-product">
			<div class="container">
				<div class="row">

					@if ($products->count())
                    @foreach ( $products as $prod)
					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="{{ $prod->photo }}" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>{{ $prod->name}}</h3>
								<p>{{$prod->description}}</p>
								<p><a href="{{ route('product.showuser', $prod->id) }}">Read More</a></p>
							</div>
						</div>
					</div>
					@endforeach
					@else
					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
							</div>
							<div class="pt-3">
								<h3>No products found</h3>
								<p>No products found</p>
								<p><a href="#">Read More</a></p>
							</div>
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>
		<!-- End Popular Product -->

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

