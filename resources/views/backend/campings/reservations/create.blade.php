@extends('layouts.backend_2024.master')
@section('title')
    Camping Reservation Create
@endsection

@section('css')
    <link href="{{ asset('backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form id="upload-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="card-title mb-3">Camping Reservation</h4>
                            <hr>
                            <h4 class="card-title mb-3" style="font-weight: bold">Identitas Sewa</h4>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" class="form-control"
                                            placeholder="First Name" id="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                            id="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            id="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label>No. Telp / Whatsapp</label>
                                        <input type="number" name="no_telp" class="form-control"
                                            placeholder="No.Telp / Whatsapp" id="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>Alamat</label>
                                        <textarea name="address" class="form-control" placeholder="Alamat" id="" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Kota / Kabupaten</label>
                                        <input type="text" name="city" class="form-control"
                                            placeholder="Kota / Kabupaten" id="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Provinsi</label>
                                        <input type="text" name="state" class="form-control" placeholder="Provinsi"
                                            id="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Foto Identitas</label>
                                        <input type="file" name="foto_identitas" class="form-control"
                                            id="">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4 class="card-title mb-3" style="font-weight: bold">Reservation</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Tanggal Reservasi</label>
                                        <input type="date" name="resv_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label>Durasi</label>
                                        <div class="input-group">
                                            <input type="number" name="resv_night" min="1" max="10"
                                                class="form-control" id="">
                                            <div class="input-group-text">Malam</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 repeater">
                                <div data-repeater-list="order">
                                    <label class="form-label" for="name">Item</label>
                                    <div data-repeater-item class="row">
                                        <div class="mb-3 col-lg-5">
                                            <select name="item" class="form-control" id="cars">
                                                <option value="">-- Pilih Item --</option>
                                                @foreach ($camping_categories as $camping_category)
                                                <optgroup label="{{ $camping_category->nama_kategori }}">
                                                    @foreach ($camping_category->camping_pricelist as $camping_pricelist)
                                                        <option value="{{ $camping_pricelist->id }}">{{ $camping_pricelist->nama_barang.' - '.'Rp. '.number_format($camping_pricelist->price,0,',','.') }}</option>
                                                    @endforeach
                                                </optgroup>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-2">
                                            <div class="input-group">
                                                <input type="number" name="qty" min="1" max="10"
                                                class="form-control" id="">
                                                <div class="input-group-text">Pax</div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-lg-1 align-self-center d-grid">
                                            <input data-repeater-delete type="button" class="btn btn-danger btn-block"
                                                value="Delete" />
                                        </div>
                                    </div>
                                </div>
                                <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0"
                                    value="Add">
                            </div>
                            <hr>
                            <h4 class="card-title mb-3" style="font-weight: bold">Payment Method</h4>
                            @foreach ($channels as $channel)
                            <div class="mt-2 mb-2">
                                <input type="radio" name="method" value="{{ $channel->code }}" id="{{ $channel->code }}">
                                @if ($channel->code == "QRISC")
                                <label for="{{ $channel->code }}">{{ $channel->name.' - '.'Rp. '.number_format($channel->total_fee->flat,0,',','.')."+ Rp. ".$channel->total_fee->percent."%" }}</label>
                                @else
                                <label for="{{ $channel->code }}">{{ $channel->name.' - '.'Rp. '.number_format($channel->total_fee->flat,0,',','.') }}</label>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" onclick="window.location.href='{{ url()->previous() }}'"
                            class="btn btn-secondary">Back</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('backend/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.repeater').repeater({
            defaultValues: {
                'textarea-input': 'foo',
                'text-input': 'bar',
                'select-input': 'B',
                'checkbox-input': ['A', 'B'],
                'radio-input': 'B'
            },
            show: function show() {
                $(this).slideDown();
            },
            hide: function hide(deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function ready(setIndexes) {}
        });

        $('#upload-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('b.camping_reservation_simpan') }}",
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
                            window.location.href=result.link_payment;
                        }, 3000);
                        // this.reset();
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
                    toastr["error"](error);
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": 300,
                        "hideDuration": 1000,
                        "timeOut": 5000,
                        "extendedTimeOut": 1000,
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
            });
        });
    </script>
@endsection
