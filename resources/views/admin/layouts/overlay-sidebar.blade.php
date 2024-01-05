@extends('layouts.admin')

@section('options', 'data-sidenav-size="overlay"')

@section('title', 'Overlay Sidebar')

@section('additional-css')
    <!-- jsvectormap plugin css -->
    <link href="{{ asset('storage/assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet"
          type="text/css">
@endsection

@section('subtitle', 'Layouts')

@section('dashboard-content')
    <div class="row">
        <div class="col-xxl-6">
            <div class="card bg-soft-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="d-flex flex-column h-100">
                                <div class="flex-grow-1">
                                    <h3 class="fw-medium text-capitalize mt-0 mb-2">Check Account Status
                                    </h3>
                                    <p class="font-18">Your account status and activity.</p>
                                </div><!-- end d-flex -->

                                <div class="flex-shrink-0">
                                    <div class="row h-100">
                                        <div class="col-sm-6">
                                            <div class="card border-0 bg-soft-warning mb-0">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h4 class="mt-0 mb-0">Balance</h4>
                                                        <a href="#"
                                                           class="avatar-xs bg-white rounded font-18 d-flex text-black align-items-center justify-content-center">
                                                            <i class="fa-solid fa-up-right-from-square"></i>
                                                        </a>
                                                    </div>
                                                    <h2 class="mb-0">$90,000</h2>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-sm-6">
                                            <div class="card border-0 bg-soft-success mb-0">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h4 class="mt-0 mb-0">Spending</h4>
                                                        <a href="#"
                                                           class="avatar-xs bg-white rounded font-18 d-flex text-black align-items-center justify-content-center">
                                                            <i class="fa-solid fa-up-right-from-square"></i>
                                                        </a>
                                                    </div>
                                                    <h2 class="mb-0">1,21,020</h2>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-md-4">
                            <div class="d-flex align-items-center justify-content-center h-100 w-100 mt-4 mt-md-0">
                                <img src="{{ asset('storage/assets/images/hero-dashboard.png') }}" alt=""
                                     class="img-fluid">
                            </div>
                        </div><!-- end col -->
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xxl-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="my-0">Total Profit</h4>
                                <i class="fa-solid fa-chevron-right text-primary font-20"></i>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h2 class="mb-2 mt-0">$20,424</h2>
                                    <p class="mb-0"><span class="badge bg-success-subtle text-success">25.42%</span>
                                        vs last month</p>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <div id="total_profit" data-colors="#ffc107"></div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="my-0">New Customers</h4>
                                <i class="fa-solid fa-chevron-right text-primary font-20"></i>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h2 class="mb-2 mt-0">654</h2>
                                    <p class="mb-0"><span class="badge bg-success-subtle text-success">30.32%</span>
                                        vs last month</p>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <div id="new_customers" data-colors="#198754"></div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end row -->

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="my-0">Running Project</h4>
                                <i class="fa-solid fa-chevron-right text-primary font-20"></i>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h2 class="mb-2 mt-0">24</h2>
                                    <p class="mb-0"><span class="badge bg-danger-subtle text-danger rounded">5%</span>
                                        vs last month</p>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <div id="running_project" data-colors="#fa6374"></div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="my-0">Expense Total</h4>
                                <i class="fa-solid fa-chevron-right text-primary font-20"></i>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <h2 class="mb-2 mt-0">$12,246</h2>
                                    <p class="mb-0"><span class="badge bg-success-subtle text-success">12.92%</span>
                                        vs last month</p>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <div id="expense_total" data-colors="#0dcaf0"></div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card-body -->
                </div><!-- end row -->
            </div><!-- end row -->
        </div><!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Balance Overview</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown z-3">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical lh-sm"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="balance_overview" data-colors="#3980c0, #0dcaf0" class="apex-charts mb-1" dir="ltr"></div>

                    <div class="bg-soft-primary rounded">
                        <div class="row text-center">
                            <div class="col-12 col-sm-6 col-md-3">
                                <p class="text-muted font-16 text-dark mt-3"><i class="fa-regular fa-circle-dot"></i>
                                    Current Week</p>
                                <h3 class="mb-3 mt-2">
                                    <span>$1705.54</span>
                                </h3>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3">
                                <p class="text-muted font-16 text-dark mt-3"><i class="fa-regular fa-circle-dot"></i>
                                    Previous Week</p>
                                <h3 class="mb-3 mt-2">
                                    <span>$6,523.25 <i class="fa-solid fa-turn-up text-success"></i></span>
                                </h3>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3">
                                <p class="text-muted font-16 text-dark mt-3"><i class="fa-regular fa-circle-dot"></i>
                                    Conversation</p>
                                <h3 class="mb-3 mt-2">
                                    <span>8.27%</span>
                                </h3>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3">
                                <p class="text-muted font-16 text-dark mt-3"><i class="fa-regular fa-circle-dot"></i>
                                    Customers</p>
                                <h3 class="mb-3 mt-2">
                                    <span>69k <i class="fa-solid fa-turn-down text-danger"></i></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Live Users By Country</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown z-3">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical lh-sm"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div id="world-map-markers" style="height: 310px;"></div>
                </div><!-- end card-body -->

                <div class="table-responsive pt-2">
                    <table class="table table-sm table-borderless table-centered align-middle table-nowrap mb-0">
                        <thead class="text-muted table-light">
                        <tr>
                            <th>Parameters</th>
                            <th>Today</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th class="text-end">Percent</th>
                        </tr>
                        </thead><!-- end thead -->
                        <tbody class="border-0">
                        <tr>
                            <th>Duration (Secs)</th>
                            <td>0-45</td>
                            <td>45000</td>
                            <td>
                                <div class="progress progress-sm">
                                    <div class="progress-bar" role="progressbar" aria-label="Basic example"
                                         style="width: 83%" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </td>
                            <td class="text-end">83 %</td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Sessions</th>
                            <td>242</td>
                            <td>2,903</td>
                            <td>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" role="progressbar" aria-label="Basic example"
                                         style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </td>
                            <td class="text-end">88 %</td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Views</th>
                            <td>192</td>
                            <td>5,942</td>
                            <td>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-info" role="progressbar" aria-label="Basic example"
                                         style="width: 77%" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </td>
                            <td class="text-end">77 %</td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">User</th>
                            <td>162</td>
                            <td>5,942</td>
                            <td>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger" role="progressbar" aria-label="Basic example"
                                         style="width: 42%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </td>
                            <td class="text-end">42 %</td>
                        </tr>
                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Earning Reports</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown z-3">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical lh-sm"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card-header -->

                <div class="card-body pb-0">
                    <div class="row text-center">
                        <div class="col-6">
                            <p class="text-muted mb-1">This Year</p>
                            <h3 class="mt-0 font-20">$120,254 <span
                                    class="badge bg-success-subtle text-success font-11">+15%</span>
                            </h3>
                        </div>

                        <div class="col-6">
                            <p class="text-muted mb-1">Last Year</p>
                            <h3 class="mt-0 font-20">$98,741 <span class="badge bg-danger-subtle text-danger font-11">-5%</span>
                            </h3>
                        </div>
                    </div>
                    <div class="">
                        <div id="earning_report" data-colors="#0dcaf0, #3980c0"></div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-xl-6">
            <div class="card overflow-hidden">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Recent Customers</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown z-3">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical lh-sm"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-borderless table-centered mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>User ID</th>
                            <th>Basic Info</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        <tr>
                            <th scope="row">#0121</th>
                            <td>
                                <img src="{{ asset('storage/assets/images/users/avatar-2.jpg') }}" alt="contact-img"
                                     height="36" title="contact-img" class="rounded-circle float-start me-2"/>
                                <div class="overflow-hidden">
                                    <p class="mb-0 font-weight-medium"><a href="javascript: void(0);">George Lanes</a>
                                    </p>
                                    <span class="font-13">george@examples.com</span>
                                </div>
                            </td>

                            <td>
                                606-467-7601
                            </td>

                            <td>
                                New York
                            </td>

                            <td>
                                2018/04/28
                            </td>

                            <td>
                                <div class="btn-group dropdown">
                                    <a href="javascript: void(0);"
                                       class="dropdown-toggle arrow-none btn btn-light btn-sm" data-bs-toggle="dropdown"
                                       aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-pen me-1 text-muted"></i> Edit
                                            Contact</a>
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-trash me-1 text-muted"></i> Remove</a>
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-envelope me-1 text-muted"></i> Send
                                            Email</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">#0120</th>
                            <td>
                                <img src="{{ asset('storage/assets/images/users/avatar-3.jpg') }}" alt="contact-img"
                                     height="36" title="contact-img" class="rounded-circle float-start me-2"/>
                                <div class="overflow-hidden">
                                    <p class="mb-0 font-weight-medium"><a href="javascript: void(0);">Morgan Fuller</a>
                                    </p>
                                    <span class="font-13">morgan@examples.com</span>
                                </div>
                            </td>

                            <td>
                                407-748-6878
                            </td>

                            <td>
                                England
                            </td>

                            <td>
                                2018/04/27
                            </td>

                            <td>
                                <div class="btn-group dropdown">
                                    <a href="javascript: void(0);"
                                       class="dropdown-toggle arrow-none btn btn-light btn-sm" data-bs-toggle="dropdown"
                                       aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-pen me-1 text-muted"></i> Edit
                                            Contact</a>
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-trash me-1 text-muted"></i> Remove</a>
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-envelope me-1 text-muted"></i> Send
                                            Email</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">#0119</th>
                            <td>
                                <img src="{{ asset('storage/assets/images/users/avatar-4.jpg') }}" alt="contact-img"
                                     height="36" title="contact-img" class="rounded-circle float-start me-2"/>
                                <div class="overflow-hidden">
                                    <p class="mb-0 font-weight-medium"><a href="javascript: void(0);">Charlie Daly</a>
                                    </p>
                                    <span class="font-13">charlie@examples.com</span>
                                </div>
                            </td>

                            <td>
                                918-766-5946
                            </td>

                            <td>
                                Canada
                            </td>

                            <td>
                                2018/04/27
                            </td>

                            <td>
                                <div class="btn-group dropdown">
                                    <a href="javascript: void(0);"
                                       class="dropdown-toggle arrow-none btn btn-light btn-sm" data-bs-toggle="dropdown"
                                       aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-pen me-1 text-muted"></i> Edit
                                            Contact</a>
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-trash me-1 text-muted"></i> Remove</a>
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-envelope me-1 text-muted"></i> Send
                                            Email</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">#0118</th>
                            <td>
                                <img src="{{ asset('storage/assets/images/users/avatar-5.jpg') }}" alt="contact-img"
                                     height="36" title="contact-img" class="rounded-circle float-start me-2"/>
                                <div class="overflow-hidden">
                                    <p class="mb-0 font-weight-medium"><a href="javascript: void(0);">Skye Saunders</a>
                                    </p>
                                    <span class="font-13">skye@examples.com</span>
                                </div>
                            </td>

                            <td>
                                302-232-1376
                            </td>

                            <td>
                                France
                            </td>

                            <td>
                                2018/04/26
                            </td>

                            <td>
                                <div class="btn-group dropdown">
                                    <a href="javascript: void(0);"
                                       class="dropdown-toggle arrow-none btn btn-light btn-sm" data-bs-toggle="dropdown"
                                       aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-pen me-1 text-muted"></i> Edit
                                            Contact</a>
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-trash me-1 text-muted"></i> Remove</a>
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-envelope me-1 text-muted"></i> Send
                                            Email</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">#0117</th>
                            <td>
                                <img src="{{ asset('storage/assets/images/users/avatar-6.jpg') }}" alt="contact-img"
                                     height="36" title="contact-img" class="rounded-circle float-start me-2"/>
                                <div class="overflow-hidden">
                                    <p class="mb-0 font-weight-medium"><a href="javascript: void(0);">Jodie Townsend</a>
                                    </p>
                                    <span class="font-13">jodie@examples.com</span>
                                </div>
                            </td>

                            <td>
                                251-661-5962
                            </td>

                            <td>
                                Tokyo
                            </td>

                            <td>
                                2017/11/28
                            </td>

                            <td>
                                <div class="btn-group dropdown">
                                    <a href="javascript: void(0);"
                                       class="dropdown-toggle arrow-none btn btn-light btn-sm" data-bs-toggle="dropdown"
                                       aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-pen me-1 text-muted"></i> Edit
                                            Contact</a>
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-trash me-1 text-muted"></i> Remove</a>
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-envelope me-1 text-muted"></i> Send
                                            Email</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">#0117</th>
                            <td>
                                <img src="{{ asset('storage/assets/images/users/avatar-6.jpg') }}" alt="contact-img"
                                     height="36" title="contact-img" class="rounded-circle float-start me-2"/>
                                <div class="overflow-hidden">
                                    <p class="mb-0 font-weight-medium"><a href="javascript: void(0);">Jodie Townsend</a>
                                    </p>
                                    <span class="font-13">jodie@examples.com</span>
                                </div>
                            </td>

                            <td>
                                251-661-5962
                            </td>

                            <td>
                                Tokyo
                            </td>

                            <td>
                                2017/11/28
                            </td>

                            <td>
                                <div class="btn-group dropdown">
                                    <a href="javascript: void(0);"
                                       class="dropdown-toggle arrow-none btn btn-light btn-sm" data-bs-toggle="dropdown"
                                       aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-pen me-1 text-muted"></i> Edit
                                            Contact</a>
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-trash me-1 text-muted"></i> Remove</a>
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-envelope me-1 text-muted"></i> Send
                                            Email</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('additional-scripts')
    <!-- Chart JS -->
    <script src="{{ asset('storage/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Vector Map Js -->
    <script src="{{ asset('storage/assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('storage/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ asset('storage/assets/libs/jsvectormap/maps/world.js') }}"></script>
    <!-- Dashboar init js-->
    <script src="{{ asset('storage/assets/js/pages/dashboard.init.js') }}" type="module"></script>
@endsection
