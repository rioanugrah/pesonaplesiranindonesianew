@extends('layouts.backend_2024.master')
@section('title')
    Edit Pricelist
@endsection

@section('css')
    <link href="{{ asset('backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form id="update-form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h4 class="card-title mb-3">@yield('title')</h4>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Nama Produk</label>
                                    <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="{{ $camping_pricelist->nama_barang }}" id="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Kategori Produk</label>
                                    <select name="camping_category_id" class="form-control" id="">
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($camping_categorys as $camping_category)
                                            <option value="{{ $camping_category->id }}" {{ $camping_category->id == $camping_pricelist->camping_category_id ? 'selected' : null }}>{{ $camping_category->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label>Harga Produk</label>
                                    <input type="number" name="price" class="form-control" placeholder="Harga Barang" value="{{ $camping_pricelist->price }}" id="">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label>Stock</label>
                                    <input type="number" name="stock" class="form-control" placeholder="Stock" value="{{ $camping_pricelist->stock }}" id="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ready" {{ $camping_pricelist->status == 'Ready' ? 'selected' : null }}>Ready</option>
                                        <option value="Sold Out" {{ $camping_pricelist->status == 'Sold Out' ? 'selected' : null }}>Sold Out</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" onclick="window.location.href='{{ url()->previous() }}'" class="btn btn-secondary">Back</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#update-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('b.camping_pricelist_update',['id' => $camping_pricelist->id]) }}",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: () => {
                    var timerInterval;
                    Swal.fire({
                        title: 'Waiting',
                        html: 'Sedang Diproses.',
                        showConfirmButton: false,
                        onBeforeOpen: function onBeforeOpen() {
                        Swal.showLoading();
                        timerInterval = setInterval(function () {
                            Swal.getContent().querySelector('strong').textContent = Swal.getTimerLeft();
                        }, 100);
                        },
                        onClose: function onClose() {
                        clearInterval(timerInterval);
                        }
                    }).then(function (result) {
                        if ( // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer');
                        }
                    });
                },
                success: (result) => {
                    if (result.success != false) {
                        Swal.fire({
                            title: result.message_title,
                            text: result.message_content,
                            icon: 'success',
                            showConfirmButton: false
                        });
                        setTimeout(() => {
                            window.location.href='{{ route("b.camping_pricelist_index") }}';
                        }, 3000);
                    } else {
                        Swal.fire({
                            title: 'Gagal',
                            text: result.error,
                            icon: 'error',
                            // showConfirmButton: false
                        });
                    }
                },
                error: function(request, status, error) {
                    Swal.fire({
                        title: 'Error',
                        text: error,
                        icon: 'error',
                        showConfirmButton: false
                    });
                }
            });
        });

    </script>
@endsection
