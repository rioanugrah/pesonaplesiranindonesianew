<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="-agNXAZvJ7uHctHQlEr7t7q9VoOHxdpZJIDOv9womR4">
    <meta name="author" content="Pesona Plesiran Indonesia">
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

    <link href="{{ asset('frontend/logo/favicon.png') }}" rel="shortcut icon">
    @php
        $asset = asset('frontend/new_1/');
    @endphp

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ $asset }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ $asset }}/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ $asset }}/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="{{ $asset }}/assets/css/slick.min.css">
    {{-- <link rel="stylesheet" href="{{ $asset }}/assets/css/style.css"> --}}
    <link rel="stylesheet" href="{{ $asset }}/assets/css/style_new.css">

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HJ8T1V4S3H"></script>
    <script async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ env('ADSENSE_CLIENT_ID') }}"
        crossorigin="anonymous"></script>
    <script async custom-element="amp-auto-ads" src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-HJ8T1V4S3H');
    </script>
    {!! Adsense::javascript() !!}
    @yield('css')
</head>

<body>

    @include('layouts.frontend_2024.mobile')
    @include('layouts.frontend_2024.sidemenu')
    @include('layouts.frontend_2024.header')

    @yield('content')

    @include('layouts.frontend_2024.footer')

    <a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>
    <script src="{{ $asset }}/assets/js/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="{{ $asset }}/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ $asset }}/assets/js/slick.min.js"></script>
    <script src="{{ $asset }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ $asset }}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ $asset }}/assets/js/jquery-ui.min.js"></script>
    <script src="{{ $asset }}/assets/js/circle-progress.min.js"></script>
    <script src="{{ $asset }}/assets/js/imagesLoaded.js"></script>
    <script src="{{ $asset }}/assets/js/isotope.js"></script>
    <script src="{{ $asset }}/assets/js/wow.min.js"></script>
    <script src="{{ $asset }}/assets/js/main.js"></script>

    @yield('script')
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/{!! env('TAWTALK_ID') !!}/{!! env('TAWTALK_SRC') !!}';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
</body>

</html>
