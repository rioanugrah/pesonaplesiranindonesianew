@extends('layouts.backend_2024.master')
@section('title')
    Camping Reservation Return
@endsection
@section('css')
    <link href="{{ asset('backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('title')</h4>
                </div>
                <div class="card-body">
                    <form id="upload-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Kode Order</label>
                        <div>{{ $resv_return->camping_orders->kode_order }}</div>
                    </div>
                    <div class="mb-3">
                        <label>Nama</label>
                        <div>{{ $resv_return->camping_campers->first_name.' '.$resv_return->camping_campers->last_name }}</div>
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                        <div>{{ $resv_return->camping_campers->address }}</div>
                    </div>
                    <div class="mb-3">
                        <label>No. Telp</label>
                        <div>{{ $resv_return->camping_campers->no_telp }}</div>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <div>{{ $resv_return->camping_campers->email }}</div>
                    </div>
                    <hr>
                    <label style="font-weight: bold">Reservation</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Tanggal Reservasi</label>
                                <div>{{ $resv_return->resv_date }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Durasi Reservasi</label>
                                <div>{{ $resv_return->resv_night }} Malam</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <label style="font-weight: bold">Pesanan</label>
                    <table class="table table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (json_decode($resv_return->camping_orders->order) as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name_product }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ 'Rp. '.number_format($item->price,0,',','.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" onclick="window.location.href='{{ url()->previous() }}'" class="btn btn-secondary">Back</button>
                    </div>
                    </form>
                </div>
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

        $('#upload-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('b.camping_reservation_return_simpan',['id' => $resv_return->id]) }}",
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
                            timerInterval = setInterval(function() {
                                Swal.getContent().querySelector('strong')
                                    .textContent = Swal.getTimerLeft();
                            }, 100);
                        },
                        onClose: function onClose() {
                            clearInterval(timerInterval);
                        }
                    }).then(function(result) {
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
                            // showConfirmButton: false
                        });
                        setTimeout(() => {
                            window.location.href="{{ route('b.camping_reservation_index') }}";
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
                        // showConfirmButton: false
                    });
                }
            });
        });
    </script>
@endsection
