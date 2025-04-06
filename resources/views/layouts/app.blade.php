    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'My Laravel App')</title>
        <link rel="stylesheet" href="{{ asset('index/css/styles.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    </head>
    <body>
        @include('layouts.header')

        @yield('contents')
        

        @include('layouts.footer')
        @stack('scripts')
        <script src="{{ asset('index/js/main.js') }}"></script>
    </body>
    </html>
