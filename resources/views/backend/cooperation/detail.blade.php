@extends('layouts.backend_2024.master')
@section('title')
    Detail Cooperation
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label>Kode Corporate</label>
                            <div>{{ $cooperation->kode_corporate }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label>Nama Usaha</label>
                            <div>{{ $cooperation->nama_usaha }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label>Email</label>
                            <div>{{ $cooperation->email }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label>Nama</label>
                            <div>{{ $cooperation->nama }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label>Kategori</label>
                            <div>{{ $cooperation->kategori_corporate->nama_kategori }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label>Alamat Usaha</label>
                            <div>{{ $cooperation->alamat_usaha }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label>No. Telp</label>
                            <div>{{ $cooperation->no_telp }}</div>
                        </div>
                    </div>
                </div>
                <hr>
                {!! $cooperation->kategori_corporate->deskripsi !!}
                <hr>
                <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ url()->previous() }}'">Back</button>
            </div>
        </div>
    </div>
</div>
@endsection
