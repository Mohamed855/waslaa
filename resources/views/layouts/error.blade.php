@extends('app')

@section('main-content')
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center" style="height: 100vh">
            <div class="col-lg-10">
                <div class="card">
                    <div class="row g-0 align-items-center justify-content-center">
                        <div class="col-xl-5 col-lg-6">
                            <div class="card-body p-4">
                                <div class="d-flex flex-column h-100">

                                    <div class="my-auto">
                                        <div class="text-center">
                                            <h1 class="mb-2 fw-bolder">@yield('err-code')</h1>
                                            <h4 class="fs-20">@yield('err-title')</h4>
                                            <p class="text-muted my-1">@yield('err-description')</p>
                                        </div>
                                        @yield('err-action')
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-xl-7 col-lg-6  d-none d-lg-block">
                            <img src="@yield('err-logo')" alt="" class="img-fluid w-100 px-2">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


