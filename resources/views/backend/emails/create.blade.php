@extends('layouts.backend_2024.master')
@section('title')
    Create Email
@endsection
@section('css')
    <link href="{{ URL::asset('backend/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Email</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('emails.b_email') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form id="form-simpan" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="subject" class="form-control" placeholder="Title" id="">
                        </div>
                        <div class="mb-3">
                            <label>To</label>
                            <input type="email" name="to" class="form-control" placeholder="To" id="">
                        </div>
                        <div class="mb-3">
                            <label>Email Template</label>
                            <select name="email_template" class="form-control" id="email_template">
                                <option value="">-- Pilih Email Template --</option>
                                @foreach ($email_templates as $email_template)
                                    <option value="{{ $email_template->id }}">{{ $email_template->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="file" name="attachment1" class="form-control"
                                                        id="">
                        <div class="mb-3" id="description"></div>
                        <div class="mb-3 outer-repeater">
                            <div data-repeater-list="outer_group" class="outer">
                                <div data-repeater-item class="outer">
                                    <div class="inner-repeater mb-4">
                                        <div data-repeater-list="attachment_group" class="inner form-group">
                                            <label class="form-label">Attachment :</label>
                                            <div data-repeater-item class="inner mb-3 row">
                                                <div class="col-md-10 col-8">
                                                    <input type="file" name="attachment" class="form-control"
                                                        id="">
                                                </div>
                                                <div class="col-md-2 col-4 d-grid">
                                                    <input data-repeater-delete type="button"
                                                        class="btn btn-danger btn-block inner" value="Delete" />
                                                </div>
                                            </div>
                                        </div>
                                        <input data-repeater-create type="button" class="btn btn-success inner"
                                            value="Add" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('backend/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ URL::asset('backend/libs/ckeditor/ckeditor.min.js') }}"></script>
    <script src="{{ URL::asset('backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('backend/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/pages/form-repeater.int.js') }}"></script>
    <script>
        // ClassicEditor
        //     .create(document.querySelector('#classic-editor'))
        //     .catch(error => {
        //         console.error(error);
        //     });

        $('#email_template').on('change', function() {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/emails/template/') }}" + '/' + $('#email_template').val(),
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result) {
                    if (result.success = true) {
                        document.getElementById('description').innerHTML = result.data.descriptions;
                        // $('.description').val(result.data.descriptions);
                    } else {

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
            })
        });

        $('#form-simpan').submit(function(e) {
            // alert('coba');
            e.preventDefault();
            let formData = new FormData(this);
            // $('#image-input-error').text('');
            $.ajax({
                type: 'POST',
                url: "{{ route('emails.b_email.simpan') }}",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    var timerInterval;
                    Swal.fire({
                        title: 'Waiting!',
                        html: 'Sedang Proses Mengirim, Silahkan Tunggu',
                        // timer: 2000,
                        showConfirmButton: false,
                        confirmButtonColor: "#5b73e8",
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
                        // toastr["success"](result.message_content);
                        // toastr.options = {
                        //     "closeButton": false,
                        //     "debug": false,
                        //     "newestOnTop": false,
                        //     "progressBar": true,
                        //     "positionClass": "toast-top-right",
                        //     "preventDuplicates": false,
                        //     "onclick": null,
                        //     "showDuration": 300,
                        //     "hideDuration": 1000,
                        //     "timeOut": 5000,
                        //     "extendedTimeOut": 1000,
                        //     "showEasing": "swing",
                        //     "hideEasing": "linear",
                        //     "showMethod": "fadeIn",
                        //     "hideMethod": "fadeOut"
                        // };
                        Swal.fire({
                            title: "Berhasil",
                            text: result.message_content,
                            icon: 'success',
                            // confirmButtonColor: '#5b73e8',
                            showConfirmButton: false
                        });
                        setTimeout(() => {
                            window.location.href = '{{ route('emails.b_email') }}';
                        }, 3000);
                    } else {
                        toastr["error"](result.error);
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
                        // alert('test');
                        // iziToast.error({
                        //     title: result.success,
                        //     message: result.error
                        // });
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
