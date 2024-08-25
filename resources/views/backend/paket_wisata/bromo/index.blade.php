@extends('layouts.backend_2024.master')
@section('title')
    Paket Bromo
@endsection

@section('css')
    <link href="{{ URL::asset('backend/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('backend/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @include('backend.paket_wisata.bromo.modalBuat')
    @include('backend.paket_wisata.bromo.modalReupload')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@yield('title')</h4>
                    <div class="btn-group mt-2 mb-2 pull-right">
                        {{-- <a href="{{ route('tour.create') }}" class="btn btn-primary">Tambah</a> --}}
                        <button onclick="window.location.href='{{ route('bromo.b_create') }}'" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Paket</button>
                        <button onclick="reload()" class="btn btn-primary">Reload</button>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 80%">Data Bromo</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('backend/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('backend/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ URL::asset('backend/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('bromo.b_index') }}",
            columns: [
                {
                    data: 'data_bromo',
                    name: 'data_bromo'
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
            table.ajax.reload(null,false);
        }

        function buat() {
            $('#buat').modal('show');
        }

        $('.repeater').repeater({
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

        function reupload(id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/bromo') }}"+'/'+id,
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result){
                    if (result.success = true) {
                        // document.getElementById('reupload_title').innerHTML = result.data.title;
                        $('#reupload_id').val(result.data.id);
                        $('#reupload_title').val(result.data.title);
                        $('#reupload_meeting_point').val(result.data.meeting_point);
                        $('#reupload_category_trip').val(result.data.category_trip);
                        $('#reupload_quota').val(result.data.quota);
                        $('#reupload_price').val(result.data.price);
                        $('#reupload_discount').val(result.data.discount);
                        $('#reupload_paket').modal('show');
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

        $('#upload-form').submit(function(e) {
            // alert('coba');
            e.preventDefault();
            let formData = new FormData(this);
            // $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('bromo.b_b_simpan') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if(result.success != false){
                        toastr["success"](result.message_content);
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
                        // this.reset();
                        $('#buat').modal('hide');
                        table.ajax.reload(null, false);
                    }else{
                        toastr["error"](result.error);
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
                        // alert('test');
                        // iziToast.error({
                        //     title: result.success,
                        //     message: result.error
                        // });
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
            });
        });

    </script>
@endsection
