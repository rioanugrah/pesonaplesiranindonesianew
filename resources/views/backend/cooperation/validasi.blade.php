@extends('layouts.backend_2024.master')
@section('title')
    Validasi Cooperation
@endsection
@section('css')
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
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Kode Corporate</label>
                                    <div>{{ $cooperation->kode_corporate }}</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Nama Usaha</label>
                                    <div>{{ $cooperation->nama_usaha }}</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Email</label>
                                    <div>{{ $cooperation->email }}</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Nama</label>
                                    <div>{{ $cooperation->nama }}</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Kategori</label>
                                    <div>{{ $cooperation->kategori_corporate->nama_kategori }}</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Alamat Usaha</label>
                                    <div>{{ $cooperation->alamat_usaha }}</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>No. Telp</label>
                                    <div>{{ $cooperation->no_telp }}</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Provinsi</label>
                                    <div>{{ $cooperation->provinsi->nama }}</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Kota / Kabupaten</label>
                                    <div>{{ $cooperation->kota->nama }}</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Kecamatan</label>
                                    <div>{{ $cooperation->kecamatan->nama }}</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Status</label>
                                    @switch($cooperation->status)
                                        @case('Waiting')
                                            <div>
                                                <span class="badge bg-warning">Menunggu Verifikasi</span>
                                            </div>
                                        @break

                                        @case('Approved')
                                            <div>
                                                <span class="badge bg-success">Disetujui</span>
                                            </div>
                                        @break

                                        @case('Rejected')
                                            <div>
                                                <span class="badge bg-dange">Ditolak</span>
                                            </div>
                                        @break

                                        @default
                                    @endswitch
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Validasi</label>
                                    <select name="status" class="form-control" id="">
                                        <option value="">-- Status Validasi --</option>
                                        <option value="Approved">Disetujui</option>
                                        <option value="Rejected">Ditolak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- <hr>
                {!! $cooperation->kategori_corporate->deskripsi !!}
                <hr> --}}
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-secondary"
                            onclick="window.location.href='{{ url()->previous() }}'">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $('#form-simpan').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('b.cooperation_validasi_simpan',['id' => $cooperation->id]) }}",
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
                            showConfirmButton: false
                        });
                        setTimeout(() => {
                            window.location.href = "{{ route('b.cooperation') }}"
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
                    Swal.fire({
                        title: 'Error',
                        text: error,
                        icon: 'error',
                        // showConfirmButton: false
                    });
                }
            });
        });
    </script>
@endsection
