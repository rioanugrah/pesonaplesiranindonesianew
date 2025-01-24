@extends('layouts.frontend_2024.master')
@section('title')
    Kawah Ijen
@endsection
@section('canonical')
    {{ route('frontend.kawah_ijen') }}
@endsection
@section('content')
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('frontend/new_1/assets/posting/kawah_ijen2.webp') }}">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Exploring Kawah Ijen</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="{{ route('frontend') }}">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="space-bottom">
        <div class="outer-wrap">
            <div class="filter-menu1 filter-menu-active wow fadeInUp wow-animated">
                <button class="tab-button active" data-filter=".tab-content1"><i class="fas fa-info-circle"></i>
                    Information</button>
            </div>
            <div class="container">
                <div class="shadow-content1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter-active tour-booking-active">
                                <div class="filter-item tab-content1">
                                    <div class="info-image">
                                        <img src="{{ asset('frontend/new_1/assets/posting/kawah_ijen2.webp') }}"
                                            alt="Kawah Ijen" style="width: 1650pt;height: 500px;object-fit: cover;">
                                    </div>
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-md-6">
                                            <h2 class="tab-title">Exploring Kawah Ijen</h2>
                                        </div>
                                        <div class="col-auto">
                                            <p class="tour-price">
                                                <strong>Start Price Rp. 400.000</strong> / Per Pax
                                            </p>
                                        </div>
                                    </div>
                                    <p>Rasakan sensasi petualangan yang tak terlupakan dengan menyaksikan langsung keajaiban api biru di Kawah Ijen</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Tanggal Berangkat :</strong></p>
                                            <ul>
                                                <li>28 - 29 Januari 2025</li>
                                                <li>08 - 09 Februari 2025</li>
                                                <li>15 - 16 Februari 2025</li>
                                                <li>22 - 23 Februari 2025</li>
                                            </ul>
                                            <p><strong>Include :</strong></p>
                                            <ul>
                                                <li>Transportasi (PP)</li>
                                                <li>Driver</li>
                                                <li>BBM</li>
                                                <li>Tol</li>
                                                <li>Tiket Wisata</li>
                                                <li>Guide Sebagai Fotografer</li>
                                                <li>Guide Lokal untuk ke Blue Fire</li>
                                                <li>Dokumentasi Foto</li>
                                                <li>Mineral Water</li>
                                            </ul>
                                            <p><strong>Exclude :</strong></p>
                                            <ul>
                                                <li>Makan dan Keperluan Pribadi</li>
                                            </ul>
                                            <p><strong>Tujuan :</strong></p>
                                            <p>Kawah Ijen:</p>
                                            <ul>
                                                <li>Blue Fire</li>
                                                <li>Hutan Mati</li>
                                                <li>Spot Instagramable</li>
                                            </ul>
                                            <p>Baluran:</p>
                                            <ul>
                                                <li>Pantai Bama</li>
                                                <li>Savana Bekol</li>
                                                <li>Fosil Kepala Banteng</li>
                                            </ul>
                                            <p><strong>Meeting Point :</strong></p>
                                            <p>Malang :</p>
                                            <ul>
                                                <li>Stasiun Kota Baru</li>
                                                <li>Pom Depan Hawai Waterpark</li>
                                            </ul>
                                            <p>Surabaya :</p>
                                            <ul>
                                                <li>Pintu Keluar Bungurasih</li>
                                                <li>Alfamart Samping Stasiun Waru</li>
                                            </ul>
                                            <p>Sidoarjo :</p>
                                            <ul>
                                                <li>MCD Exit Tol Sidoarjo</li>
                                                <li>Halte Lippo</li>
                                            </ul>
                                            <strong>Note:</strong>
                                            <p>Pemesanan bisa melalui Whatsapp Office dan Whatsapp Admin yang tertera di website kami, serta melakukan Screenshot website untuk pemesanan Trip Kawah Ijen.</p>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="{{ asset('frontend/new_1/assets/posting/poster_kawah_ijen_ppi_240125.webp') }}"
                                            alt="Kawah Ijen">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
