@extends('layouts.backend_2024.master')
@section('title')
    Camping Pricelist
@endsection

@section('css')
    <link href="{{ URL::asset('backend/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('backend/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@yield('title')</h4>
                    <div class="btn-group mt-2 mb-2 pull-right">
                        <button onclick="window.location.href='{{ route('b.camping_pricelist_create') }}'" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Baru</button>
                        <button onclick="reload()" class="btn btn-primary">Reload</button>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Action</th>
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('b.camping_pricelist_index') }}",
            columns: [
                {
                    data: 'nama_barang',
                    name: 'nama_barang'
                },
                {
                    data: 'camping_category_id',
                    name: 'camping_category_id'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'stock',
                    name: 'stock'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
        });

        function reload() {
            table.ajax.reload();
        }

        function hapus(id) {
            $.ajax({
                type: 'DELETE',
                url: "{{ url('b/camping/pricelist/') }}" + '/' + id + '/delete',
                data: {"id": id , _method: 'delete'},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                processData: false,
                success: (result) => {
                    if (result.success != false) {
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
                        table.ajax.reload(null, false);
                    } else {
                        toastr["error"](result.error);
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-center",
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
                },
                error: function(request, status, error) {
                    toastr["error"](error);
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-center",
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
        }

    </script>
@endsection
