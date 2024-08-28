@extends('layouts.backend_2024.master')
@section('title')
    Invoice {{ $transaction->transaction_code }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <h4 class="float-end font-size-16">Invoice #{{ $transaction->transaction_code }}
                            @switch($transaction->status)
                                @case('Unpaid')
                                    <span class="badge bg-warning font-size-12 ms-2">Unpaid</span>
                                </h4>
                            @break

                            @case('Paid')
                                <span class="badge bg-success font-size-12 ms-2">Paid</span></h4>
                            @break

                            @default
                        @endswitch
                        <div class="mb-4">
                            <img src="{{ URL::asset('backend/images/logo_plesiran_black.webp') }}" height="50" />
                        </div>
                        <div class="text-muted">
                            <p class="mb-1">CV. Pesona Plesiran Indonesia</p>
                            <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> marketing@plesiranindonesia.com</p>
                            <p><i class="uil uil-phone me-1"></i> 0813-3112-6991</p>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-muted">
                                <h5 class="font-size-16 mb-3">Billed To:</h5>
                                <h5 class="font-size-15 mb-2">
                                    {{ json_decode($transaction->transaction_billing)->first_name . ' ' . json_decode($transaction->transaction_billing)->last_name }}
                                </h5>
                                <p class="mb-1">{{ json_decode($transaction->transaction_billing)->address }}</p>
                                <p class="mb-1">{{ json_decode($transaction->transaction_billing)->email }}</p>
                                <p>{{ json_decode($transaction->transaction_billing)->phone }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted text-sm-end">
                                <div>
                                    <h5 class="font-size-16 mb-1">Invoice No:</h5>
                                    <p>#{{ $transaction->transaction_code }}</p>
                                </div>
                                <div class="mt-4">
                                    <h5 class="font-size-16 mb-1">Invoice Date:</h5>
                                    <p>{{ $transaction->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="py-2">
                        <h5 class="font-size-15">Order summary</h5>

                        <div class="table-responsive">
                            <table class="table table-nowrap table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">No.</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th class="text-end" style="width: 120px;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr>
                                    <th scope="row">01</th>
                                    <td>
                                        <h5 class="font-size-15 mb-1">{{ $transaction->transaction_unit }}</h5>
                                    </td>
                                    <td>Rp. {{ number_format($transaction->transaction_price/$transaction->transaction_qty,0,',','.') }}</td>
                                    <td>{{ $transaction->transaction_qty }}</td>
                                    <td class="text-end">Rp. {{ number_format($transaction->transaction_price,0,',','.') }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                    <td class="border-0 text-end">
                                        <h4 class="m-0">Rp. {{ number_format($transaction->transaction_price,0,',','.') }}</h4>
                                    </td>
                                </tr> --}}
                                    @foreach (json_decode($transaction->transaction_order) as $key => $item)
                                        <tr>
                                            <td style="text-align: center">{{ $key + 1 }}</td>
                                            <td>{{ $item->item }}</td>
                                            <td style="text-align: right">
                                                {{ 'Rp. ' . number_format($item->price, 0, ',', '.') }}
                                            </td>
                                            <td style="text-align: center">{{ $item->qty }}</td>
                                            <td style="text-align: right">
                                                {{ 'Rp. ' . number_format($item->price*$item->qty, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-print-none mt-4">
                            <div class="float-end">
                                <a href="javascript:void(0)" onclick="window.location.href='{{ route('b.transaction') }}'"
                                    class="btn btn-secondary waves-effect waves-light me-1"><i class="fa fa-arrow-left"></i>
                                    Back</a>
                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i
                                        class="fa fa-print"></i></a>
                                {{-- <a href="#" class="btn btn-primary w-md waves-effect waves-light">Send</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
