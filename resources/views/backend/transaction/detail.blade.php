@extends('layouts.backend_2024.master')
@section('title')
    Transactions {{ $transaction->transaction_code }}
@endsection
@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Transaction Detail</h4>
            <hr>
            <div class="row">
                <label class="col-md-2 col-form-label">Code Transaction</label>
                <label class="col-md-10 col-form-label">{{ $transaction->transaction_code }}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">Reference</label>
                <label class="col-md-10 col-form-label">{{ $transaction->transaction_reference }}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">Transaction Unit</label>
                <label class="col-md-10 col-form-label">{{ $transaction->transaction_unit }}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">Quantity</label>
                <label class="col-md-10 col-form-label">{{ $transaction->transaction_qty }}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">Price</label>
                <label class="col-md-10 col-form-label">{{ 'Rp. '.number_format($transaction->transaction_price,0,',','.') }}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">Status</label>
                <label class="col-md-10 col-form-label">
                    @switch($transaction->status)
                        @case('Unpaid')
                            <span class="badge bg-warning">{{ $transaction->status }}</span>
                            @break
                        @case('Paid')
                            <span class="badge bg-success">{{ $transaction->status }}</span>
                            @break
                        @case('Not Paid')
                            <span class="badge bg-danger">{{ $transaction->status }}</span>
                            @break
                        @default
                    @endswitch
                </label>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Item</td>
                            <td>Price</td>
                            <td>Qty</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (json_decode($transaction->transaction_order) as$key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->item }}</td>
                                <td>{{ 'Rp. '.number_format($item->price,0,',','.') }}</td>
                                <td>{{ $item->qty }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('b.transaction') }}'">Back</button>
        </div>
    </div>
</div>
@endsection
