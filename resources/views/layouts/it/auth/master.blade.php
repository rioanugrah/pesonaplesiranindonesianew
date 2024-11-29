<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="{{ asset('it') }}/assets/js/pages/layout.js"></script>
    <link href="{{ asset('it') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('it') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('it') }}/assets/libs/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="{{ asset('it') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container-fluid authentication-bg overflow-hidden">
        <div class="bg-overlay"></div>
        @yield('content')
    </div>
    <script src="{{ asset('it') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('it') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('it') }}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('it') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('it') }}/assets/libs/node-waves/waves.min.js"></script>

    <script src="{{ asset('it') }}/assets/js/app.js"></script>
</body>
</html>
