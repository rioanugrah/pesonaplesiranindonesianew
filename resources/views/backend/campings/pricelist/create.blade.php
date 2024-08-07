@extends('layouts.backend_2024.master')
@section('title')
    Camping Pricelist Create
@endsection

@section('css')
    <link href="{{ URL::asset('backend/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@yield('title')</h4>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Nama Produk</label>
                                    <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" id="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Kategori Produk</label>
                                    <select name="camping_category_id" class="form-control" id="">
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($camping_categorys as $camping_category)
                                            <option value="{{ $camping_category->id }}">{{ $camping_category->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('backend/libs/toastr/toastr.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
@endsection
