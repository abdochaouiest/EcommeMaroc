@include('flash::message')

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<link href="{{ asset('index/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="{{ asset('index/css/tiny-slider.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		<link href="{{ asset('index/css/style.css') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<title>Glissa</title>
	</head>
<body>

    @include('flash::message') 

    @include('layouts.header')

    @yield('contents')
    
    @include('layouts.footer')

    
    <script src="{{ asset('index/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('index/js/tiny-slider.js') }}"></script>
	<script src="{{ asset('index/js/custom.js') }}"></script>	

    <script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>

</body>
</html>

