@extends('layouts.backend_2024.master')
@section('title')
    Kategori Corporate
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
                        <button onclick="window.location.href='{{ route('b.kategori_corporate.create') }}'" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Baru</button>
                        <button onclick="reload()" class="btn btn-primary">Reload</button>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Kategori</th>
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
            ajax: "{{ route('b.kategori_corporate.index') }}",
            columns: [
                {
                    data: 'nama_kategori',
                    name: 'nama_kategori'
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
            table.ajax.reload(null,false);
        }
    </script>
@endsection