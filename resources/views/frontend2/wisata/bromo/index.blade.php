@extends('layouts.frontend2_2024.master')
@section('title')
    Bromo
@endsection
@section('description')

@endsection
@section('keywords')

@endsection
@section('content')
<section class="breadcumb-section"
style="background-image: url({{ asset('frontend/assets/images/beautiful-diamond-bali.webp') }}); padding-top: 15em">
<div class="tf-container">
    <div class="row">
        <div class="col-lg-12 center z-index1">
            <h1 class="title">Wisata Bromo</h1>
            <ul class="breadcumb-list flex-five">
                <li><a href="{{ route('frontend') }}">Beranda</a></li>
                <li><span>Wisata Bromo</span></li>
            </ul>
            <img class="bcrumb-ab" src="{{ url('frontend') }}/assets/images/page/mask-bcrumb.png" alt="">
        </div>
    </div>
</div>
</section>
<section class="archieve-tour">
    <div class="tf-container">
        <div class="row">
            @foreach ($bromos as $bromo)
            <div class="col-sm-6 col-xl-3 mb-32">
                <div class="tour-listing box-sd">
                    <a href="tour-single.html" class="tour-listing-image">
                        <div class="badge-top flex-two">
                            <span class="feature">Featured</span>
                            <div class="badge-media flex-five">
                                <span class="media"><i class="icon-Group-1000002909"></i>5</span>
                                <span class="media"><i class="icon-Group-1000002910"></i>2</span>
                            </div>
                        </div>
                        <img src="{{ asset('backend/images/bromo/'.$bromo->images) }}" style="width: 300px;height: 300px;object-fit: cover;">
                    </a>
                    <div class="tour-listing-content">
                        <span class="map"><i class="icon-Vector4"></i>Meeting Point : {{ $bromo->meeting_point }}</span>
                        <h3 class="title-tour-list"><a href="tour-single.html">{{ $bromo->title }}</a>
                        </h3>
                        <div class="review">
                            <i class="icon-Star"></i>
                            <i class="icon-Star"></i>
                            <i class="icon-Star"></i>
                            <i class="icon-Star"></i>
                            <span>(4 Review)</span>
                        </div>
                        <div class="flex-two">
                            <div class="price-box flex-three">
                                <p>Mulai Harga <br>
                                    <span class="price-sale">
                                        @if ($bromo->bromo_list->isEmpty())
                                        Rp. 0
                                        @else
                                        Rp. {{ number_format($bromo->bromo_list[0]->price,0,',','.') }}
                                        @endif
                                    </span>
                                </p>
                            </div>
                            <div class="icon-bookmark">
                                <i class="icon-Vector-151"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-20">
            <div class="col-md-12 ">
                <ul class="tf-pagination flex-five">
                    <li>
                        <a class="pages-link" href="#"> <i class="icon-29"></i></a>
                    </li>
                    <li>
                        <a class="pages-link" href="#">1</a>
                    </li>
                    <li class="pages-item active" aria-current="page">
                        <a class="pages-link" href="#">2</a>
                    </li>
                    <li><a class="pages-link" href="#">3</a></li>
                    <li>
                        <a class="pages-link" href="#"><i class=" icon--1"></i></a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</section>
@endsection
