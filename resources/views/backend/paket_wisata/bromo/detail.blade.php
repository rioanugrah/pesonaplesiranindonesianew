@extends('layouts.backend_2024.master')
@section('title')
    Paket Bromo - {{ $bromo->title }}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title mb-3">{{ $bromo->title }}</h2>
            <hr>
            <button class="btn btn-secondary" onclick="window.location.href='{{ url()->previous() }}'">Back</button>
            <hr>
            <div class="mb-3">
                <table class="table">
                    <tr>
                        <td>Meeting Point</td>
                        <td>:</td>
                        <td>{{ $bromo->meeting_point }}</td>
                    </tr>
                    <tr>
                        <td>Kategori Trip</td>
                        <td>:</td>
                        <td>{{ $bromo->category_trip }}</td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td>{!! $bromo->descriptions !!}</td>
                    </tr>
                </table>
            </div>
            <div class="mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <td class="text-center">No</td>
                            <td class="text-center">Tanggal Berangkat</td>
                            <td class="text-center">Kuota</td>
                            <td class="text-center">Maksimal Kuota</td>
                            <td class="text-center">Diskon</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bromo->bromo_list as $key => $bromo_list)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $bromo_list->departure_date }}</td>
                                <td>{{ $bromo_list->quota }}</td>
                                <td>{{ $bromo_list->max_quota }}</td>
                                <td>{{ $bromo_list->discount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
