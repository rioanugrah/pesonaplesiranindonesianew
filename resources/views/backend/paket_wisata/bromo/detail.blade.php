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
                            <td class="text-center">Harga</td>
                            <td class="text-center">Kuota</td>
                            <td class="text-center">Maksimal Kuota</td>
                            <td class="text-center">Diskon</td>
                            {{-- <td class="text-center">Action</td> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bromo->bromo_list as $key => $bromo_list)
                            <tr>
                                <td class="text-center">{{ $key+1 }}</td>
                                <td class="text-center">{{ $bromo_list->departure_date }}</td>
                                <td class="text-center">{{ 'Rp. '.number_format($bromo_list->price,0,',','.') }}</td>
                                <td class="text-center">{{ $bromo_list->quota }}</td>
                                <td class="text-center">{{ $bromo_list->max_quota }}</td>
                                <td class="text-center">{{ $bromo_list->discount }}</td>
                                {{-- <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-warning">Edit</button>
                                        <a href="{{ route('bromo.b_bromo_list_edit',['id' => $bromo->id, 'id_bromo' => $bromo_list->id]) }}" class="btn btn-warning">Edit</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
