@extends('layouts.admin')

@section('title', 'Pricing')

@section('subtitle', 'Extra Pages')

@section('dashboard-content')
    <!-- Pricing Title-->
    <div class="text-center">
        <h3 class="mb-2 fw-bold">Our Plans</h3>
        <p class="text-muted mb-5">
            We have plans and prices that fit your business perfectly. Make your <br> client site a
            success with our products.
        </p>
    </div>

    <!-- Plans -->
    <div class="row justify-content-center my-3">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-body">

                    <h1 class="mb-0 text-dark fw-semibold">$0</h1>
                    <p class="mb-3 text-muted fw-semibold">PER YEAR</p>

                    <h3 class="fw-bold">Free</h3>
                    <p class="text-muted fw-semibold font-16">All the basic for business that are getting
                        started</p>

                    <hr>
                    <ul class="list-unstyled d-grid gap-2">
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>10 GB Storage</li>
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>500 GB Bandwidth</li>
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>No Domain</li>
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>1 User</li>
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>Email Support</li>
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>24x7 Support</li>
                    </ul>

                    <button class="btn btn-success text-white text-start fw-semibold w-100">Get Started<i
                            class="mdi mdi-arrow-right float-end"></i></button>

                </div>
            </div> <!-- end Pricing_card -->
        </div> <!-- end col -->

        <div class="col-xl-3 col-lg-4">
            <div class="card ribbon-box">
                <div class="card-body">
                    <div class="ribbon ribbon-primary float-end"><i
                            class="mdi mdi-access-point me-1"></i> Most Popular
                    </div>
                    <h1 class="mb-1 mt-0 fw-semibold">$70</h1>
                    <p class="mb-3 text-muted fw-semibold font-16">PER YEAR</p>

                    <h3 class="fw-bold">Preminum</h3>
                    <p class="text-muted fw-semibold font-16">All the basic for business that are
                        getting started</p>

                    <hr>
                    <ul class="list-unstyled d-grid gap-2">
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>50 GB Storage
                        </li>
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>500 GB
                            Bandwidth
                        </li>
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>No Domain
                        </li>
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>1 User</li>
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>Email Support
                        </li>
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>24x7 Support
                        </li>
                    </ul>

                    <button class="btn btn-primary text-white text-start fw-semibold w-100">Get Started<i
                            class="mdi mdi-arrow-right float-end"></i></button>


                </div>
            </div> <!-- end Pricing_card -->
        </div> <!-- end col -->


        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-0 text-dark fw-semibold">$150</h1>
                    <p class="mb-3 text-muted fw-semibold">PER YEAR</p>

                    <h3 class="fw-bold">Business</h3>
                    <p class="text-muted fw-semibold font-16">All the basic for business that are getting started</p>

                    <hr>
                    <ul class="list-unstyled d-grid gap-2">
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>10 GB Storage</li>
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>500 GB Bandwidth</li>
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>No Domain</li>
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>1 User</li>
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>Email Support</li>
                        <li class="fs-15"><i class="fa-solid fa-check-double"></i>24x7 Support</li>
                    </ul>

                    <button class="btn btn-success text-white text-start fw-semibold w-100">Get Started
                        <i class="fa-solid fa-arrow-right"></i></button>

                </div>
            </div> <!-- end Pricing_card -->
        </div> <!-- end col -->

    </div>
    <!-- end row -->
@endsection
