@extends('layouts.admin')

@section('title', 'Orders Details')

@section('subtitle', 'Ecommerce')

@section('dashboard-content')
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-3">Details</h4>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Completed
                                <i class="mdi mdi-menu-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Pending</a>
                                <a class="dropdown-item" href="#">Completed</a>
                                <a class="dropdown-item" href="#">Cancelled</a>
                                <a class="dropdown-item" href="#">Refunded</a>
                            </div>
                        </div>
                    </div>

                    <div
                        class="d-flex align-items-center justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{ asset('storage/assets/images/products/product-6.jpg') }}" alt=""
                                 class="avatar-md rounded">
                            <div>
                                <h5 class="mb-1">Black Winter Shoes</h5>
                                <p class="mb-0">16H8UR0</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-4 align-items-center">
                            <p class="mb-0">x1</p>
                            <h5 class=" m-0">$93.56</h5>
                        </div>
                    </div>
                    <hr>

                    <div class="d-flex flex-column align-items-end text-end">
                        <div class="d-flex gap-3 mb-2 align-items-center  flex-row">
                            <p class="mb-0 fs-5">Subtotal</p>
                            <h5 class="m-0" style="width: 160px;">$93.56</h5>
                        </div>
                        <div class="d-flex gap-3 mb-2 align-items-center flex-row">
                            <p class=" mb-0 fs-5">Subtotal</p>
                            <h5 class="m-0 text-danger" style="width: 160px;">-$10</h5>
                        </div>
                        <div class="d-flex gap-3 mb-2 align-items-center flex-row">
                            <p class=" mb-0 fs-5">Discount</p>
                            <h5 class="m-0 text-danger" style="width: 160px;">-$10</h5>
                        </div>
                        <div class="d-flex gap-3 mb-2 align-items-center flex-row">
                            <p class=" mb-0 fs-5">Taxes</p>
                            <h5 class="m-0" style="width: 160px;">$10</h5>
                        </div>
                        <div class="d-flex gap-3 mb-2 align-items-center flex-row">
                            <p class="text-dark mb-0 fs-4">Total</p>
                            <h4 class="m-0" style="width: 160px;">$83.56</h4>
                        </div>
                    </div>

                </div><!-- end card-body -->
            </div><!-- end card -->

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">History</h4>

                        <div class="row justify-content-between">
                            <div class="col-lg-6">
                                <ul class="list-unstyled d-flex flex-column ">
                                    <li class="d-flex gap-2 border-start ps-3 position-relative">
                                        <div class="dot"></div>
                                        <div>
                                            <h5 class="mt-0">Delivery successful</h5>
                                            <p>03 Sep 2023 3:33 PM</p>
                                        </div>
                                    </li>
                                    <li class="d-flex gap-2 border-start ps-3 position-relative">
                                        <div class="dot"></div>
                                        <div>
                                            <h5 class="mt-0">Transporting to </h5>
                                            <p>03 Sep 2023 3:34 PM</p>
                                        </div>
                                    </li>
                                    <li class="d-flex gap-2 border-start ps-3 position-relative">
                                        <div class="dot"></div>
                                        <div>
                                            <h5 class="mt-0">The shipping unit has picked up the
                                                goods</h5>
                                            <p>04 Sep 2023 3:35 PM</p>
                                        </div>
                                    </li>
                                    <li class="d-flex gap-2 ps-3 position-relative">
                                        <div class="dot"></div>
                                        <div>
                                            <h5 class="mt-0">Order has been created</h5>
                                            <p>03 Sep 2023 3:36 PM</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-6">
                                <div class="border border-secondary-subtle p-3">
                                    <ul class="list-unstyled d-flex flex-column mb-0">
                                        <li>
                                            <h5 class="mt-0">Order time</h5>
                                            <p>03 Sep 2023 3:33 PM</p>

                                        </li>
                                        <li>
                                            <h5 class="mt-0">Payment time</h5>
                                            <p>03 Sep 2023 3:34 PM</p>
                                        </li>
                                        <li>
                                            <div>
                                                <h5 class="mt-0">Delivery time for the carrier</h5>
                                                <p>04 Sep 2023 3:35 PM</p>
                                            </div>
                                        </li>
                                        <li>

                                            <div>
                                                <h5 class="mt-0">Completion time</h5>
                                                <p class="mb-0">03 Sep 2023 3:36 PM</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>

        </div><!-- end col -->

        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-body p-0">

                    <div class="p-3 border-bottom">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="mt-0">Customer Info</h4>
                            <button type="button" class="badge border-0 bg-secondary"><i
                                    class="mdi mdi-lead-pencil fs-5"></i></button>
                        </div>

                        <div class="d-flex  justify-content-start gap-3">
                            <img src="{{ asset('storage/assets/images/users/avatar-3.jpg') }}" alt=""
                                 class="avatar-md rounded">
                            <div>
                                <h5 class="mb-1">John Bushmill</h5>
                                <p class="mb-1">john_Bushmill@gmail.com</p>
                                <p class="fw-semibold">IP Address: <span
                                        class="fw-normal">234.654.543</span></p>

                                <button type="button" class="btn btn-outline-danger fw-semibold">
                                    <i class="mdi mdi-plus me-1"></i>Add to Blacklist
                                </button>
                            </div>

                        </div>
                    </div>


                    <div class="p-3 border-bottom">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="mt-0">Delivery</h4>
                            <button type="button" class="badge border-0 bg-secondary"><i
                                    class="mdi mdi-lead-pencil fs-5"></i></button>
                        </div>
                        <p class="mb-2 fs-5"><span class="fw-semibold me-2">Ship by :</span>DHL</p>
                        <p class="mb-2 fs-5"><span class="fw-semibold  me-2">Speedy :</span>Standard</p>
                        <p class="mb-2 fs-5"><span class="fw-semibold  me-2">Tracking No :</span>SPX043435452
                        </p>

                    </div>


                    <div class="p-3 border-bottom">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4>Shipping</h4>
                            <button type="button" class="badge border-0 bg-secondary"><i
                                    class="mdi mdi-lead-pencil fs-5"></i></button>
                        </div>
                        <p class="mb-2 fs-5"><span class="fw-semibold fs-5 me-2">Address :</span>19034
                            Verna Unions Apt. 164 - Honolulu, RI / 87535</p>
                        <p class="mb-2 fs-5"><span class="fw-semibold me-2">Phone number :</span>646-543-5653
                        </p>


                    </div>

                    <div class="p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4>Payment</h4>
                            <button type="button" class="badge border-0 bg-secondary"><i
                                    class="mdi mdi-lead-pencil fs-5"></i></button>
                        </div>

                        <p class="mb-2 fs-5"><span class="fw-semibold  me-2">Payment Type:</span> Credit
                            Card</p>
                        <p class="mb-2 fs-5"><span class="fw-semibold  me-2">Valid Date:</span> 03/2021
                        </p>
                        <p class="mb-0 fs-5"><span class="fw-semibold  me-2">CVV:</span> YYY</p>
                    </div>


                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col -->

    </div>
    <!-- end row -->
@endsection
