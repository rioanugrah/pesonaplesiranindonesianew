@extends('layouts.frontend_2024.master')
@section('title')
    Bromo Checkout
@endsection
@php
    $asset = asset('frontend/new_1/');
@endphp
@section('content')
    <div class="breadcumb-wrapper" data-bg-src="{{ $asset }}/assets/posting/kelingking-beach.webp">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Checkout</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Beranda</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('frontend.bromo_payment',['id' => $bromo->bromo_id, 'id_list' => $bromo->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="vs-checkout-wrapper space">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12">
                        <h2 class="h4">Billing Details</h2>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="col-12 form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-12 form-group">
                                <textarea name="address" class="form-control" placeholder="Address" cols="30" rows="10"></textarea>
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Phone number">
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="mt-4 pt-lg-2">Your Order</h4>
                <div class="table-responsive">
                    <table class="cart_table">
                        <thead>
                            <tr>
                                <th class="cart-col-image">Image</th>
                                <th class="cart-col-productname">Product Name</th>
                                <th class="cart-col-price">Price</th>
                                <th class="cart-col-quantity">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="cart_item">
                                <td data-title="Product">
                                    <a class="cart-productimage"><img width="91" height="91"
                                            src="{{ asset('backend/images/bromo/'.$bromo->bromo->images) }}"></a>
                                </td>
                                <td data-title="Name">
                                    <a class="cart-productname">{{ $bromo->bromo->title . ' - Departure Date ' . \Carbon\Carbon::create($bromo->departure_date)->isoFormat('LLLL')}}</a>
                                </td>
                                <td data-title="Price">
                                    <span class="amount"><bdi><span>Rp. </span>{{ number_format($bromo->price, 0, ',', '.') }}
                                        </bdi></span>
                                </td>
                                <td data-title="Quantity">
                                    <input type="number" name="qty" class="form-control" id="qty" placeholder="QTY">
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="checkout-ordertable">
                            <tr class="cart-subtotal">
                                <th>Subtotal</th>
                                <td data-title="Subtotal" colspan="4"><span
                                        class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol" id="subtotal"></span></bdi></span>
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th>Total</th>
                                <td data-title="Total" colspan="4"><strong><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol"
                                                    id="total"></span></bdi></span></strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="mt-lg-3">
                    <div class="woocommerce-checkout-payment">
                        <h4 class="mt-4 pt-lg-2">Payment Method</h4>
                        @foreach ($channels as $channel)
                            <div class="mt-2 mb-2">
                                <input type="radio" name="method" value="{{ $channel->code }}" id="{{ $channel->code }}">
                                <label for="{{ $channel->code }}">{{ $channel->name }}</label>
                            </div>
                        @endforeach
                        <div class="form-row place-order pt-lg-2">
                            <button type="submit" class="vs-btn style4">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
@section('script')
    <script>
        $('#qty').change(function() {
            if ('{{ $bromo->bromo->category_trip }}' == 'Publik') {
                var price = {{ $bromo->price - ($bromo->discount / 100) * $bromo->price }};
                var jumlah = parseInt($('#qty').val());
                var penjumlahan = jumlah * price;

                // $('#total').val(jumlah);

                var bilangan = penjumlahan;

                var number_string = bilangan.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                document.getElementById('subtotal').innerHTML = 'Rp. ' + rupiah;
                document.getElementById('total').innerHTML = 'Rp. ' + rupiah;
                // $('#order_total').val(penjumlahan);
            } else if ('{{ $bromo->bromo->category_trip }}' == 'Private') {
                if (($('#qty').val()) >= parseInt('{{ $bromo->max_quota }}')) {
                    alert('Jumlah anggota maksimal ' + {{ $bromo->max_quota }} + ' orang');
                    $('#qty').val('');
                } else {
                    var price = {{ $bromo->price - ($bromo->discount / 100) * $bromo->price }};
                    var jumlah = parseInt($('#qty').val());
                    var penjumlahan = jumlah * price;

                    var bilangan = price;

                    var number_string = bilangan.toString(),
                        sisa = number_string.length % 3,
                        rupiah = number_string.substr(0, sisa),
                        ribuan = number_string.substr(sisa).match(/\d{3}/g);

                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    document.getElementById('subtotal').innerHTML = 'Rp. ' + rupiah;
                    document.getElementById('total').innerHTML = 'Rp. ' + rupiah;

                }
            }
        });
    </script>
@endsection
