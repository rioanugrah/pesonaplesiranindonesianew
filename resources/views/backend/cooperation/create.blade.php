@extends('layouts.backend_2024.master')
@section('title')
    Coorporate Create
@endsection
@section('css')
    <link href="{{ URL::asset('backend/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@yield('title')</h4>
                    <hr>
                    <form id="form-simpan" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label>NIK KTP</label>
                            <input type="text" name="nik" class="form-control" placeholder="NIK KTP" id="">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" id="">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" id="">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Nama Usaha</label>
                            <input type="text" name="nama_usaha" class="form-control" placeholder="Nama Usaha" id="">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label>No.Telp</label>
                            <input type="number" name="no_telp" class="form-control" placeholder="No.Telp" id="">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Alamat Usaha</label>
                            <textarea name="alamat_usaha" class="form-control" placeholder="Alamat Usaha" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Provinsi</label>
                            <select name="provinsi_id" class="form-control" id="provinsi">
                                <option value="">-- Provinsi --</option>
                                @foreach ($provinsis as $provinsi)
                                    <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Kabupaten / Kota</label>
                            <select name="kota_id" class="form-control" id="kab_kota">
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Kecamatan</label>
                            <select name="kecamatan_id" class="form-control" id="kecamatan">
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Negara</label>
                            <select name="negara" class="form-control" id="">
                                <option value="">-- Negara --</option>
                                <option value="Indonesia">Indonesia</option>
                            </select>
                        </div>
                        {{-- <div class="col-md-3 mb-3">
                            <label>Kategori Usaha</label>
                            <select name="kategori_corporate_id" class="form-control" id="kategori_corporate">
                                <option value="">-- Kategori Usaha --</option>
                                @foreach ($kategori_corporates as $kategori_corporate)
                                    <option value="{{ $kategori_corporate->id }}">{{ $kategori_corporate->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                    {{-- <hr>
                    <div id="detail_kategori"></div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('backend/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('backend/js/pages/axios.min.js') }}"></script>
    <script>
        $('#provinsi').on('change',function(){
            // alert($(this).val());
            axios.post('{{ route("kota") }}', {id: $(this).val()})
            .then(function (response) {
                $('#kab_kota').empty();
                $.each(response.data, function (id, nama) {
                    $('#kab_kota').append(new Option(nama, id))
                })
            });
        });

        $('#kab_kota').on('change',function(){
            axios.post('{{ route("kecamatan") }}', {id: $(this).val()})
            .then(function (response) {
                $('#kecamatan').empty();
                $.each(response.data, function (id, nama) {
                    $('#kecamatan').append(new Option(nama, id))
                })
            });
        });

        // $('#kategori_corporate').on('change',function(){
        //     axios.get('{{ url("b/cooperation/kategori/") }}'+'/'+$(this).val())
        //     .then(function (response) {
        //         document.getElementById('detail_kategori').innerHTML = response.data.data;
        //     });
        // });

        $('#form-simpan').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('b.cooperation_simpan') }}",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: () => {
                    var timerInterval;
                    Swal.fire({
                        title: 'Waiting',
                        html: 'Sedang Diproses.',
                        showConfirmButton: false,
                        onBeforeOpen: function onBeforeOpen() {
                            Swal.showLoading();
                            timerInterval = setInterval(function() {
                                Swal.getContent().querySelector('strong')
                                    .textContent = Swal.getTimerLeft();
                            }, 100);
                        },
                        onClose: function onClose() {
                            clearInterval(timerInterval);
                        }
                    }).then(function(result) {
                        if ( // Read more about handling dismissals
                            result.dismiss === Swal.DismissReason.timer) {
                            console.log('I was closed by the timer');
                        }
                    });
                },
                success: (result) => {
                    if (result.success != false) {
                        Swal.fire({
                            title: result.message_title,
                            text: result.message_content,
                            icon: 'success',
                            // showConfirmButton: false
                        });
                        setTimeout(() => {
                            window.location.href="{{ route('b.cooperation') }}"
                        }, 3000);
                        // this.reset();
                    } else {
                        Swal.fire({
                            title: 'Gagal',
                            text: result.error,
                            icon: 'error',
                            // showConfirmButton: false
                        });
                    }
                },
                error: function(request, status, error) {
                    toastr["error"](error);
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
                }
            });
        });
    </script>
@endsection
