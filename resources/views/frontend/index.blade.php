@extends('layouts.frontend_2024.master')
@section('title')
    Pesona Plesiran Indonesia
@endsection
@section('description')
Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang menyediakan kemudahan dalam mendapat informasi dan pemesanan Akomodasi, Destinasi, Restoran, Transportasi, Travel dan MICE se-Indonesia.
@endsection
@section('keywords')
    tour, trip, travel, agency, life, vacation, climbing, wisata, pesona, plesiran, indonesia, pesona plesiran indonesia,
    pesona indonesia
@endsection
@section('canonical')
    {{ url('/') }}
@endsection
@section('content')

@php
    $asset = asset('frontend/new_1/');
@endphp

<section class="hero-layout5">
    <div class="position-relative">
        <div class="vs-carousel hero-slider2" data-slide-show="1" data-fade="true">
            <div class="hero-slide" data-bg-src="{{ $asset }}/assets/posting/bromo.webp">
                <div class="container">
                    <div class="row align-items-center justify-content-end">
                        <div class="col-lg-7">
                            <div class="hero-content">
                                <span class="hero-subtitle">Let’s Go Now</span>
                                <h1 class="hero-title">Gunung Bromo</h1>
                                <a href="javascript:void()" class="vs-btn style5">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-slide" data-bg-src="{{ $asset }}/assets/posting/kelingking-beach.webp">
                <div class="container">
                    <div class="row align-items-center justify-content-end">
                        <div class="col-lg-7">
                            <div class="hero-content">
                                <span class="hero-subtitle">Let’s Go Now</span>
                                <h1 class="hero-title">Pantai Kelingking</h1>
                                <a href="javascript:void()" class="vs-btn style5">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button class="icon-btn prev-btn" data-slick-prev=".hero-slider2"><i
                    class="fas fa-chevron-left"></i></button>
            <button class="icon-btn next-btn" data-slick-next=".hero-slider2"><i
                    class="fas fa-chevron-right"></i></button>
        </div>
    </div>
    {{-- <div class="hero-bottom">
        <form class="hero-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="form-group ">
                            <i class="fas fa-compass"></i>
                            <input type="text" placeholder="Where To?" />
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <i class="fas fa-calendar-alt"></i>
                            <select class="form-select" name="name">
                                <option value="" selected="selected" disabled="disabled" hidden="">
                                    Select Month</option>
                                <option value="">January</option>
                                <option value="">February</option>
                                <option value="">March</option>
                                <option value="">April</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <i class="fas fa-thumbtack"></i>
                            <select class="form-select" name="name">
                                <option value="" selected="selected" disabled="disabled" hidden="">
                                    Select Type</option>
                                <option value="">Adventure </option>
                                <option value="">Combining</option>
                                <option value="">Sporting</option>
                                <option value="">Domestic</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <button class="vs-btn style5">Find Now</button>
                    </div>
                </div>
        </form>
    </div> --}}
    </div>
</section>

{{-- <section class="space package-layout1">
    <div class="container ">
        <div class="row">
            <div class="col-lg-12 wow fadeInUp wow-animated" data-wow-delay="0.3s"
                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="package-top">
                    <div class="title-area">
                        <span class="sec-subtitle">Festered Tours</span>
                        <h2 class="sec-title h1">Most Favorite Tour Place</h2>
                    </div>
                    <div class="title-btn">
                        <a class="vs-btn style4" href="tour-booking.html">View all place</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="package-style2">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-4">
                    <div class="package-img">
                        <a href="tour-booking.html">
                            <img src="assets/img/tours/tour-5-1.jpg" alt="Package Image">
                        </a>
                        <div class="price-box">
                            <p class="price-text">Form</p>
                            <span class="package-price">$100.00</span>
                        </div>
                        <div class="package-icon">
                            <a href="tour-booking.html">
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="package-content">
                        <div class="package-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>5 (3)</span>
                        </div>
                        <h3 class="package-title"><a href="tour-booking.html">Over Turkish Waves</a></h3>
                        <p class="package-text">There are many variations of passages of Lorem Ipsum available, but
                            the majority have suffere</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="package-meta">
                        <ul>
                            <li>
                                <a href="#"><i
                                        class="fas fa-user-friends"></i><strong>Min:</strong>Age15+</a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-telegram-plane"></i><strong>Tour
                                        Type:</strong>Adventure. Fun</a>
                            </li>
                            <li>
                                <a href="#"><i
                                        class="fas fa-map-marker-alt"></i><strong>Location:</strong>Broadway, NY
                                    Morris Street.</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="package-style2">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-4">
                    <div class="package-img">
                        <a href="tour-booking.html">
                            <img src="assets/img/tours/tour-5-2.jpg" alt="Package Image">
                        </a>
                        <div class="price-box">
                            <p class="price-text">Form</p>
                            <span class="package-price">$105.00</span>
                        </div>
                        <div class="package-icon">
                            <a href="tour-booking.html">
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="package-content">
                        <div class="package-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>5 (4)</span>
                        </div>
                        <h3 class="package-title"><a href="tour-booking.html">Beach Bliss Exploration</a></h3>
                        <p class="package-text">There are many variations of passages of Lorem Ipsum available, but
                            the majority have suffere</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="package-meta">
                        <ul>
                            <li>
                                <a href="#"><i
                                        class="fas fa-user-friends"></i><strong>Min:</strong>Age15+</a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-telegram-plane"></i><strong>Tour
                                        Type:</strong>Adventure. Fun</a>
                            </li>
                            <li>
                                <a href="#"><i
                                        class="fas fa-map-marker-alt"></i><strong>Location:</strong>Broadway, NY
                                    Morris Street.</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="package-style2 pb-0">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-4">
                    <div class="package-img">
                        <a href="tour-booking.html">
                            <img src="assets/img/tours/tour-5-3.jpg" alt="Package Image">
                        </a>
                        <div class="price-box">
                            <p class="price-text">Form</p>
                            <span class="package-price">$90.00</span>
                        </div>
                        <div class="package-icon">
                            <a href="tour-booking.html">
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="package-content">
                        <div class="package-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>5 (4)</span>
                        </div>
                        <h3 class="package-title"><a href="tour-booking.html">US Skyline Adventure</a></h3>
                        <p class="package-text">There are many variations of passages of Lorem Ipsum available, but
                            the majority have suffere</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="package-meta">
                        <ul>
                            <li>
                                <a href="#"><i
                                        class="fas fa-user-friends"></i><strong>Min:</strong>Age15+</a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-telegram-plane"></i><strong>Tour
                                        Type:</strong>Adventure. Fun</a>
                            </li>
                            <li>
                                <a href="#"><i
                                        class="fas fa-map-marker-alt"></i><strong>Location:</strong>Broadway, NY
                                    Morris Street.</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
{{-- <section class="tour--layout4 space space-extra-bottom shape-mockup-wrap">
    <div class="container ">
        <div class="row justify-content-center text-center">
            <div class="col-xl-6 col-lg-8 wow fadeInUp" data-wow-delay="0.3s">
                <div class="title-area">
                    <span class="sec-subtitle">Awesome Tours</span>
                    <h2 class="sec-title h1">Best Holiday Package</h2>
                    <p class="sec-text">Curabitur aliquet quam id dui posuere blandit. Vivamus magna justo, lacinia
                        eget
                        consectetur sed, convgallis at tellus. Vestibulum ac diam sit.</p>
                </div>
            </div>
        </div>
        <div class="row vs-carousel" data-slide-show="3" data-arrows="false" data-lg-slide-show="3"
            data-md-slide-show="2" data-sm-slide-show="1">
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="package-style3">
                    <div class="package-img">
                        <a href="tour-booking.html"><img class="w-100"
                                src="{{ $asset }}/assets/img/tours/tour-4-1.jpg" alt="Package Image"></a>
                    </div>
                    <div class="package-content">
                        <p class="package-text">Las Vegas, Nevada</p>
                        <h3 class="package-title"><a href="tour-booking.html">Peek Mountain View</a></h3>
                        <div class="package-meta">
                            <a href="#"><i class="fas fa-calendar-alt"></i> Days: 4</a>
                            <a href="#"><i class="fas fa-user"></i> People: 3</a>
                        </div>
                        <div class="package-footer">
                            <div class="package-review">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="package-price">
                                Free
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="package-style3">
                    <div class="package-img">
                        <a href="tour-booking.html"><img class="w-100"
                                src="{{ $asset }}/assets/img/tours/tour-4-2.jpg" alt="Package Image"></a>
                    </div>
                    <div class="package-content">
                        <p class="package-text">Las Vegas, Nevada</p>
                        <h3 class="package-title"><a href="tour-booking.html">Relax With Beach View</a></h3>
                        <div class="package-meta">
                            <a href="#"><i class="fas fa-calendar-alt"></i> Days: 4</a>
                            <a href="#"><i class="fas fa-user"></i> People: 3</a>
                        </div>
                        <div class="package-footer">
                            <div class="package-review">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="package-price">
                                <span>From</span>
                                $199
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="package-style3">
                    <div class="package-img">
                        <a href="tour-booking.html"><img class="w-100"
                                src="{{ $asset }}/assets/img/tours/tour-4-3.jpg" alt="Package Image"></a>
                    </div>
                    <div class="package-content">
                        <p class="package-text">Las Vegas, Nevada</p>
                        <h3 class="package-title"><a href="tour-booking.html">Explore Our World</a></h3>
                        <div class="package-meta">
                            <a href="#"><i class="fas fa-calendar-alt"></i> Days: 4</a>
                            <a href="#"><i class="fas fa-user"></i> People: 3</a>
                        </div>
                        <div class="package-footer">
                            <div class="package-review">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="package-price">
                                <span>From</span>
                                $299
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="package-style3">
                    <div class="package-img">
                        <a href="tour-booking.html"><img class="w-100"
                                src="{{ $asset }}/assets/img/tours/tour-4-4.jpg" alt="Package Image"></a>
                    </div>
                    <div class="package-content">
                        <p class="package-text">Las Vegas, Nevada</p>
                        <h3 class="package-title"><a href="tour-booking.html">Touch your sea life</a></h3>
                        <div class="package-meta">
                            <a href="#"><i class="fas fa-calendar-alt"></i> Days: 4</a>
                            <a href="#"><i class="fas fa-user"></i> People: 3</a>
                        </div>
                        <div class="package-footer">
                            <div class="package-review">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="package-price">
                                <span>From</span>
                                $399
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

{{-- <section class="brand--layout5 space-top space-extra-bottom"
    data-bg-src="{{ $asset }}/assets/img/bg/bg-5-1.jpg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-30">
                <div class="white-title2">
                    <span class="sec-subtitle">70% Discount Offer</span>
                    <h2 class="sec-title h1">Partner Kami</h2>
                    <p class="sec-text pe-xl-5">Kami telah bekerja sama dengan.</p>
                    <div class="pt-lg-3">
                        <a href="contact.html" class="vs-btn style5">Discover More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="brand__list">
                    <span class="line one"></span>
                    <span class="line two"></span>
                    <span class="line three"></span>
                    <div class="brand-item">
                        <img src="{{ asset('frontend/logo/logo_plesiran_malang.png') }}" style="filter: brightness(0) invert(1);">
                    </div>
                    <div class="brand-item">
                        <img src="{{ $asset }}/assets/img/brand/brand-2.png" alt="brand">
                    </div>
                    <div class="brand-item">
                        <img src="{{ $asset }}/assets/img/brand/brand-3.png" alt="brand">
                    </div>
                    <div class="brand-item">
                        <img src="{{ $asset }}/assets/img/brand/brand-4.png" alt="brand">
                    </div>
                    <div class="brand-item">
                        <img src="{{ $asset }}/assets/img/brand/brand-5.png" alt="brand">
                    </div>
                    <div class="brand-item">
                        <img src="{{ $asset }}/assets/img/brand/brand-6.png" alt="brand">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<section class="about--layout5 space-top space-extra-bottom shape-mockup-wrap">
    <div class="shape-mockup d-none d-xl-block z-index-n1" data-bottom="-1%" data-right="0%">
        <img src="{{ $asset }}/assets/img/shape/about-shape-5-1.svg" alt="svg">
    </div>
    <div class="element"></div>
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-6">
                <div class="img-box5">
                    <div class="img-box__img1">
                        {{-- <img class="img1" src="{{ $asset }}/assets/img/about/about-5-1.jpg" --}}
                        <img class="img1" src="{{ $asset }}/assets/posting/surabaya.webp"
                            alt="Surabaya"
                            style="width: 200px;
                            height: 320px;
                            object-fit: cover;">
                        <img class="img2" src="{{ $asset }}/assets/posting/malang.webp" alt="Malang"
                            style="width: 317px;
                            height: 372px;
                            object-fit: cover;">
                    </div>
                    <div class="img-box__img2">
                        <img class="img3" src="{{ $asset }}/assets/posting/bali.webp" alt="Bali"
                            style="width: 531px;
                            height: 343px;
                            object-fit: cover;">
                    </div>
                    <div class="vs-card style2">
                        <div class="vs-card__icon"
                            data-bg-src="{{ $asset }}/assets/img/shape/card-bg-1.svg">
                            <img src="{{ $asset }}/assets/img/icons/phone-icon-2.svg" alt="">
                        </div>
                        <span>Whatsapp</span>
                        <a href="tel:+6281331126991">0813-3112-6991</a>
                        <p>Apakah Anda Masih Memiliki Pertanyaan?</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-content">
                    <div class="element"></div>
                    <div class="title-area">
                        {{-- <span class="sec-subtitle">Adventure & Travels</span> --}}
                        <h2 class="sec-title h1 mb-30">Apa Itu Pesona Plesiran Indonesia ?</h2>
                        <p class="sec-text2 pe-xl-4 mb-30">Pesona Plesiran Indonesia adalah Platform Digital
                            Marketing milenial yang
                            menyediakan kemudahan dalam mendapat informasi dan pemesanan Akomodasi, Destinasi,
                            Restoran,
                            Transportasi, Travel dan MICE se-Indonesia.
                        </p>
                    </div>
                    {{-- <div class="vs-card">
                        <div class="vs-card__img">
                            <img src="{{ $asset }}/assets/img/about/card-img-5-1.jpg" alt="card image">
                        </div>
                        <span class="sec-subtitle">Excellent Opportunity to Travel & Experience Adventure</span>
                    </div> --}}
                    <a href="javascript:void()" class="vs-btn style5">Discover More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="feature--layout5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-30">
                    <div class="item style2">
                        <div class="item__icon">
                            <img src="{{ $asset }}/assets/img/icons/feature-icon-5-1.svg" alt="icon 1">
                        </div>
                        <div class="item__content">
                            <h3 class="item__title h4">Jaminan Harga Terbaik</h3>
                            {{-- <p class="item__text">There are many variations of passages of Lorem Ipsum available.
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-30">
                    <div class="item style2">
                        <div class="item__icon">
                            <img src="{{ $asset }}/assets/img/icons/feature-icon-5-2.svg" alt="icon 1">
                        </div>
                        <div class="item__content">
                            <h3 class="item__title h4">Pemesanan Mudah & Cepat</h3>
                            {{-- <p class="item__text">There are many variations of passages of Lorem Ipsum available.
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-30">
                    <div class="item style2">
                        <div class="item__icon">
                            <img src="{{ $asset }}/assets/img/icons/feature-icon-5-3.svg" alt="icon 1">
                        </div>
                        <div class="item__content">
                            <h3 class="item__title h4">Pilihan Tour Terbaik</h3>
                            {{-- <p class="item__text">There are many variations of passages of Lorem Ipsum available.
                            </p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="space space-bottom">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-7 mx-auto">
                <div class="title-area text-center">
                    <span class="sec-subtitle">Top Destinasi</span>
                    <h2 class="sec-title h1">Jelajahi Tempat-Tempat Indah di Seluruh Indonesia</h2>
                </div>
            </div>
        </div>
        <div class="destination-list">
            <div class="destination-style3" data-bg-src="{{ $asset }}/assets/posting/surabaya.webp">
                <div class="destination-info">
                    <h4 class="destination-name"><a href="#">Surabaya</a></h4>
                    {{-- <p class="destination-text">Explore Sea & Get Relax</p>
                    <span class="destination-price">$259</span> --}}
                </div>
            </div>
            <div class="destination-style3" data-bg-src="{{ $asset }}/assets/posting/malang.webp">
                <div class="destination-info">
                    <h4 class="destination-name"><a href="#">Malang</a></h4>
                    {{-- <p class="destination-text">Explore Sea & Get Relax</p>
                    <span class="destination-price">$259</span> --}}
                </div>
            </div>
            <div class="destination-style3" data-bg-src="{{ $asset }}/assets/posting/yogyakarta.webp">
                <div class="destination-info">
                    <h4 class="destination-name"><a href="#">Yogyakarta</a></h4>
                    {{-- <p class="destination-text">Explore Sea & Get Relax</p>
                    <span class="destination-price">$259</span> --}}
                </div>
            </div>
            <div class="destination-style3" data-bg-src="{{ $asset }}/assets/posting/bali.webp">
                <div class="destination-info">
                    <h4 class="destination-name"><a href="#">Bali</a></h4>
                    {{-- <p class="destination-text">Explore Sea & Get Relax</p>
                    <span class="destination-price">$259</span> --}}
                </div>
            </div>
            <div class="destination-style3" data-bg-src="{{ $asset }}/assets/posting/kawah_ijen.webp">
                <div class="destination-info">
                    <h4 class="destination-name"><a href="#">Banyuwangi</a></h4>
                    {{-- <p class="destination-text">Explore Sea & Get Relax</p>
                    <span class="destination-price">$259</span> --}}
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <section class="video--layout5" data-bg-src="{{ $asset }}/assets/img/gallery/gallery-4-1.jpg">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="video-content">
                    <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn style2 popup-video"><i
                            class="fas fa-play"></i></a>
                    <div class="white-title2">
                        <span class="sec-subtitle">Are Your Ready To Travel?</span>
                        <h2 class="sec-title h1">Tevily is a World Leading Online Tour Booking Platform</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

{{-- <section class="cate--layout5">
    <div class="container">
        <div class="cate__box" data-bg-src="{{ $asset }}/assets/img/shape/cate-bg.png">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="title-area white-title text-center">
                        <span class="sec-subtitle">Choose Categories</span>
                        <h2 class="sec-title h1">Choose Tour Types</h2>
                    </div>
                </div>
            </div>
            <div class="cate__list">
                <a class="cate-block" href="destinations.html">
                    <i class="cate-block__icon">
                        <svg width="64" height="43" viewBox="0 0 64 43" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M62.0207 35.4181L61.0802 38.2194L55.5202 36.8298L53.6375 16.4284L32.0009 0L10.3625 16.4284L8.47812 36.8296L2.91975 38.2192L1.97763 35.418L0 36.1985L2.8655 42.4745H4.35L3.3045 39.3633L8.36112 38.0981L7.95787 42.4745H32.0009V24.0423C32.0009 24.0423 35.2054 30.0522 42.4176 33.2575C42.4176 33.2575 42.4194 38.0549 44.6614 42.4745H56.0424L55.6374 38.0981L60.6958 39.3633L59.6501 42.4745H61.1346L64 36.1985L62.0207 35.4181Z"
                                fill="currentColor" />
                        </svg>
                    </i>
                    <span>Windsurfing</span>
                </a>
                <a class="cate-block" href="destinations.html">
                    <i class="cate-block__icon">
                        <svg width="46" height="60" viewBox="0 0 46 60" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M45.5591 20.7209C45.3968 9.2702 35.2454 0 22.7836 0C10.2206 0 0 9.41971 0 20.998C0 21.0086 0.00274492 21.018 0.00303904 21.0286C0.00411747 21.0806 0.0116669 21.1321 0.0186277 21.184C0.0239218 21.2237 0.0269607 21.2641 0.0355881 21.3027C0.0455881 21.3473 0.0617648 21.39 0.0761765 21.4337C0.0905883 21.4774 0.103137 21.5213 0.121764 21.563C0.137843 21.5992 0.159607 21.6333 0.179019 21.6686C0.204313 21.7142 0.228823 21.7598 0.259117 21.8021C0.265196 21.8107 0.268529 21.8201 0.275 21.8284L18.3664 46.1237L16.1764 47.4025C15.5133 47.7897 15.2899 48.6406 15.6769 49.3036C15.9354 49.7465 16.4005 49.993 16.8786 49.993C17.1166 49.993 17.3578 49.9316 17.578 49.8031L19.0197 48.9614V52.9135V58.6098C19.0197 59.3776 19.6422 59.9998 20.4097 59.9998C21.1773 59.9998 21.7997 59.3776 21.7997 58.6098V54.3034H23.7926V58.6098C23.7926 59.3776 24.4151 59.9998 25.1826 59.9998C25.9502 59.9998 26.5726 59.3776 26.5726 58.6098V52.9137V49.1427L27.7043 49.8035C27.9248 49.932 28.1658 49.9934 28.4037 49.9934C28.8819 49.9934 29.3473 49.7466 29.6055 49.304C29.9927 48.641 29.7689 47.7901 29.106 47.4028L27.132 46.2503L45.3174 21.8287C45.5636 21.4979 45.6356 21.0951 45.5591 20.7209ZM25.6333 38.9677C25.0821 37.967 24.0174 37.2873 22.7965 37.2873C21.5755 37.2873 20.5108 37.9673 19.9596 38.9677L15.8373 22.388H29.7557L25.6333 38.9677ZM4.15794 22.388H12.9727L17.3912 40.1592L4.15794 22.388ZM32.62 22.388H41.4345L28.2017 40.1589L32.62 22.388Z"
                                fill="currentColor" />
                        </svg>
                    </i>
                    <span>Windsurfing</span>
                </a>
                <a class="cate-block" href="destinations.html">
                    <i class="cate-block__icon">
                        <svg width="57" height="63" viewBox="0 0 57 63" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M28.7246 6.03173C28.7246 6.82383 28.5686 7.60817 28.2655 8.33998C27.9624 9.07178 27.5181 9.73671 26.958 10.2968C26.3979 10.8569 25.733 11.3012 25.0011 11.6043C24.2693 11.9075 23.485 12.0635 22.6929 12.0635C21.9008 12.0635 21.1165 11.9075 20.3847 11.6043C19.6529 11.3012 18.9879 10.8569 18.4278 10.2968C17.8677 9.73671 17.4234 9.07178 17.1203 8.33998C16.8172 7.60817 16.6612 6.82383 16.6612 6.03173C16.6612 5.23963 16.8172 4.45529 17.1203 3.72349C17.4234 2.99169 17.8677 2.32675 18.4278 1.76665C18.9879 1.20656 19.6529 0.762261 20.3847 0.459138C21.1165 0.156015 21.9008 -6.8475e-09 22.6929 0C23.485 0 24.2693 0.156015 25.0011 0.459138C25.733 0.762261 26.3979 1.20656 26.958 1.76665C27.5181 2.32675 27.9624 2.99169 28.2655 3.72349C28.5686 4.45529 28.7246 5.23963 28.7246 6.03173ZM3.75771 14.3524L11.2891 15.1562L12.2435 15.258C12.7122 15.308 13.1774 15.2618 13.628 15.1581C13.1281 15.9139 12.7691 16.7772 12.6398 17.7353L11.4181 26.7538L16.7118 23.7558L14.8411 18.5742C14.3402 17.1864 14.4786 15.7296 15.0901 14.5064C15.1686 14.4515 15.2544 14.41 15.3294 14.3494C15.8536 13.9259 16.2456 13.3791 16.5137 12.7743C16.6891 12.3788 16.8218 11.9629 16.8685 11.5244C16.9045 11.1882 16.8887 10.8602 16.8472 10.5388C16.6036 8.65484 15.107 7.11021 13.1351 6.89954L4.64609 5.99389C3.53828 5.87554 2.42958 6.20202 1.56241 6.90132C0.696253 7.60189 0.142222 8.61649 0.0241273 9.72734C-0.222475 12.0359 1.44927 14.1059 3.75771 14.3524ZM56.1123 27.0005C55.1986 26.3122 53.8998 26.4961 53.2136 27.4088L45.4442 37.7322C45.2906 37.9373 45.1754 38.1678 45.1057 38.4144L41.9068 49.7273L36.9979 50.4287C36.7432 50.4652 36.4976 50.548 36.2732 50.6753L22.0627 58.6993C21.0671 59.2612 20.7164 60.5237 21.2783 61.5192C21.6584 62.1934 22.3598 62.5714 23.0825 62.5714C23.4271 62.5714 23.7768 62.4855 24.0981 62.3036L37.9691 54.4716L43.825 53.6348C44.6347 53.5196 45.3007 52.9374 45.5241 52.1491L48.9848 39.9134L56.5206 29.8994C57.209 28.9855 57.025 27.6878 56.1123 27.0005ZM32.8519 49.6655L31.5753 40.8592C31.4277 39.8425 30.8557 38.9368 30.0016 38.3658L24.8259 34.91L23.0077 33.6961C23.0156 33.6431 23.0255 33.5761 23.0378 33.4901L23.1674 32.5322L22.1038 32.2398C20.4826 31.7941 19.1789 30.5883 18.6078 29.0076L17.4249 25.7306L11.0691 29.33C11.0691 29.33 10.8158 31.1993 10.7315 31.8223C10.6602 32.3484 10.6461 34.0797 10.8791 34.8271C11.2473 36.0088 12.3531 39.554 12.3531 39.554L14.3327 45.9024L11.5643 56.4288C11.0548 58.3643 12.2111 60.3454 14.1456 60.8537C14.455 60.9346 14.7652 60.974 15.0694 60.974C16.6754 60.974 18.1429 59.8975 18.5705 58.2724L21.6036 46.7392C21.7765 46.0812 21.7613 45.3878 21.5582 44.739L20.2585 40.5716L24.6368 43.4948L25.6817 50.7041C25.9436 52.5083 27.4919 53.808 29.2627 53.807C29.4355 53.807 29.6103 53.7949 29.7862 53.7697C31.7664 53.4831 33.139 51.6456 32.8519 49.6655ZM22.6286 15.7624C22.0474 14.1503 20.2676 13.3115 18.6546 13.8966C17.0415 14.4788 16.2056 16.2576 16.7888 17.8707L20.5558 28.3042C20.8974 29.2533 21.6797 29.977 22.653 30.2437L32.4173 32.9282C32.6922 33.004 32.9692 33.0404 33.2421 33.0404C34.6045 33.0404 35.8548 32.1358 36.2338 30.7573C36.6887 29.1038 35.7164 27.3956 34.0628 26.9409L25.8497 24.683L22.6286 15.7624ZM8.67985 31.5446L9.03528 28.921L2.32088 20.9423L1.328 30.252C1.08152 32.5603 2.75314 34.6301 5.06158 34.877L9.07389 35.3049C8.67389 34.1293 8.50195 32.859 8.67985 31.5446ZM2.90768 15.4398L2.62488 18.0908L9.41014 26.1525L10.588 17.4572C10.643 17.0514 10.7579 16.6711 10.8673 16.2887L2.90768 15.4398Z"
                                fill="currentColor" />
                        </svg>
                    </i>
                    <span>Windsurfing</span>
                </a>
                <a class="cate-block" href="destinations.html">
                    <i class="cate-block__icon">
                        <svg width="72" height="46" viewBox="0 0 72 46" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M41.5495 24.0625C43.4172 24.6936 45.4476 23.7463 46.0999 21.9249C46.7494 20.1079 45.7586 18.1328 43.8895 17.5003C42.019 16.8678 39.9886 17.8323 39.3392 19.6494C38.7041 21.4592 39.6804 23.4487 41.5495 24.0625ZM70.8505 1.41451C70.8505 1.41451 58.7603 0 33.6512 0C15.13 0 0 1.41451 0 1.41451C0 1.41451 6.27405 4.10122 5.18541 12.4302C5.18541 12.4302 14.1882 11.3865 17.9596 18.8846L34.8694 13.8979L33.7635 24.869L26.6111 26.5753C25.9775 26.7176 25.4418 27.0181 25.004 27.3961L9.31243 42.1263C8.38652 42.9788 8.37068 44.4177 9.26491 45.3003C10.1419 46.2031 11.6207 46.2347 12.5308 45.3808L24.3373 34.3206L38.802 30.8763L38.7041 30.9065L41.1089 30.3056L43.3193 32.7566C43.6606 33.1189 44.1473 33.3402 44.6686 33.3402L52.4532 33.3704C53.4295 33.3704 54.2402 32.597 54.2402 31.6325C54.2402 30.7944 53.6397 30.1475 52.8434 29.9563L47.0417 10.3185L71.2076 3.1999C72.3625 2.70827 72.2646 1.56401 70.8505 1.41451ZM51.1053 29.8773C49.3342 29.8773 46.375 29.8615 45.4822 29.8615L41.2875 25.247L41.1089 25.1205C40.2636 24.1574 38.9158 23.6528 37.568 23.9662L35.4699 24.4737L36.5917 13.3919L45.4476 10.7857L51.1053 29.8773Z"
                                fill="currentColor" />
                        </svg>
                    </i>
                    <span>Windsurfing</span>
                </a>
                <a class="cate-block" href="destinations.html">
                    <i class="cate-block__icon">
                        <svg width="70" height="44" viewBox="0 0 70 44" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M69.9104 36.3665C69.4096 34.77 67.0981 32.4372 67.3791 29.3204C67.66 26.2046 70.1373 19.0865 69.4943 16.0482C68.8514 13.0099 65.6273 4.07709 57.2913 2.72614C48.959 1.37575 42.9744 3.61739 39.7785 3.47354C36.5848 3.32913 36.0038 0.914366 32.4734 0.945613C27.9164 0.987839 27.1318 2.87928 23.91 3.89383C21.5476 4.63842 14.1484 4.62941 14.1484 4.62941C14.1484 4.62941 12.0315 1.86727 11.3863 2.87928C10.7411 3.89186 9.91232 6.47046 9.91232 6.47046C9.91232 6.47046 5.95209 7.85125 5.58529 8.58964C5.2182 9.32804 4.71431 10.5253 4.71431 10.5253C4.71431 10.5253 0.520138 11.6279 0.0601563 12.6405C-0.399544 13.6525 1.9029 16.0456 2.63904 16.8766C3.37518 17.7074 11.9386 17.8892 13.2958 18.8891C14.6523 19.8904 18.4515 20.6418 20.5733 21.0061C24.5552 21.6915 26.3053 29.6013 27.3173 38.3497C26.1198 39.3639 24.0023 40.262 23.8877 43.0551H36.8691C36.8691 43.0551 37.0417 41.1904 37.2618 38.8812C37.4786 36.572 41.4053 27.8312 41.4053 27.8312C41.4053 27.8312 44.2584 30.0413 46.1932 30.1362C46.0113 31.8846 46.8271 33.7448 46.8271 33.7448C46.8271 33.7448 48.4982 35.7517 50.1224 37.3399C47.1489 38.5662 47.2356 40.729 47.2356 40.729L58.2552 40.8146C58.2552 40.8146 59.3595 38.5144 59.3595 36.6711C60.8363 38.7908 63.6894 39.619 63.6894 39.619L61.9148 43.0551H68.6484C68.6526 43.0528 70.4115 37.9615 69.9104 36.3665ZM8.01807 11.0064C7.53359 11.0064 7.14343 10.6137 7.14343 10.1315C7.14343 9.65036 7.53359 9.25597 8.01807 9.25597C8.49973 9.25597 8.89355 9.64811 8.89355 10.1315C8.89355 10.6182 8.49747 11.0064 8.01807 11.0064Z"
                                fill="currentColor" />
                        </svg>
                    </i>
                    <span>Windsurfing</span>
                </a>
            </div>
        </div>
    </div>
</section> --}}

<section class="space-top space-bottom testimonial-style5"
    data-bg-src="{{ $asset }}/assets/img/shape/client-bg-shape.png">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <div class="title-area">
                    <span class="sec-subtitle">Testimoni Klien</span>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="title-area text-end">
                    <button class="icon-btn prev-btn" data-slick-prev=".testimonial-slider5"><i
                            class="fas fa-chevron-left"></i></button>
                    <button class="icon-btn next-btn" data-slick-next=".testimonial-slider5"><i
                            class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
        <div class="row vs-carousel testimonial-slider5" data-slide-show="3" data-arrows="false"
            data-lg-slide-show="2" data-md-slide-show="1" data-sm-slide-show="1">
            <div class="col-xl-4">
                <div class="testi-style5">
                    <div class="testi-body">
                        <div class="testi-header">
                            {{-- <div class="testi-avater">
                                <img src="{{ $asset }}/assets/img/testimonial/testimonial-2-1.jpg"
                                    alt="customer image">
                            </div> --}}
                            <div class="testi-client">
                                <div class="testi-rating">
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                </div>
                                <h3 class="testi-name">Fabrizio Danindra</h3>
                                <span class="testi-degi">Customer</span>
                            </div>
                        </div>
                        <p class="testi-text">Guide ramah dan pelayanannya sangat baik.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="testi-style5">
                    <div class="testi-body">
                        <div class="testi-header">
                            {{-- <div class="testi-avater">
                                <img src="{{ $asset }}/assets/img/testimonial/testimonial-2-2.jpg"
                                    alt="customer image">
                            </div> --}}
                            <div class="testi-client">
                                <div class="testi-rating">
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                </div>
                                <h3 class="testi-name">Daffa Afzal</h3>
                                <span class="testi-degi">Customer</span>
                            </div>
                        </div>
                        <p class="testi-text">TL e nya ramah" dan pembawaan dalam pelayanannya juga baik.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="testi-style5">
                    <div class="testi-body">
                        <div class="testi-header">
                            {{-- <div class="testi-avater">
                                <img src="{{ $asset }}/assets/img/testimonial/testimonial-2-3.jpg"
                                    alt="customer image">
                            </div> --}}
                            <div class="testi-client">
                                <div class="testi-rating">
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                </div>
                                <h3 class="testi-name">Yusuf Yoga A.</h3>
                                <span class="testi-degi">Customer</span>
                            </div>
                        </div>
                        <p class="testi-text">Pelayanan ramah, harga terjangkau, guide nya sopan. Top pokoknya.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="testi-style5">
                    <div class="testi-body">
                        <div class="testi-header">
                            {{-- <div class="testi-avater">
                                <img src="{{ $asset }}/assets/img/testimonial/testimonial-2-5.jpg"
                                    alt="customer image">
                            </div> --}}
                            <div class="testi-client">
                                <div class="testi-rating">
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                    <i>
                                        <img src="{{ $asset }}/assets/img/icons/star-icon.svg"
                                            alt="star icon">
                                    </i>
                                </div>
                                <h3 class="testi-name">Donny Prasetiyo</h3>
                                <span class="testi-degi">Customer</span>
                            </div>
                        </div>
                        <p class="testi-text">Pelayanan mantab...ramah" pemandu wisata nya...hasil nya baik foto
                            maupun video cynematicnya juga joss pkok nya 👍💯.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <section class="benefits--layout1 space-top space-extra-bottom">
    <div class="benefits-element1"></div>
    <div class="img1" data-bg-src="{{ $asset }}/assets/img/benefits/b-4-1.jpg"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-6 mb-30">
                <div class="title-area">
                    <span class="sec-subtitle">Our Benefits List</span>
                    <h2 class="sec-title h1">Why You Should Choose Our Trevolo?</h2>
                    <p class="sec-text pe-xl-5">There are many variations of passages of available, but the
                        majority have of
                        suffered
                        alteration in There are many variations of passages.</p>
                </div>
                <div class="item">
                    <div class="item__icon">
                        <img src="{{ $asset }}/assets/img/icons/icon-1.svg" alt="icon 1">
                    </div>
                    <div class="item__content">
                        <h3 class="item__title h4">Best Price Guarantee</h3>
                        <p class="item__text">The majority have passages of suffered alteration in There are many
                            variations of
                            passages.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="item__icon">
                        <img src="{{ $asset }}/assets/img/icons/icon-2.svg" alt="icon 1">
                    </div>
                    <div class="item__content">
                        <h3 class="item__title h4">Easy & Quick Booking</h3>
                        <p class="item__text">The majority have passages of suffered alteration in There are many
                            variations of
                            passages.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="item__icon">
                        <img src="{{ $asset }}/assets/img/icons/icon-3.svg" alt="icon 1">
                    </div>
                    <div class="item__content">
                        <h3 class="item__title h4">Experienced Guide</h3>
                        <p class="item__text">The majority have passages of suffered alteration in There are many
                            variations of
                            passages.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

{{-- <div class="offer--layout">
    <div class="container">
        <div class="offer-block style2" data-bg-src="{{ $asset }}/assets/img/bg/offer-bg-4.jpg">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-30">
                    <div class="white-title">
                        <span class="sec-subtitle">Special offer for you</span>
                        <h2 class="sec-title mb-0">Start your Journey with a Single Click</h2>
                    </div>
                </div>
                <div class="col-lg-4 text-md-end text-center mb-30">
                    <a href="contact.html" class="vs-btn style5">Discover More</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- <section class="space space-extra-bottom blog-wrapper">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xl-7 col-lg-8 wow fadeInUp" data-wow-delay="0.3s">
                <div class="title-area">
                    <span class="sec-subtitle">News & Articles</span>
                    <h2 class="sec-title h1">Latest News & Articles From The Blog Posts</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="vs-blog blog-style6">
                    <div class="blog-img">
                        <a href="blog-details.html">
                            <img src="{{ $asset }}/assets/img/blog/blog-5-1.jpg" alt="blog 5 1">
                        </a>
                    </div>
                    <div class="blog-content">
                        <div class="blog-body">
                            <div class="blog-top">
                                <a class="blog-meta" href="blog-details.html">
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M17 8.5C17 13.1944 13.1944 17 8.5 17C3.80558 17 0 13.1944 0 8.5C0 3.80558 3.80558 0 8.5 0C13.1944 0 17 3.80558 17 8.5ZM11.05 5.95C11.05 7.35837 9.90837 8.5 8.5 8.5C7.09164 8.5 5.95 7.35837 5.95 5.95C5.95 4.54168 7.09164 3.4 8.5 3.4C9.90837 3.4 11.05 4.54168 11.05 5.95ZM8.5 15.725C10.0164 15.725 11.4237 15.2578 12.5859 14.4595C13.0992 14.1069 13.3185 13.4353 13.0201 12.8887C12.4015 11.7558 11.1267 11.05 8.49992 11.05C5.87324 11.05 4.59847 11.7557 3.97982 12.8887C3.68139 13.4353 3.90073 14.1069 4.41402 14.4594C5.57615 15.2578 6.98352 15.725 8.5 15.725Z"
                                            fill="#37D4D9" />
                                    </svg>
                                    by Trevolo
                                </a>
                                <a class="blog-meta" href="blog-details.html">
                                    <svg width="23" height="16" viewBox="0 0 23 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.8107 6.13925C16.8107 2.74862 13.0468 0 8.40535 0C3.76388 0 0 2.74862 0 6.13925C0 8.17692 1.3592 9.98219 3.4515 11.0988C3.44548 11.1166 1.78462 14.0825 1.78462 14.0825C1.78462 14.0825 6.85619 12.184 6.87023 12.1761C7.36789 12.2437 7.88094 12.2778 8.40535 12.2778C13.0468 12.2778 16.8107 9.52923 16.8107 6.13925ZM23 8.05744C23 4.66746 19.4569 1.94313 15.6214 1.91884C21.1197 7.29397 14.6441 13.021 9.36656 13.021C9.36656 13.021 9.95318 14.196 14.5947 14.196C15.1184 14.196 15.6321 14.1606 16.1298 14.0936C16.1438 14.1028 21.2161 16 21.2161 16C21.2161 16 19.5545 13.0348 19.5492 13.017C21.6408 11.9004 23 10.0944 23 8.05744Z"
                                            fill="#37D4D9" />
                                    </svg>
                                    2 Comments
                                </a>
                            </div>
                            <h2 class="blog-title h4"><a href="blog-details.html">The Travelling alone with the
                                    best
                                    Accommodations.</a></h2>
                            <p class="blog-text">Completely reinvent worldwide testing new with cooperative
                                leverage multimedia</p>
                            <div class="blog-bottom">
                                <a class="blog-link" href="blog-details.html">
                                    Read More
                                </a>
                                <a class="blog-date" href="blog-details.html"><span>25</span> MAR</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="vs-blog blog-style7">
                    <div class="blog-img">
                        <a href="blog-details.html">
                            <img src="{{ $asset }}/assets/img/blog/blog-5-2.jpg" alt="blog 5 1">
                        </a>
                    </div>
                    <div class="blog-content">
                        <div class="blog-body">
                            <div class="blog-top">
                                <a class="blog-meta" href="blog-details.html">
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M17 8.5C17 13.1944 13.1944 17 8.5 17C3.80558 17 0 13.1944 0 8.5C0 3.80558 3.80558 0 8.5 0C13.1944 0 17 3.80558 17 8.5ZM11.05 5.95C11.05 7.35837 9.90837 8.5 8.5 8.5C7.09164 8.5 5.95 7.35837 5.95 5.95C5.95 4.54168 7.09164 3.4 8.5 3.4C9.90837 3.4 11.05 4.54168 11.05 5.95ZM8.5 15.725C10.0164 15.725 11.4237 15.2578 12.5859 14.4595C13.0992 14.1069 13.3185 13.4353 13.0201 12.8887C12.4015 11.7558 11.1267 11.05 8.49992 11.05C5.87324 11.05 4.59847 11.7557 3.97982 12.8887C3.68139 13.4353 3.90073 14.1069 4.41402 14.4594C5.57615 15.2578 6.98352 15.725 8.5 15.725Z"
                                            fill="#37D4D9" />
                                    </svg>
                                    by Trevolo
                                </a>
                                <a class="blog-meta" href="blog-details.html">
                                    <svg width="23" height="16" viewBox="0 0 23 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.8107 6.13925C16.8107 2.74862 13.0468 0 8.40535 0C3.76388 0 0 2.74862 0 6.13925C0 8.17692 1.3592 9.98219 3.4515 11.0988C3.44548 11.1166 1.78462 14.0825 1.78462 14.0825C1.78462 14.0825 6.85619 12.184 6.87023 12.1761C7.36789 12.2437 7.88094 12.2778 8.40535 12.2778C13.0468 12.2778 16.8107 9.52923 16.8107 6.13925ZM23 8.05744C23 4.66746 19.4569 1.94313 15.6214 1.91884C21.1197 7.29397 14.6441 13.021 9.36656 13.021C9.36656 13.021 9.95318 14.196 14.5947 14.196C15.1184 14.196 15.6321 14.1606 16.1298 14.0936C16.1438 14.1028 21.2161 16 21.2161 16C21.2161 16 19.5545 13.0348 19.5492 13.017C21.6408 11.9004 23 10.0944 23 8.05744Z"
                                            fill="#37D4D9" />
                                    </svg>
                                    2 Comments
                                </a>
                            </div>
                            <h2 class="blog-title h4"><a href="blog-details.html">Our Business Thrives To
                                    Contribute Global</a></h2>
                            <p class="blog-text">Completely reinvent worldwide testing new with cooperative
                                leverage multimedia</p>
                            <div class="blog-bottom">
                                <a class="blog-link" href="blog-details.html">
                                    Read More
                                </a>
                                <a class="blog-date" href="blog-details.html"><span>25</span> MAR</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vs-blog blog-style7">
                    <div class="blog-img">
                        <a href="blog-details.html">
                            <img src="{{ $asset }}/assets/img/blog/blog-5-3.jpg" alt="blog 5 1">
                        </a>
                    </div>
                    <div class="blog-content">
                        <div class="blog-body">
                            <div class="blog-top">
                                <a class="blog-meta" href="blog-details.html">
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M17 8.5C17 13.1944 13.1944 17 8.5 17C3.80558 17 0 13.1944 0 8.5C0 3.80558 3.80558 0 8.5 0C13.1944 0 17 3.80558 17 8.5ZM11.05 5.95C11.05 7.35837 9.90837 8.5 8.5 8.5C7.09164 8.5 5.95 7.35837 5.95 5.95C5.95 4.54168 7.09164 3.4 8.5 3.4C9.90837 3.4 11.05 4.54168 11.05 5.95ZM8.5 15.725C10.0164 15.725 11.4237 15.2578 12.5859 14.4595C13.0992 14.1069 13.3185 13.4353 13.0201 12.8887C12.4015 11.7558 11.1267 11.05 8.49992 11.05C5.87324 11.05 4.59847 11.7557 3.97982 12.8887C3.68139 13.4353 3.90073 14.1069 4.41402 14.4594C5.57615 15.2578 6.98352 15.725 8.5 15.725Z"
                                            fill="#37D4D9" />
                                    </svg>
                                    by Trevolo
                                </a>
                                <a class="blog-meta" href="blog-details.html">
                                    <svg width="23" height="16" viewBox="0 0 23 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.8107 6.13925C16.8107 2.74862 13.0468 0 8.40535 0C3.76388 0 0 2.74862 0 6.13925C0 8.17692 1.3592 9.98219 3.4515 11.0988C3.44548 11.1166 1.78462 14.0825 1.78462 14.0825C1.78462 14.0825 6.85619 12.184 6.87023 12.1761C7.36789 12.2437 7.88094 12.2778 8.40535 12.2778C13.0468 12.2778 16.8107 9.52923 16.8107 6.13925ZM23 8.05744C23 4.66746 19.4569 1.94313 15.6214 1.91884C21.1197 7.29397 14.6441 13.021 9.36656 13.021C9.36656 13.021 9.95318 14.196 14.5947 14.196C15.1184 14.196 15.6321 14.1606 16.1298 14.0936C16.1438 14.1028 21.2161 16 21.2161 16C21.2161 16 19.5545 13.0348 19.5492 13.017C21.6408 11.9004 23 10.0944 23 8.05744Z"
                                            fill="#37D4D9" />
                                    </svg>
                                    2 Comments
                                </a>
                            </div>
                            <h2 class="blog-title h4"><a href="blog-details.html">Ephemeral Beauty: Japan’s Hidden
                                    Charms</a></h2>
                            <p class="blog-text">Completely reinvent worldwide testing new with cooperative
                                leverage multimedia</p>
                            <div class="blog-bottom">
                                <a class="blog-link" href="blog-details.html">
                                    Read More
                                </a>
                                <a class="blog-date" href="blog-details.html"><span>25</span> MAR</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection