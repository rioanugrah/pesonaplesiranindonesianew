@extends('layouts.frontend_2024.master')
@section('title')
    Paket Bromo
@endsection
@section('description')
    Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang menyediakan kemudahan dalam mendapat informasi
    dan pemesanan Akomodasi, Destinasi, Restoran, Transportasi, Travel dan MICE se-Indonesia.
@endsection
@section('keywords')
    tour, trip, travel, agency, life, vacation, climbing, wisata, pesona, plesiran, indonesia, pesona plesiran indonesia,
    pesona indonesia
@endsection
@section('canonical'){{ route('frontend.bromo') }}@endsection
@section('url'){{ route('frontend.bromo') }}@endsection
@section('content')
    <section class="tour--layout4 space space-extra-bottom shape-mockup-wrap">
        <div class="container ">
            <div class="row justify-content-center text-center">
                <div class="col-xl-6 col-lg-8 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="title-area">
                        <span class="sec-subtitle">Paket Bromo</span>
                        <h2 class="sec-title h1">Paket Liburan Terbaik</h2>
                    </div>
                </div>
            </div>
            <div class="row vs-carousel" data-slide-show="4" data-arrows="false" data-lg-slide-show="4"
                data-md-slide-show="4" data-sm-slide-show="1">
                @forelse ($bromos as $bromo)
                <div class="col-xl-3 col-lg-6 col-sm-6">
                    <div class="package-style3">
                        <div class="package-img">
                            <a href="{{ route('frontend.bromo_list',['id' => $bromo->id]) }}"><img class="w-100" src="{{ asset('backend/images/bromo/'.$bromo->images) }}"
                                    alt="{{ $bromo->title }}" style="width: 300px;height: 300px;object-fit: cover;"></a>
                        </div>
                        <div class="package-content">
                            <p class="package-text">Meeting Point : {{ $bromo->meeting_point }}</p>
                            <h3 class="package-title"><a href="{{ route('frontend.bromo_list',['id' => $bromo->id]) }}">{{ $bromo->title }}</a></h3>
                            <div class="package-footer">
                                <div class="package-review">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <span class="package-price">
                                  <span>Mulai Harga</span>
                                  @if ($bromo->bromo_list->isEmpty())
                                  Rp. 0
                                  @else
                                  Rp. {{ number_format($bromo->bromo_list[0]->price,0,',','.') }}
                                  @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty

                @endforelse
            </div>
        </div>
    </section>
@endsection
