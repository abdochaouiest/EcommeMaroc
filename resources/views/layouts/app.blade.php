<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="{{ asset('index/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="{{ asset('index/css/tiny-slider.css') }}" rel="stylesheet">
		<link href="{{ asset('index/css/style.css') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
	</head>
<body>

    <!-- {{-- Navbar --}} -->
    @include('layouts.header')

    <!-- {{-- Page Content --}} -->
    @yield('contents')
<!-- 
    {{-- Footer --}} -->
    @include('layouts.footer')

    
    <script src="{{ asset('index/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('index/js/tiny-slider.js') }}"></script>
	<script src="{{ asset('index/js/custom.js') }}"></script>	
</body>
</html>
