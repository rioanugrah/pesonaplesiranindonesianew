@extends('layouts.backend_2024.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="mb-1 mt-1">Rp. <span>{{ number_format($total_penjualan_year,2,',','.') }}</span></h4>
                        <p class="text-muted mb-0">Total Revenue {{ date('Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="mb-1 mt-1">Rp. <span>{{ number_format($total_penjualan_month,2,',','.') }}</span></h4>
                        <p class="text-muted mb-0">Total Revenue {{ \Carbon\Carbon::create(date('Y-m-d'))->isoFormat('MMMM YYYY') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
