<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="author" content="Camping Adventure">
    <meta name="description" content="@yield('description')">
    <meta name="theme-color" content="#63AB45">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="canonical" href="@yield('canonical')">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:locale:alternate" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:type" content="camping">
    <meta property="og:title" content="Camping Adventure">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:site_name" content="Camping Adventure">
    <meta property="og:description" content="@yield('description')">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:standard">
    @yield('css')
    @php
        $assets = asset('frontend/camping/');
    @endphp
    <link rel="stylesheet" href="{{ $assets.'/css/scroll.css' }}">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ $assets }}/fonts/flaticon/flaticon_gowilds.css">
    <link rel="stylesheet" href="{{ $assets }}/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ $assets }}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ $assets }}/vendor/magnific-popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="{{ $assets }}/vendor/slick/slick.css">
    <link rel="stylesheet" href="{{ $assets }}/vendor/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ $assets }}/vendor/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="{{ $assets }}/vendor/animate.css">
    <link rel="stylesheet" href="{{ $assets }}/css/default.css">
    <link rel="stylesheet" href="{{ $assets }}/css/style.css">
    <link rel="shortcut icon" href="{{ $assets }}/images/favicon.jpg" type="image/png">

</head>
<body>
    @include('layouts.fe_camping.header')

    @yield('content')

    <section class="hero-section">
        <div class="hero-wrapper black-bg">
            <div class="hero-slider-one">
                <div class="single-slider">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-xl-6">
                                <div class="hero-content text-white">
                                    <h1 data-animation="fadeInDown" data-delay=".4s">
                                        It's Time for Adventure
                                    </h1>
                                    {{-- <div class="text-button d-flex align-items-center">
                                        <p data-animation="fadeInLeft" data-delay=".5s">Nunc et dui nullam aliquam eget
                                            velit. Consectetur nulla convallis
                                            viverra quisque eleifend</p>
                                        <div class="hero-button" data-animation="fadeInRight" data-delay=".6s">
                                            <a href="about.html" class="main-btn primary-btn">Explore More<i class="fas fa-paper-plane"></i></a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="hero-image" data-animation="fadeInRight">
                                    <img src="{{ $assets }}/images/camp_slide_1.jpg" alt="Camping Slide 1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="who-we-section pt-100 pb-50">
        <div class="container">
            <div class="row align-items-xl-center">
                <div class="col-xl-5 order-2 order-xl-1">
                    <div class="we-image-box text-center text-xl-left pr-lg-30 mb-50 wow fadeInLeft">
                        <img src="{{ $assets }}/images/69356-rinjani.jpg" class="radius-top-left-right-288" alt="What We Image">
                    </div>
                </div>
                <div class="col-xl-7 order-1 order-xl-2">
                    <div class="we-contnet-box mb-20 wow fadeInRight">
                        <div class="section-title mb-45">
                            {{-- <span class="sub-title">Who We Are</span> --}}
                            <h2>Peluang Besar Untuk Petualangan & Perjalanan</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="fancy-icon-box-three mb-30">
                                    <div class="icon">
                                        <i class="flaticon-camping"></i>
                                    </div>
                                    <div class="text">
                                        <h5 class="title">Berkemah</h5>
                                        {{-- <a href="#" class="btn-link">Read More <i class="far fa-long-arrow-right"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="fancy-icon-box-three mb-30">
                                    <div class="icon">
                                        <i class="flaticon-biking-mountain"></i>
                                    </div>
                                    <div class="text">
                                        <h5 class="title">Bersepeda</h5>
                                        {{-- <a href="#" class="btn-link">Read More <i class="far fa-long-arrow-right"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="fancy-icon-box-three mb-30">
                                    <div class="icon">
                                        <i class="flaticon-fishing-2"></i>
                                    </div>
                                    <div class="text">
                                        <h5 class="title">Fishing & Boat</h5>
                                        <a href="#" class="btn-link">Read More <i class="far fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-6">
                                <div class="fancy-icon-box-three mb-30">
                                    <div class="icon">
                                        <i class="flaticon-caravan"></i>
                                    </div>
                                    <div class="text">
                                        <h5 class="title">Camping Trailer</h5>
                                        <a href="#" class="btn-link">Read More <i class="far fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why-choose-section gray-bg pt-100 pb-50">
        <div class="container">
            <div class="row align-items-xl-center">
                <div class="col-xl-7">
                    <div class="choose-content-box pr-lg-70">
                        <div class="section-title mb-45 wow fadeInDown">
                            {{-- <span class="sub-title">Why Choose Us</span> --}}
                            <h2>Mengapa Memilih Petualangan Perjalanan Kami</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="fancy-icon-box-four mb-45 wow fadeInUp">
                                    <div class="icon">
                                        <i class="flaticon-rabbit"></i>
                                    </div>
                                    <div class="text">
                                        <h4 class="title">Keamanan Terbaik</h4>
                                        <p>Kualitas keamanan terjamin</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="fancy-icon-box-four mb-45 wow fadeInUp">
                                    <div class="icon">
                                        <i class="flaticon-rabbit"></i>
                                    </div>
                                    <div class="text">
                                        <h4 class="title">Toilet</h4>
                                        <p>We denounce with righteous
                                            indignation and dislike</p>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-6">
                                <div class="fancy-icon-box-four mb-45 wow fadeInUp">
                                    <div class="icon">
                                        <i class="flaticon-wifi-router"></i>
                                    </div>
                                    <div class="text">
                                        <h4 class="title">Free Internet</h4>
                                        <p>We denounce with righteous
                                            indignation and dislike</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="fancy-icon-box-four mb-45 wow fadeInUp">
                                    <div class="icon">
                                        <i class="flaticon-solar-energy"></i>
                                    </div>
                                    <div class="text">
                                        <h4 class="title">Solar Energy</h4>
                                        <p>We denounce with righteous
                                            indignation and dislike</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="fancy-icon-box-four mb-45 wow fadeInUp">
                                    <div class="icon">
                                        <i class="flaticon-cycling"></i>
                                    </div>
                                    <div class="text">
                                        <h4 class="title">Mountain Biking</h4>
                                        <p>We denounce with righteous
                                            indignation and dislike</p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="experience-box text-center text-xl-right mb-50 wow fadeInRight">
                        <img src="assets/images/features/years.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="partners-section black-dark-bg">
        <div class="container">
            <div class="partner-slider-one pt-80 pb-70 wow fadeInUp">
                <div class="single-partner-item">
                    <div class="partner-img">
                        <a href="#"><img src="{{ $assets }}/images/partner/logo_plesiran_new_white.png" alt="Partner Image"></a>
                    </div>
                </div>
                {{-- <div class="single-partner-item">
                    <div class="partner-img">
                        <a href="#"><img src="assets/images/partner/partner-7.png" alt="Partner Image"></a>
                    </div>
                </div>
                <div class="single-partner-item">
                    <div class="partner-img">
                        <a href="#"><img src="assets/images/partner/partner-8.png" alt="Partner Image"></a>
                    </div>
                </div>
                <div class="single-partner-item">
                    <div class="partner-img">
                        <a href="#"><img src="assets/images/partner/partner-9.png" alt="Partner Image"></a>
                    </div>
                </div>
                <div class="single-partner-item">
                    <div class="partner-img">
                        <a href="#"><img src="assets/images/partner/partner-10.png" alt="Partner Image"></a>
                    </div>
                </div>
                <div class="single-partner-item">
                    <div class="partner-img">
                        <a href="#"><img src="assets/images/partner/partner-7.png" alt="Partner Image"></a>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    @include('layouts.fe_camping.footer')

    <a href="#" class="back-to-top" ><i class="far fa-angle-up"></i></a>

    <script src="{{ $assets }}/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ $assets }}/vendor/popper/popper.min.js"></script>
    <script src="{{ $assets }}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ $assets }}/vendor/slick/slick.min.js"></script>
    <script src="{{ $assets }}/vendor/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="{{ $assets }}/vendor/jquery.counterup.min.js"></script>
    <script src="{{ $assets }}/vendor/jquery.waypoints.js"></script>
    <script src="{{ $assets }}/vendor/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="{{ $assets }}/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="{{ $assets }}/vendor/wow.min.js"></script>
    <script src="{{ $assets }}/js/theme.js"></script>
</body>
</html>
