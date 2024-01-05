@extends('app')

@section('body-class', 'authentication-bg authentication-bg-pattern')

@section('body-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="row g-0 align-items-center justify-content-center">
                        <div class="col-xl-5 col-lg-6">
                            <div class="card-body p-4">
                                <div class="auth-brand mb-4">
                                    <a href="#" class="logo-dark">
                                        <span><img src="{{ asset('storage/assets/images/logo-light.png') }}" alt="" height="32"></span>
                                    </a>
                                    <a href="#" class="logo-light">
                                        <span><img src="{{ asset('storage/assets/images/logo-dark.png') }}" alt="" height="32"></span>
                                    </a>
                                </div>
                                <div class="d-flex flex-column h-100">

                                    <div class="p-4 my-auto">
                                        <div class="d-flex justify-content-center mb-5">
                                            <img src="@yield('err-logo')" alt="" class="img-fluid">
                                        </div>
                                        <div class="text-center">
                                            <h1 class="mb-3">@yield('err-code')</h1>
                                            <h4 class="fs-20">@yield('err-title')</h4>
                                            <p class="text-muted mb-3">@yield('err-description')</p>
                                        </div>
                                        <a href="#" class="btn btn-soft-primary w-100"><i class="fa-solid fa-house"></i> Back to Home</a>
                                    </div>
                                </div>

                            </div> <!-- end card-body -->

                        </div>
                        <div class="col-xl-7 col-lg-6  d-none d-lg-block">
                            <img src="{{ asset('storage/assets/images/login.svg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <!-- end card -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
@endsection


