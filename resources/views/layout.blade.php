<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="{{url("css/bootstrap.min.css")}}">
        <link rel="stylesheet" href="{{url("css/index.css")}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Trastevere | @yield('title')</title>
        
    </head>
    <body>
        <div class="container-fluid bg-danger">
            <nav class="container navbar navbar-expand-lg navbar-dark justify-content-between">
                <a class="navbar-brand" href="#">Trastevere</a>
                @yield('menu')
                <span class="icon-size">
                    <i class="fab fa-facebook text-white "></i>
                    <i class="fab fa-instagram text-white "></i>
                    <i class="fab fa-twitter text-white "></i>
                    <i class="fab fa-pinterest text-white "></i>
                </span>
            </nav>
        </div>
        <div class="container">
            @yield('content')
        </div>
        <script src="{{url("js/bootstrap.min.js")}}"></script>
    </body>
</html>
