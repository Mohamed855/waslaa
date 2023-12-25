@extends('app')

@section('body-content')
    <!-- Begin page -->
    <div class="app-wrapper">
        @include('includes.sidenav')
        <div class="content-page">
            @include('includes.top-bar')
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center py-2">
                                <h4>@yield('dashboard-title')</h4>
                                <ol class="breadcrumb d-lg-flex d-none mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">TechUI</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">@yield('subtitle')</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">@yield('title')</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    @yield('dashboard-content')
                </div>
            </div>
            @include('includes.footer')
        </div>
    </div>
    @include('includes.right-sidebar')
@endsection
