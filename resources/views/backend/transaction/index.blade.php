@extends('layouts.backend_2024.master')
@section('title')
    Transactions
@endsection
@section('css')
    <link href="{{ URL::asset('backend/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('backend/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')

    @include('backend.transaction.detail_bukti_pembayaran')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Transaction</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Transaction Code</th>
                            <th>Transaction Unit</th>
                            <th>Recipient User</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
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
            ajax: "{{ route('b.transaction') }}",
            columns: [
                {
                    data: 'kode_order',
                    name: 'kode_order'
                },
                {
                    data: 'nama_order',
                    name: 'nama_order'
                },
                {
                    data: 'pemesan',
                    name: 'pemesan'
                },
                {
                    data: 'qty',
                    name: 'qty'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            order: [5, 'desc']
        });
    </script>
@endsection
