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
                        <h4 class="mb-1 mt-1">Rp. <span>{{ number_format($total_penjualan_year, 2, ',', '.') }}</span></h4>
                        <p class="text-muted mb-0">Total Revenue {{ date('Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="mb-1 mt-1">Rp. <span>{{ number_format($total_penjualan_month, 2, ',', '.') }}</span></h4>
                        <p class="text-muted mb-0">Total Revenue
                            {{ \Carbon\Carbon::create(date('Y-m-d'))->isoFormat('MMMM YYYY') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Total Revenue</h4>
                    <div id="spline_area" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('backend/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        var options = {
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            series: [{
                name: 'Total Revenue',
                data: @json($sum_penjualan_month)
            },
            // {
            //     name: 'series2',
            //     data: [32, 60, 34, 46, 34, 52, 41]
            // }
            ],
            colors: ['#5b73e8', '#f1b44c'],
            xaxis: {
                type: 'string',
                categories: @json($years),
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false
                },
                labels: {

                }
            },
            grid: {
                borderColor: '#f1f1f1'
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#spline_area"), options);
        chart.render();
    </script>
@endsection
