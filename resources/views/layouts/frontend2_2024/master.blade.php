<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="title" content="@yield('title')">
    <meta name="description" content="@yield('description')">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:standard">
    <meta name="theme-color" content="#ff7b00">
    <meta name="keywords" content="@yield('keywords')">

    <meta property="og:type" content="website">
    <meta property="og:url" content="@yield('url')">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:locale:alternate" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:image" content="{{ asset('backend/images/LogoPpiJpeg.jpg') }}">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="@yield('url')">
    <meta property="twitter:title" content="@yield('title')">
    <meta property="twitter:description" content="@yield('description')">
    <meta property="twitter:image" content="{{ asset('backend/images/LogoPpiJpeg.jpg') }}">

    <link rel="stylesheet" href="{{ url('/') }}/frontend/app/css/app.css">
    <link rel="stylesheet" href="{{ url('/') }}/frontend/app/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/frontend/app/css/textanimation.css">

    @yield('css')
</head>

<body class="body header-fixed counter-scroll">

    <div class="preload preload-container">
        <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
            <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none" stroke="#000"
                stroke-width="20" stroke-dasharray="0 660" stroke-dashoffset="-330" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none" stroke="#000"
                stroke-width="20" stroke-dasharray="0 220" stroke-dashoffset="-110" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none" stroke="#000"
                stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none" stroke="#000"
                stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
        </svg>
    </div>

    <div id="wrapper">
        <div id="pagee" class="clearfix">
            @include('layouts.frontend2_2024.header')
            <main id="main">
                @yield('content')
            </main>
            @include('layouts.frontend2_2024.footer')
        </div>
    </div>

    <script src="{{ url('/') }}/frontend/app/js/jquery.min.js"></script>
    <script src="{{ url('/') }}/frontend/app/js/jquery.nice-select.min.js"></script>
    <script src="{{ url('/') }}/frontend/app/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/frontend/app/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ url('/') }}/frontend/app/js/swiper-bundle.min.js"></script>
    <script src="{{ url('/') }}/frontend/app/js/swiper.js"></script>
    <script src="{{ url('/') }}/frontend/app/js/plugin.js"></script>
    <script src="{{ url('/') }}/frontend/app/js/jquery.fancybox.js"></script>
    <script src="{{ url('/') }}/frontend/app/js/countto.js"></script>
    <script src="{{ url('/') }}/frontend/app/js/price-ranger.js"></script>
    <script src="{{ url('/') }}/frontend/app/js/textanimation.js"></script>
    <script src="{{ url('/') }}/frontend/app/js/shortcodes.js"></script>
    <script src="{{ url('/') }}/frontend/app/js/main.js"></script>

    @yield('script')
</body>

</html>
