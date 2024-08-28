@extends('layouts.frontend_2024.master')
@section('title')
    Kontak Kami
@endsection
@section('description')
    Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang menyediakan kemudahan dalam mendapat informasi
    dan pemesanan Akomodasi, Destinasi, Restoran, Transportasi, Travel dan MICE se-Indonesia.
@endsection
@section('keywords')
    tour, trip, travel, agency, life, vacation, climbing, wisata, pesona, plesiran, indonesia, pesona plesiran indonesia,
    pesona indonesia
@endsection
@section('canonical'){{ route('frontend.contact') }}@endsection
@section('url'){{ route('frontend.contact') }}@endsection
@section('content')
    <section class="space contact-box_wrapper">
        <div class="outer-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-box">
                            <div class="contact-box_icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <h3 class="contact-box__title h5">Alamat</h3>
                            <p class="contact-box__text">
                                Jl. Raya Tlogowaru No.3, Tlogowaru, Kec. Kedungkandang, Malang, Jawa Timur
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-box">
                            <div class="contact-box_icon">
                                <i class="fas fa-address-card"></i>
                            </div>
                            <h3 class="contact-box__title h5">Whatsapp</h3>
                            <ul class="contact-box_list">
                                <li>Admin 1: <a href="tel:+6281331126991">0813-3112-6991</a></li>
                                <li>Admin 2: <a href="tel:+6285867224494">0858-6722-4494</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-box">
                            <div class="contact-box_icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <h3 class="contact-box__title h5">Jam Kerja</h3>
                            <ul class="contact-box_list">
                                <li>Senin - Jumat: 8:30 - 21:30</li>
                                <li>Sabtu & Minggu: 10:00 - 21:30</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="space bg-light">
        <div class="container">
            <form id="send-mail" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center text-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="title-area">
                            <h2 class="sec-title h1">Kontak Kami</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 form-group">
                        <input type="text" placeholder="Nama / Nama Perusahaan" name="name" id="name"
                            class="form-control" />
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" placeholder="Subject" name="subject" class="form-control" />
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="email" placeholder="Email" name="email" id="email" class="form-control" />
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="number" placeholder="Phone No" name="number" id="number" class="form-control" />
                    </div>
                    <div class="form-group col-12">
                        <textarea placeholder="Pesan" name="message" id="message" class="form-control"></textarea>
                    </div>
                    <div class="col-md-auto pt-lg-3">
                        <button class="vs-btn style4" type="submit">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#send-mail').submit(function(e) {
            // alert('coba');
            e.preventDefault();
            let formData = new FormData(this);
            // $('#image-input-error').text('');
            // alert(formData);
            $.ajax({
                type:'POST',
                url: "{{ route('frontend.contact_send_mail') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if(result.success != false){
                        alert(result.message_content);
                    }else{
                        alert(result.message_content);
                    }
                },
                error: function (request, status, error) {
                    alert(error);
                }
            });
        });
    </script>
@endsection
