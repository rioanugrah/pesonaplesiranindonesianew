@extends('layouts.frontend_2024.master')
@section('title')
    Tentang Kami
@endsection
@section('keywords')
    tour, trip, travel, agency, life, vacation, climbing, wisata, pesona, plesiran, indonesia, pesona plesiran indonesia,
    pesona indonesia
@endsection
@section('canonical')
    {{ url('/') }}
@endsection
@php
    $asset = asset('frontend/new_1/');
@endphp
@section('content')
    <div class="breadcumb-wrapper" data-bg-src="{{ $asset }}/assets/posting/kelingking-beach.webp">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Tentang Kami</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Beranda</a></li>
                        <li>Tentang Kami</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="space">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="image-box1">
                        <img class="img1" src="{{ $asset }}/assets/posting/bali1.webp">
                        <img class="img2" src="{{ $asset }}/assets/posting/bali2.webp">
                        <div class="media-box1">
                            <span class="media-info">4+</span>
                            <p class="media-text">Tahun Berdiri</p>
                        </div>
                        <div class="media-box2">
                            <span class="media-info">2000+</span>
                            <p class="media-text">Klien</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-content">
                        <div class="title-area">
                            <span class="sec-subtitle">Tentang Kami</span>
                            <h2 class="sec-title h1">Apa itu Pesona Plesiran Indonesia ? </h2>
                            <p class="sec-text">Pesona Plesiran Indonesia Adalah Platform Digital Marketing Milenial Yang Menyediakan Kemudahan Dalam Mendapat Informasi Dan Pemesanan Akomodasi, Destinasi, Restoran, Transportasi, Travel Dan MICE Se-Indonesia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
