@extends('layouts.backend_2024.master')
@section('title')
    Camping Order {{ $camping_order->kode_order }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('title')</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label>Kode Order</label>
                        <div>{{ $camping_order->kode_order }}</div>
                    </div>
                    <div class="mb-3">
                        <label>Nama</label>
                        <div>{{ $camping_order->camping_reservation->camping_campers->first_name.' '.$camping_order->camping_reservation->camping_campers->last_name }}</div>
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                        <div>{{ $camping_order->camping_reservation->camping_campers->address }}</div>
                    </div>
                    <div class="mb-3">
                        <label>No. Telp</label>
                        <div>{{ $camping_order->camping_reservation->camping_campers->no_telp }}</div>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <div>{{ $camping_order->camping_reservation->camping_campers->email }}</div>
                    </div>
                    <div class="mb-3">
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
                                @foreach (json_decode($camping_order->order) as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->name_product }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ 'Rp. '.number_format($item->price,0,',','.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mb-3">
                        <label style="font-weight: bold">Status Pembayaran</label>
                        @if (empty($camping_order->transactions))
                            <div class="badge bg-danger">NOT FOUND</div>
                        @else
                            @switch($camping_order->transactions->status)
                                @case('Paid')
                                    <div class="badge bg-success">PAID</div>
                                    @break
                                @case('Unpaid')
                                    <div class="badge bg-warning">UNPAID</div>
                                    @break
                                @default

                            @endswitch
                        @endif
                    </div>
                    <div class="mb-3">
                        <button type="button" onclick="window.location.href='{{ url()->previous() }}'" class="btn btn-secondary">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
