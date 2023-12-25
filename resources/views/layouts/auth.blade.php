@extends('app')

@section('body-class', 'authentication-bg')

@section('body-content')
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="row g-0 align-items-center justify-content-center">
                        <div class="col-xl-5 col-lg-6">
                            <div class="d-flex flex-column p-4 h-100">
                                <div class="flex-shrink-0">
                                    <div class="auth-brand mb-5 text-center">
                                        {{--<a href="#" class="logo-dark">
                                            <span><img src="{{ asset('storage/assets/images/logo-light.png') }}" alt="" height="32"></span>
                                        </a>--}}
                                        <a href="#" class="logo-light">
                                            <span><img src="{{ asset('storage/assets/images/logo-dark.png') }}" alt="" height="32"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="flex-grow-1 d-flex flex-column align-items-center">
                                    <div class="w-100">
                                        @yield('card-content')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 d-none d-lg-block">
                            <div class="login-img">
                                <div class="img-light">
                                    <img src="{{ asset('storage/assets/images/login.svg') }}" alt="" class="img-fluid">
                                </div>
                                {{--<div class="img-dark">
                                    <img src="{{ asset('storage/assets/images/login-dark.svg') }}" alt="" class="img-fluid">
                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                @yield('secondary-action')
            </div>
            @include('includes.auth-footer')
        </div>
    </div>
@endsection


