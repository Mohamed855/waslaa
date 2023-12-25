@extends('layouts.admin')

@section('title', 'Invoice')

@section('subtitle', 'Invoice')

@section('dashboard-content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="card-title mb-0">
                                All Invoices
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                        <tr class="bg-light">
                            <th>
                                <input class="form-check-input" type="checkbox" value=""
                                       id="flexCheckDefault">
                            </th>
                            <th>
                                Customer
                            </th>

                            <th>
                                Product
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Amount
                            </th>
                            <th>
                                Vendor
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Rate
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <input class="form-check-input" type="checkbox" value=""
                                       id="flexCheckDefault">
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm rounded-circle">
                                        <img src="{{ asset('storage/assets/images/users/avatar-1.jpg') }}" alt=""
                                             class="img-fluid rounded-circle">
                                    </div>
                                    <div class="ps-2">
                                        <h5 class="mb-1">Constance Norton</h5>
                                        <p class="text-muted fs-6 mb-0">#349122</p>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Dashboard
                            </td>
                            <td>
                                12/02/2021
                            </td>
                            <td>
                                <span class="text-success fw-bold">$111.00</span>
                            </td>
                            <td>
                                Company Lac.
                            </td>

                            <td>
                                <span class="badge bg-success-subtle text-success ">Paid</span>
                            </td>

                            <td>
                                <h5 class="mb-0">4.0 <span class="fs-12 text-muted">(199 Votes)</span>
                                </h5>
                            </td>
                            <td>
                                <a href="invoice.blade.php"
                                   class="btn btn-outline-dark">Details</a>
                            </td>

                        </tr>

                        <tr>
                            <td>
                                <div>
                                    <input class="form-check-input" type="checkbox" value=""
                                           id="flexCheckDefault">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm rounded-circle">
                                        <img src="{{ asset('storage/assets/images/users/avatar-3.jpg') }}" alt=""
                                             class="img-fluid rounded-circle">
                                    </div>
                                    <div class="ps-2">
                                        <h5 class="mb-1">Stacey Santiago</h5>
                                        <p class="text-muted fs-6 mb-0">#215212</p>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Dashboard UI
                            </td>
                            <td>
                                01/04/2021
                            </td>
                            <td>
                                <span class="text-danger fw-semibold">$29.00</span>
                            </td>
                            <td>
                                Design
                            </td>

                            <td>
                                <span class="badge bg-danger-subtle text-danger">Unpaid</span>
                            </td>
                            <td>
                                <h5 class="mb-0">4.8 <span class="fs-12 text-muted">(1k Votes)</span>
                                </h5>
                            </td>
                            <td>
                                <a href="invoice.blade.php"
                                   class="btn btn-outline-dark">Details</a>
                            </td>

                        </tr>

                        <tr>
                            <td>
                                <input class="form-check-input" type="checkbox" value=""
                                       id="flexCheckDefault">
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm rounded-circle">
                                        <img src="{{ asset('storage/assets/images/users/avatar-12.jpg') }}" alt=""
                                             class="img-fluid rounded-circle">
                                    </div>
                                    <div class="ps-2">
                                        <h5 class="mb-1">Deniza Yanez</h5>
                                        <p class="text-muted fs-6 mb-0">#215402</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                TechUI UL Kit
                            </td>
                            <td>
                                02/04/2021
                            </td>
                            <td>
                                <span class="text-success fw-semibold">$22.00</span>
                            </td>
                            <td>
                                3D Artist
                            </td>

                            <td>
                                <span class="badge bg-success-subtle text-success">paid</span>
                            </td>
                            <td>
                                <h5 class="mb-0">3.8<span class="fs-12 text-muted">(259 Votes)</span>
                                </h5>
                            </td>
                            <td>
                                <a href="invoice.blade.php"
                                   class="btn btn-outline-dark">Details</a>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <input class="form-check-input" type="checkbox" value=""
                                       id="flexCheckDefault">
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm rounded-circle">
                                        <img src="{{ asset('storage/assets/images/users/avatar-5.jpg') }}" alt=""
                                             class="img-fluid rounded-circle">
                                    </div>
                                    <div class="ps-2">
                                        <h5 class="mb-1">Erica Lagarde</h5>
                                        <p class="text-muted fs-6 mb-0">#223294</p>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Glassmorphisam UL kit
                            </td>
                            <td>
                                12/04/2021
                            </td>
                            <td>
                                <span class="text-danger fw-semibold">$86.00</span>
                            </td>
                            <td>
                                GetAppui
                            </td>

                            <td>
                                <span class="badge bg-danger-subtle text-danger">Unpaid</span>
                            </td>
                            <td>
                                <h5 class="mb-0">4.0<span class="fs-12 text-muted">(4k Votes)</span>
                                </h5>
                            </td>
                            <td>
                                <a href="invoice.blade.php"
                                   class="btn btn-outline-dark">Details</a>
                            </td>

                        </tr>


                        <tr>
                            <td>
                                <input class="form-check-input" type="checkbox" value=""
                                       id="flexCheckDefault">
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm rounded-circle">
                                        <img src="{{ asset('storage/assets/images/users/avatar-7.jpg') }}" alt=""
                                             class="img-fluid rounded-circle">
                                    </div>
                                    <div class="ps-2">
                                        <h5 class="mb-1">Alfred Argo</h5>
                                        <p class="text-muted fs-6 mb-0">#224698</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                Lugda UL Kit
                            </td>
                            <td>
                                16/04/2021
                            </td>
                            <td>
                                <span class="text-success fw-semibold">$32.00</span>
                            </td>
                            <td>
                                IP Themes
                            </td>

                            <td>
                                <span class="badge bg-success-subtle text-success">paid</span>
                            </td>
                            <td>
                                <h5 class="mb-0">3.7<span class="fs-12 text-muted">(220 Votes)</span>
                                </h5>
                            </td>
                            <td>
                                <a href="invoice.blade.php"
                                   class="btn btn-outline-dark">Details</a>
                            </td>

                        </tr>


                        <tr>
                            <td>
                                <div>
                                    <input class="form-check-input" type="checkbox" value=""
                                           id="flexCheckDefault">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm rounded-circle">
                                        <img src="{{ asset('storage/assets/images/users/avatar-8.jpg') }}" alt=""
                                             class="img-fluid rounded-circle">
                                    </div>
                                    <div class="ps-2">
                                        <h5 class="mb-1">Sean Kessler</h5>
                                        <p class="text-muted fs-6 mb-0">#21756</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                Dashboard UI
                            </td>
                            <td>
                                18/04/2021
                            </td>
                            <td>
                                <span class="text-success fw-semibold">$98.00</span>
                            </td>
                            <td>
                                GetAppui
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success">paid</span>
                            </td>
                            <td>
                                <h5 class="mb-0">4.8<span class="fs-12 text-muted">(10K Votes)</span>
                                </h5>
                            </td>
                            <td>
                                <a href="invoice.blade.php"
                                   class="btn btn-outline-dark">Details</a>
                            </td>

                        </tr>


                        <tr>
                            <td>
                                <div>
                                    <input class="form-check-input" type="checkbox" value=""
                                           id="flexCheckDefault">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm rounded-circle">
                                        <img src="{{ asset('storage/assets/images/users/avatar-10.jpg') }}" alt=""
                                             class="img-fluid rounded-circle">
                                    </div>
                                    <div class="ps-2">
                                        <h5 class="mb-1">Byron Parkinson</h5>
                                        <p class="text-muted fs-6 mb-0">#568965</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                Theme UI
                            </td>
                            <td>
                                19/04/2021
                            </td>
                            <td>
                                <span class="text-danger fw-semibold">$25.00</span>
                            </td>
                            <td>
                                Craft Inc.
                            </td>

                            <td>
                                <span class="badge bg-danger-subtle text-danger">Unpaid</span>
                            </td>
                            <td>
                                <h5 class="mb-0">3.6<span class="fs-12 text-muted">(1.2K Votes)</span>
                                </h5>
                            </td>
                            <td>
                                <a href="invoice.blade.php"
                                   class="btn btn-outline-dark">Details</a>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <div>
                                    <input class="form-check-input" type="checkbox" value=""
                                           id="flexCheckDefault">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm rounded-circle">
                                        <img src="{{ asset('storage/assets/images/users/avatar-11.jpg') }}" alt=""
                                             class="img-fluid rounded-circle">
                                    </div>
                                    <div class="ps-2">
                                        <h5 class="mb-1">Rebecca Wheeler</h5>
                                        <p class="text-muted fs-6 mb-0">#926082</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                Megzi UI kit
                            </td>
                            <td>
                                22/04/2021
                            </td>
                            <td>
                                <span class="text-success fw-semibold">$55.00</span>
                            </td>
                            <td>
                                3D Aritst
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success">paid</span>
                            </td>
                            <td>
                                <h5 class="mb-0">3.0<span class="fs-12 text-muted">(120 Votes)</span>
                                </h5>
                            </td>
                            <td>
                                <a href="invoice.blade.php"
                                   class="btn btn-outline-dark">Details</a>
                            </td>

                        </tr>

                        <tr>
                            <td>
                                <div>
                                    <input class="form-check-input" type="checkbox" value=""
                                           id="flexCheckDefault">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm rounded-circle">
                                        <img src="{{ asset('storage/assets/images/users/avatar-9.jpg') }}" alt=""
                                             class="img-fluid rounded-circle">
                                    </div>
                                    <div class="ps-2">
                                        <h5 class="mb-1">James Royal</h5>
                                        <p class="text-muted fs-6 mb-0">#120963</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                Zarko Dashboard UI
                            </td>
                            <td>
                                25/04/2021
                            </td>
                            <td>
                                <span class="text-danger fw-semibold">$119.00</span>
                            </td>
                            <td>
                                Craft Inc.
                            </td>

                            <td>
                                <span class="badge bg-success-subtle text-success">Paid</span>
                            </td>
                            <td>
                                <h5 class="mb-0">4.2<span class="fs-12 text-muted">(3.9k Votes)</span>
                                </h5>
                            </td>
                            <td>
                                <a href="invoice.blade.php"
                                   class="btn btn-outline-dark">Details</a>
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
