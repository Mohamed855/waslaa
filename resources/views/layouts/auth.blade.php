@extends('app')

@section('main-content')
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card">
                    <div class="row g-0 align-items-center justify-content-center">
                        <div class="col-12 col-xl-5 col-lg-6">
                            <div class="d-flex flex-column p-4 h-100">
                                <div class="flex-shrink-0">
                                    <div class="auth-brand mb-5 text-center">
                                        <a href="#" class="logo-light">
                                            <span><img src="{{ asset('storage/images/global/logo-dark.jpg') }}" alt="" height="32"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="flex-grow-1 d-flex flex-column align-items-center">
                                    <div class="w-100">
                                        @if (session()->has('success'))
                                            <div class="d-flex alert alert-success justify-content-center mb-2" role="alert" style="height: 58px; align-items: center;">
                                                <p>{{ session('success') }}</p>
                                            </div>
                                        @endif
                                        @if (session()->has('error'))
                                            <div class="d-flex alert alert-danger justify-content-center mb-2" role="alert" style="height: 58px; align-items: center;">
                                                <p>{{ session('error') }}</p>
                                            </div>
                                        @endif
                                        @yield('card-content')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 col-lg-6 d-none d-lg-block">
                            <div class="login-img">
                                <div class="img-light">
                                    <img src="{{ asset('storage/images/global/login.svg') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('secondary-action')
            </div>
            @include('dashboard.partials.auth-footer')
        </div>
    </div>
@endsection


