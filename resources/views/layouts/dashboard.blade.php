@extends('app')

@section('main-content')
    @include('dashboard.partials.navbar')

    @include('dashboard.partials.sidebar')

    <!-- BEGIN: Content-->
    <div class="app-content content ecommerce-application" style="padding: calc(0rem + 3.45rem* 2 + 1.3rem) 2rem 0 2rem;">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                @if (! (request()->routeIs('users.show') || request()->routeIs('profile') || request()->routeIs('vendors.show')) )
                    <div class="col-lg-12 col-12">
                        <div class="card card-statistics">
                            <div class="card-header">
                                <h3 class="card-title">@yield('title')</h3>
                                <a href=""><img class="rounded" src="{{ asset('storage/images/global/logo-dark.jpg') }}" width="70px"></a>
                            </div>
                        </div>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>

    @include('dashboard.partials.footer')
    <!-- END: Content-->
@endsection

@section('scripts')
    @include('dashboard.partials.scripts')
@endsection
