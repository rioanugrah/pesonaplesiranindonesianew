@extends('layouts.it.auth.master')
@section('title')
    Login Apps
@endsection
@section('content')
<div class="row align-items-center justify-content-center min-vh-100">
    <div class="col-10 col-md-6 col-lg-4 col-xxl-3">
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center">
                    <a href="index.html" class="logo-dark">
                        <img src="assets/images/logo-dark.png" alt="" height="20" class="auth-logo logo-dark mx-auto">
                    </a>
                    <a href="index.html" class="logo-dark">
                        <img src="assets/images/logo-light.png" alt="" height="20" class="auth-logo logo-light mx-auto">
                    </a>


                    <h4 class="mt-4">Login Apps IT</h4>
                    <p class="text-muted">Terimakasih telah mengunjungi website kami.</p>
                </div>

                <div class="p-2 mt-5">
                    <form class="" method="POST" action="{{ route('it.postLogin') }}">
                        @if ($errors->any() && $retries > 0)
                            <div class="alert alert-warning">Remaining {{ $retries }} Attempt</div>
                        @endif

                        @if ($retries <= 0)
                            <div class="alert alert-danger">Please try again after {{ $seconds }} seconds</div>
                        @endif
                        @csrf
                        <div class="input-group auth-form-group-custom mb-3">
                            <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i class="mdi mdi-account-outline auti-custom-input-icon"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" aria-label="Email" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group auth-form-group-custom mb-3">
                            <span class="input-group-text bg-primary bg-opacity-10 fs-16" id="basic-addon2"><i class="mdi mdi-lock-outline auti-custom-input-icon"></i></span>
                            <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="mb-sm-5">
                            <div class="form-check float-sm-start">
                                <input type="checkbox" class="form-check-input" id="customControlInline">
                                <label class="form-check-label" for="customControlInline">Remember me</label>
                            </div>
                            <div class="float-sm-end">
                                <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                            </div>
                        </div>

                        <div class="pt-3 text-center">
                            <button class="btn btn-primary w-xl waves-effect waves-light" type="submit">Log In</button>
                        </div>

                    </form>
                </div>

                <div class="mt-5 text-center">
                    <p>©
                        <script>document.write(new Date().getFullYear())</script> IT CV Pesona Plesiran Indonesia
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
