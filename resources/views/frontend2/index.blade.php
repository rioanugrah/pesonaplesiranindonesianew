@extends('layouts.frontend2_2024.master')
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
@section('canonical'){{ url('/') }}@endsection
@section('url'){{ url('/') }}@endsection
@section('content')
    <!-- Widget Slider -->
    <section class="slider-home4 relative"
    style="background-image: url({{ asset('frontend/assets/images/beautiful-diamond-bali.webp') }})">
    <div class="tf-container">
        <div class="row ">
            <div class="col-10 col-xl-9">
                <div class="home4-content z-index3">
                    <span class="sub-title font-yes text-second fs-28-46 wow fadeInUp animated">Explore
                        the Indonesia</span>
                    <h1 class="title-slide text-white mb-40 wow fadeInUp animated">Petualangan
                        <span class="animationtext clip text-main">
                            <span class="cd-words-wrapper">
                                <span class="item-text is-visible">Indonesia</span>
                            </span>
                        </span>
                        Bersama Pesona Plesiran Indonesia
                    </h1>
                    <div class="btn-group">
                        <a href="#" class="btn-main wow fadeInUp animated">
                            <p class="btn-main-text">Let,s get started</p>
                            <p class="iconer">
                                <i class="icon-arrow-right"></i>
                            </p>
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-2 col-xl-3 relative">
                <div class="video-wrap">
                    <a href="https://www.youtube.com/watch?v=Yb6KMxB3I1M"
                        class="widget-icon-video widget-videos flex-five z-index3">
                        <i class="icon-Polygon-4"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Widget Slider -->

<!-- Widget About Us -->
<section class="about-us-h4">
    <div class="tf-container">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="image-about-h4-wrap relative">
                    <div class="image-about-item relative about-wrap-left wow fadeInLeft animated "
                        data-wow-delay="0.1s">
                        <img src="{{ url('/frontend/') }}/assets/images/destinasi/bali1.webp"
                            alt="image"
                            style="width: 400px;
                            height: 500px;
                            object-fit: cover;">
                        <img src="{{ url('/frontend/') }}/assets/images/page/shape5.1.png"
                            alt="image" class="shape-about-h4">
                        <span class="quote">10.000+ Customer Berbagai Mancanegara</span>

                    </div>
                    <div class="image-about-item relative about-wrap-right wow fadeInUp animated "
                        data-wow-delay="0.1s">
                        <img src="{{ url('/frontend/') }}/assets/images/destinasi/surabaya.webp"
                            alt="image"
                            style="width: 400px;
                            height: 500px;
                            object-fit: cover;">
                        <img src="{{ url('/frontend/') }}/assets/images/page/shape5.1.png"
                            alt="image" class="shape-about-h4">

                    </div>
                    <div class="box-year center wow zoomIn animated " data-wow-delay="0.1s">
                        <span class="number">3+</span>
                        <p>Tahun <br> Pengalaman</p>
                    </div>

                </div>

            </div>
            <div class="col-md-12 col-lg-6 inner-content-about">
                <div class="mb-30">
                    <span
                        class="sub-title-heading text-main font-yes fs-28-46 wow fadeInUp animated">Explore
                        the
                        Indonesia</span>
                    <h2 class="title-heading mb-18 wow fadeInUp animated">Apa Itu Pesona Plesiran
                        Indonesia ?</h2>
                    <p class="des wow fadeInUp animated">Pesona Plesiran Indonesia adalah Platform
                        Digital Marketing milenial yang menyediakan kemudahan dalam mendapat informasi
                        dan pemesanan Akomodasi, Destinasi, Restoran, Transportasi, Travel dan MICE
                        se-Indonesia.</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="icon-box-style6">
                            <div class="icon relative">
                                <i class="icon-Group2"></i>
                            </div>
                            <div class="content">
                                <h6 class="title-icon wow fadeInUp animated"><a href="#">Panduan
                                        Perjalanan Tepercaya</a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="icon-box-style6">
                            <div class="icon relative">
                                <svg width="40" height="40" viewBox="0 0 40 40"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_214_218" style="mask-type:luminance"
                                        maskUnits="userSpaceOnUse" x="0" y="0" width="40"
                                        height="40">
                                        <path d="M0 0H40V40H0V0Z" fill="white" />
                                    </mask>
                                    <g mask="url(#mask0_214_218)">
                                        <path d="M20 23.125V38.8281H38.8281V12.2656H34.1406"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-miterlimit="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M5.85938 12.2656H1.17188V38.8281H20V23.2031"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-miterlimit="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M26.9598 9.14062H34.1406V34.1406H26.5035C23.5528 34.1406 20.933 36.0287 20 38.8281"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-miterlimit="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M13.0402 9.14062H5.85938V34.1406H13.4965C16.4472 34.1406 19.067 36.0287 20 38.8281"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-miterlimit="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M19.9999 1.17188C14.6972 1.17188 11.311 6.82758 13.815 11.5017L19.9999 23.0469L26.1848 11.5017C28.6888 6.82758 25.3025 1.17188 19.9999 1.17188Z"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-miterlimit="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M22.3438 8.20312C22.3438 9.4975 21.2944 10.5469 20 10.5469C18.7056 10.5469 17.6562 9.4975 17.6562 8.20312C17.6562 6.90875 18.7056 5.85937 20 5.85937C21.2944 5.85937 22.3438 6.90875 22.3438 8.20312Z"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-miterlimit="10" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                </svg>
                            </div>
                            <div class="content">
                                <h6 class="title-icon wow fadeInUp animated"><a
                                        href="#">Perjalanan yang Terpesona</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-three btn-wrap-about  mb-30 ">
                    <a href="#" class="btn-main wow fadeInUp animated">
                        <p class="btn-main-text">Lebih banyak tentang kami</p>
                        <p class="iconer">
                            <i class="icon-arrow-right"></i>
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Widget About Us -->

<!-- Widget activities -->
<section class="populer-activities-section bg-1">
    <div class="tf-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-30 center">
                    <span
                        class="sub-title-heading text-main font-yes fs-28-46 wow fadeInUp animated">Populer
                        Activities</span>
                    <h2 class="title-heading wow fadeInUp animated">Jelajahi Petualangan Nyata</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 relative populer-activities-slide">
                <div class="swiper populer-activities overflow-hidden">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="tf-widget-populer">
                                <div class="image relative">
                                    <img src="{{ url('frontend') }}/assets/images/destinasi/camp.webp"
                                        alt="Image"
                                        style="width: 400px;
                                        height: 400px;
                                        object-fit: cover;">
                                    <img src="{{ url('frontend') }}/assets/images/image-box/mask-box.png"
                                        alt="Image" class="mask-populer">
                                </div>
                                <div class="content relative center">
                                    <div class="icon flex-five">
                                        <i class="icon-Group"></i>
                                    </div>
                                    <h5 class="title-populer mb-18"><a href="#">Berkemah</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tf-widget-populer">
                                <div class="image relative">
                                    <img src="{{ url('frontend') }}/assets/images/destinasi/bromo.webp"
                                        alt="Image"
                                        style="width: 400px;
                                        height: 400px;
                                        object-fit: cover;">
                                    <img src="{{ url('frontend') }}/assets/images/image-box/mask-box.png"
                                        alt="Image" class="mask-populer">
                                </div>
                                <div class="content relative center">
                                    <div class="icon flex-five">
                                        <i class="icon-Group-1"></i>
                                    </div>
                                    <h5 class="title-populer mb-18"><a href="#">Wisata Bromo</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

</section>
<!-- Widget activities -->

<!-- Widget Video -->
<section class="widget-video-style2">
    <div class="tf-container">
        <div class="row ">
            <div class="col-lg-12">
                <div class="video-h4-widget relative overflow-hidden mb--14em video-wrap" style="background-image: url({{ asset('frontend/assets/images/beautiful-diamond-bali.webp') }})">
                    <a href="https://www.youtube.com/watch?v=Yb6KMxB3I1M"
                        class="video-box widget-videos flex-five z-index3 relative">
                        <i class="icon-Polygon-4"></i>
                    </a>
                    <P class="font-yes text-white center text-video z-index3 relative">Watch Video</P>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Widget Video -->

<!-- Widget feature -->
<section class="widget-feature3 bg-1">
    <div class="tf-container">
        <div class="row al-i-end mb-22">
            <div class="col-md-6">
                <span
                    class="sub-title-heading text-main font-yes fs-28-46 wow fadeInUp animated">Populer
                    Activities</span>
                <h2 class="title-heading wow fadeInUp animated">Extras features</h2>
            </div>
        </div>
        <div class="row">
            <div class=" col-lg-4">
                <div class="image-feature3">
                    <div class="image-feature relative">
                        <img src="{{ url('frontend') }}/assets/images/beautiful-diamond-bali.webp"
                            style="
                            width: 400px;
  height: 400px;
  object-fit: cover;
                            ">
                        <span class="text font-yes text-white">Never stop Exploring</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 box-feature-wrap">
                <div class="row">
                    <div class="col-md-6 mb-32 wow fadeInUp animated " data-wow-delay="0.1s">
                        <div class="tf-icon-box icon-box-style2 flex relative">
                            <div class="icon">
                                <i class="icon-Travel_insurance"></i>
                            </div>
                            <div class="content">
                                <h6 class="title-icon"><a href="#">Keselamatan selalu
                                        diutamakan</a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-32 wow fadeInUp animated " data-wow-delay="0.2s">
                        <div class="tf-icon-box icon-box-style2 flex relative">
                            <div class="icon">
                                <i class="icon-plane-1-1"></i>
                            </div>
                            <div class="content">
                                <h6 class="title-icon"><a href="#">Panduan perjalanan
                                        tepercaya</a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-32 wow fadeInUp animated " data-wow-delay="0.3s">
                        <div class="tf-icon-box icon-box-style2 flex relative">
                            <div class="icon">
                                <i class="icon-destination"></i>
                            </div>
                            <div class="content">
                                <h6 class="title-icon"><a href="#">Perjalanan yang Terpesona</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-32 wow fadeInUp animated " data-wow-delay="0.4s">
                        <div class="tf-icon-box icon-box-style2 flex relative">
                            <div class="icon">
                                <i class="icon-climbing-1-1"></i>
                            </div>
                            <div class="content">
                                <h6 class="title-icon"><a href="#">Petualangan & Wisata</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Widget feature -->

<!-- Widget destination -->
<section class="top-destination2 pd-main">
    <div class="tf-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-50 center">
                    <span
                        class="sub-title-heading text-main font-yes fs-28-46 wow fadeInUp animated">Populer
                        Activities</span>
                    <h2 class="title-heading wow fadeInUp animated">Destinasi</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-2 wow fadeInUp animated " data-wow-delay="0.2s">
                <div class="tf-image-box center pt-25">
                    <a href="single-destination.html" class="image">
                        <img src="{{ url('frontend') }}/assets/images/destinasi/yogyakarta.webp"
                            alt="Image"
                            style="width: 300px;
                            height: 300px;
                            object-fit: cover;">
                    </a>
                    <h6><a href="single-destination.html">Yogyakarta</a></h6>
                    <span class="text-main">(0 Tour)</span>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2 wow fadeInUp animated " data-wow-delay="0.1s">
                <div class="tf-image-box center">
                    <a href="single-destination.html" class="image">
                        <img src="{{ url('frontend') }}/assets/images/destinasi/bali1.webp"
                            alt="Image"
                            style="width: 300px;
                            height: 300px;
                            object-fit: cover;">
                    </a>
                    <h6><a href="single-destination.html">Bali</a></h6>
                    <span class="text-main">(1 Tour)</span>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2 wow fadeInUp animated " data-wow-delay="0.2s">
                <div class="tf-image-box center pt-25">
                    <a href="single-destination.html" class="image">
                        <img src="{{ url('frontend') }}/assets/images/destinasi/malang.webp"
                            alt="Image"
                            style="width: 300px;
                            height: 300px;
                            object-fit: cover;">
                    </a>
                    <h6><a href="single-destination.html">Malang</a></h6>
                    <span class="text-main">(2 Tour)</span>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2 wow fadeInUp animated " data-wow-delay="0.3s">
                <div class="tf-image-box center">
                    <a href="single-destination.html" class="image">
                        <img src="{{ url('frontend') }}/assets/images/destinasi/surabaya.webp"
                            alt="Image"
                            style="width: 300px;
                            height: 300px;
                            object-fit: cover;">
                    </a>
                    <h6><a href="single-destination.html">Surabaya</a></h6>
                    <span class="text-main">(0 Tour)</span>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2 wow fadeInUp animated " data-wow-delay="0.4s">
                <div class="tf-image-box center pt-25">
                    <a href="single-destination.html" class="image">
                        <img src="{{ url('frontend') }}/assets/images/destinasi/kawah_ijen1.webp"
                            alt="Image"
                            style="width: 300px;
                            height: 300px;
                            object-fit: cover;">
                    </a>
                    <h6><a href="single-destination.html">Banyuwangi</a></h6>
                    <span class="text-main">(1 Tour)</span>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2 wow fadeInUp animated " data-wow-delay="0.5s">
                <div class="tf-image-box center">
                    <a href="single-destination.html" class="image">
                        <img src="{{ url('frontend') }}/assets/images/destinasi/lawang_sewu.webp"
                            alt="Image"
                            style="width: 300px;
                            height: 300px;
                            object-fit: cover;">
                    </a>
                    <h6><a href="single-destination.html">Semarang</a></h6>
                    <span class="text-main">(0 Tour)</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Widget destination -->

<section class="mb--93 z-index3 relative ">
    <div class="tf-container">
        <div class="callt-to-action flex-two">
            <div class="callt-to-action-content flex-three">
                <div class="image">
                    <img src="{{ url('frontend') }}/assets/images/page/ready.png" alt="Image">
                </div>
                <div class="content">
                    <h2 class="title-call">Siap berpetualang dan menikmati alam</h2>
                </div>
            </div>
            <img src="{{ url('frontend') }}/assets/images/page/vector4.png" alt=""
                class="shape-ab">
            <div class="callt-to-action-button">
                <a href="#" class="get-call">Ayo, Kita Mulai</a>
            </div>
        </div>
    </div>

</section>

<!-- Widget why chose us -->
<section class="widget-feature2" style="margin-top: 2.5%">
    <div class="tf-container full">
        <div class="row">
            <div class="col-md-5 relative">
                <div class="image-feature2 relative">
                    <img src="{{ url('frontend') }}/assets/images/destinasi/bali2.webp"
                        alt="">
                </div>
                <div class="exploring flex-five center">
                    <span class="font-yes text-white ">Never stop
                        Exploring</span>
                </div>
            </div>
            <div class="col-md-7">
                <div class="content-feature2">
                    <div class="mb-60">
                        <span
                            class="sub-title-heading text-main font-yes fs-28-46 wow fadeInUp animated">Explore
                            the
                            Indonesia</span>
                        <h2 class="title-heading mb-18 wow fadeInUp animated">Mengapa Anda Memilih kami
                            untuk petualangan & perjalanan</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="cheackmark flex mb-70">
                                <div class="icon flex-five">
                                    <i class="icon-plane-1"></i>
                                </div>
                                <div class="content">
                                    <h5 class="mb-15 wow fadeInUp animated"><a
                                            href="#">Keselamatan selalu diutamakan</a></h5>
                                </div>
                            </div>
                            <div class="cheackmark flex">
                                <div class="icon flex-five">
                                    <i class="icon-hiking-1-1"></i>
                                </div>
                                <div class="content">
                                    <h5 class="mb-15 wow fadeInUp animated"><a
                                            href="#">Petualangan & Wisata</a></h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="cheackmark flex mb-70">
                                <div class="icon flex-five">
                                    <i class="icon-price-tag-1"></i>
                                </div>
                                <div class="content">
                                    <h5 class="mb-15 wow fadeInUp animated"><a href="#">Harga
                                            murah & ramah</a></h5>
                                </div>
                            </div>
                            <div class="cheackmark flex">
                                <div class="icon flex-five">
                                    <i class="icon-guide-1-1"></i>
                                </div>
                                <div class="content">
                                    <h5 class="mb-15 wow fadeInUp animated"><a href="#">Panduan
                                            perjalanan tepercaya</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Widget why chose us -->

<!-- Widget Testimonial -->
<section class="testimonial-section-h4 bg-1" style="margin-top: 2.5%">
    <div class="tf-container full">
        <div class="row">
            <div class="col-md-7">
                <div class="content">
                    <div class="mb-30">
                        <span
                            class="sub-title-heading text-main fs-28-46 font-yes  wow fadeInUp animated">Explore
                            the
                            Indonesia</span>
                        <h2 class="title-heading  wow fadeInUp animated">Testimoni</h2>
                    </div>
                    <div class="swiper mySwiper222 overflow-hidden relative">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="widget-testimonial-style5">
                                    <p class="des">Pelayanan ramah, harga terjangkau, guidenya
                                        sopan. Top Pokoknya
                                    </p>
                                    <div class="flex-two">
                                        <div class="flex-three relative">
                                            <div class="image-avata">
                                                <img src="{{ url('frontend/') }}/assets/images/testimonial/avt4-3.jpg"
                                                    alt="image">
                                            </div>
                                            <div class="content-testimonial">
                                                <h6 class="title">Yusuf Yoga A.</h6>
                                                <span class="job">Customer</span>
                                            </div>

                                        </div>
                                        <div class="start">
                                            <i class="icon-Star"></i>
                                            <i class="icon-Star"></i>
                                            <i class="icon-Star"></i>
                                            <i class="icon-Star"></i>
                                            <i class="icon-Star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="widget-testimonial-style5">
                                    <p class="des">Pelayanan mantab...ramah" pemandu wisata
                                        nya...hasil nya baik foto
                                        maupun video cynematicnya juga joss pkok nya 👍💯.
                                    </p>
                                    <div class="flex-two">
                                        <div class="flex-three relative">
                                            <div class="image-avata">
                                                <img src="{{ url('frontend/') }}/assets/images/testimonial/avt4-4.jpg"
                                                    alt="image">
                                            </div>
                                            <div class="content-testimonial">
                                                <h6 class="title">Donny Prasetiyo</h6>
                                                <span class="job">Customer</span>
                                            </div>

                                        </div>
                                        <div class="start">
                                            <i class="icon-Star"></i>
                                            <i class="icon-Star"></i>
                                            <i class="icon-Star"></i>
                                            <i class="icon-Star"></i>
                                            <i class="icon-Star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="widget-testimonial-style5">
                                    <p class="des">Guide ramah dan pelayanannya sangat baik.
                                    </p>
                                    <div class="flex-two">
                                        <div class="flex-three relative">
                                            <div class="image-avata">
                                                <img src="{{ url('frontend/') }}/assets/images/testimonial/avt4-5.jpg"
                                                    alt="image">
                                            </div>
                                            <div class="content-testimonial">
                                                <h6 class="title">Fabrizio Danindra</h6>
                                                <span class="job">Customer</span>
                                            </div>

                                        </div>
                                        <div class="start">
                                            <i class="icon-Star"></i>
                                            <i class="icon-Star"></i>
                                            <i class="icon-Star"></i>
                                            <i class="icon-Star"></i>
                                            <i class="icon-Star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-5">
                <div class="gallery-testimonial-h4 relative">
                    <div thumbsSlider="" class="swiper mySwiperGalllery overflow-hidden">
                        <div class="swiper-pagination"></div>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="image">
                                    <img src="{{ url('frontend/') }}/assets/images/testimonial/avt4-3.jpg"
                                        alt="image">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="image">
                                    <img src="{{ url('frontend/') }}/assets/images/testimonial/avt4-4.jpg"
                                        alt="image">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="image">
                                    <img src="{{ url('frontend/') }}/assets/images/testimonial/avt4-5.jpg"
                                        alt="image">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </div>

    </div>

</section>
<!-- Widget Testimonial -->
@endsection
