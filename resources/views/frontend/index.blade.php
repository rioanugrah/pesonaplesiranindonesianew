@extends('layouts.frontend_2024.master')
@section('title')
    Pesona Plesiran Indonesia
@endsection
@section('description')
    Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang menyediakan kemudahan dalam mendapat informasi
    dan pemesanan Akomodasi, Destinasi, Restoran, Transportasi, Travel dan MICE se-Indonesia.
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
                <div class="hero-slide" data-bg-src="{{ $asset }}/assets/posting/kawah_ijen1.webp">
                    <div class="container">
                        <div class="row align-items-center justify-content-end">
                            <div class="col-lg-7">
                                <div class="hero-content">
                                    <span class="hero-subtitle">Let’s Go Now</span>
                                    <h1 class="hero-title">Kawah Ijen</h1>
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
        </div>
    </section>

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
                            <img class="img1" src="{{ $asset }}/assets/posting/surabaya.webp" alt="Surabaya"
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
                            <div class="vs-card__icon" data-bg-src="{{ $asset }}/assets/img/shape/card-bg-1.svg">
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
@endsection
@section('script')
    <script></script>
@endsection
