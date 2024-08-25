@extends('layouts.backend_2024.master')
@section('title')
    Paket Bromo List {{ $bromo->title }}
@endsection
@section('css')
    <link href="{{ URL::asset('backend/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('backend/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@include('backend.paket_wisata.bromo.list.modalBuat')
@include('backend.paket_wisata.bromo.list.modalEdit')
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
                <div class="btn-group mt-2 mb-2 pull-right">
                    <button onclick="buat()" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Paket</button>
                    <button onclick="reload()" class="btn btn-primary">Reload</button>
                </div>
                <table class="table table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="datatable">
                    <thead>
                        <tr>
                            <td class="text-center">Tanggal Berangkat</td>
                            <td class="text-center">Kuota</td>
                            <td class="text-center">Maksimal Kuota</td>
                            <td class="text-center">Harga</td>
                            <td class="text-center">Diskon</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('backend/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('backend/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('bromo.b_bromo_list',['id' => $bromo->id]) }}",
            columns: [
                {
                    data: 'departure_date',
                    name: 'departure_date'
                },
                {
                    data: 'quota',
                    name: 'quota'
                },
                {
                    data: 'max_quota',
                    name: 'max_quota'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'discount',
                    name: 'discount'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            // order: [1,'desc']
        });

        function reload() {
            table.ajax.reload();
        }

        function buat() {
            $('#buat').modal('show');
        }

        $('#form-simpan').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('bromo.b_bromo_list_simpan',['id' => $bromo->id]) }}",
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
                        table.ajax.reload();
                        this.reset();
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

        function edit(id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/bromo/'.$bromo->id) }}"+'/list'+'/'+id+'/edit',
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result){
                    if (result.success = true) {
                        // document.getElementById('reupload_title').innerHTML = result.data.title;
                        $('#edit_id').val(result.data.id);
                        $('#edit_departure_date').val(result.data.departure_date);
                        $('#edit_quota').val(result.data.quota);
                        $('#edit_max_quota').val(result.data.max_quota);
                        $('#edit_price').val(result.data.price);
                        $('#edit_discount').val(result.data.discount);
                        $('#edit').modal('show');
                    }else{

                    }
                },
                error: function (request, status, error) {
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
            })
        }

        $('#edit-simpan').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('b/bromo/'.$bromo->id) }}"+'/list'+'/'+$('#edit_id').val()+'/update',
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
                        table.ajax.reload();
                        this.reset();
                        $('#edit').modal('hide');
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

        function hapus(id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/bromo/'.$bromo->id) }}"+'/list'+'/'+id+'/delete',
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result){
                    if (result.success = true) {
                        Swal.fire({
                            title: result.message_title,
                            text: result.message_content,
                            icon: 'success',
                            // showConfirmButton: false
                        });
                        table.ajax.reload();
                    }else{

                    }
                },
                error: function (request, status, error) {
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
            })
        }
    </script>
@endsection
