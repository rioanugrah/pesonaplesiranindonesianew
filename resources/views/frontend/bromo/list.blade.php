@extends('layouts.frontend_2024.master')
@section('title')
    {{ $bromo->title }}
@endsection
@section('keywords')
    tour, trip, travel, agency, life, vacation, climbing, wisata, pesona, plesiran, indonesia, pesona plesiran indonesia,
    pesona indonesia
@endsection
@section('canonical')
    {{ route('frontend.bromo') }}
@endsection
@section('content')
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('backend/images/bromo.webp') }}">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ $bromo->title }}</h1>
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
                                        <img src="{{ asset('backend/images/bromo/'.$bromo->images) }}" alt="{{ $bromo->title }}">
                                    </div>
                                    {{-- <div class="tour-review">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="far fa-star"></i></li>
                                            <li><i class="far fa-star"></i></li>
                                            <li>(3 Review)</li>
                                        </ul>
                                    </div> --}}
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-md-6">
                                            <h2 class="tab-title">{{ $bromo->title }}</h2>
                                        </div>
                                        {{-- {{ dd($bromo->bromo_list) }} --}}
                                        <div class="col-auto">
                                            @if ($bromo->bromo_list->isEmpty())
                                            <p class="tour-price"><strong>{{ 'Rp. '.number_format(0,0,',','.') }}</strong> / Per Pax</p>
                                            @else
                                            <p class="tour-price"><strong>{{ 'Rp. '.number_format($bromo->bromo_list[0]->price,0,',','.') }}</strong> / Per Pax</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div>Meeting Point : {{ $bromo->meeting_point }}</div>
                                    {!! $bromo->descriptions !!}
                                    <hr>
                                    <h2 class="text-center">Jadwal Trip Bromo</h2>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Tanggal Berangkat</th>
                                                <th class="text-center">Kuota</th>
                                                <th class="text-center">Max Kuota</th>
                                                <th class="text-center">Harga</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bromo->bromo_list as $key => $bromo_list)
                                            <tr>
                                                <td class="text-center">{{ $key+1 }}</td>
                                                <td class="text-center">{{ \Carbon\Carbon::create($bromo_list->departure_date)->isoFormat('LLLL') }}</td>
                                                <td class="text-center">{{ $bromo_list->quota }}</td>
                                                <td class="text-center">{{ $bromo_list->max_quota }}</td>
                                                <td class="text-center">{{ 'Rp. '.number_format($bromo_list->price,0,',','.') }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('frontend.bromo_checkout',['id' => $bromo_list->bromo_id, 'id_list' => $bromo_list->id]) }}" class="vs-btn style4 w-100">Booking</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
