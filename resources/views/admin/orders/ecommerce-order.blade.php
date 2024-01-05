@extends('layouts.admin')

@section('title', 'Order')

@section('subtitle', 'Ecommerce')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8">
                            <form
                                class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                <div class="col-auto">
                                    <label for="inputPassword2" class="visually-hidden">Search</label>
                                    <input type="search" class="form-control" id="inputPassword2"
                                           placeholder="Search...">
                                </div>
                                <div class="col-auto">
                                    <div class="d-flex align-items-center">
                                        <label for="status-select" class="me-2">Status</label>
                                        <select class="form-select" id="status-select">
                                            <option selected>Choose...</option>
                                            <option value="1">Paid</option>
                                            <option value="2">Awaiting Authorization</option>
                                            <option value="3">Payment failed</option>
                                            <option value="4">Cash On Delivery</option>
                                            <option value="5">Fulfilled</option>
                                            <option value="6">Unfulfilled</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-4">
                            <div class="d-flex justify-content-end align-items-center mt-xl-0 mt-2">
                                <button type="button" class="btn btn-danger me-2"><i class="fa-solid fa-basket-shopping me-1"></i> Add New Order
                                </button>
                                <div>
                                    <button type="button" class="btn btn-white border"><i class="fa-light fa-filter me-1"></i>Filter
                                    </button>
                                </div>
                            </div>
                        </div><!-- end col-->
                    </div>
                </div> <!-- end card-body-->

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="table-light">
                        <tr>
                            <th style="width: 20px;">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                </div>
                            </th>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Payment Method</th>
                            <th>Order Status</th>
                            <th style="width: 125px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                </div>
                            </td>
                            <td><a href="ecommerce-orders-details.blade.php"
                                   class="text-body fw-bold">#CD2302</a></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ asset('storage/assets/images/users/avatar-1.jpg') }}" alt=""
                                         class="avatar-sm rounded-circle">
                                    <div>
                                        <h5 class="mb-0">John Bushmill</h5>
                                        <a href=""
                                           class="text-muted fs-6 mb-0">john_Bushmill@gmail.com</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                August 05 2018
                                <h6 class="text-muted mb-0">2:20pm</h6>
                            </td>

                            <td>
                                $176.41
                            </td>
                            <td>
                                Mastercard
                            </td>
                            <td>
                                <span
                                    class="badge bg-info-subtle text-info fs-6 fw-semibold">Shiped</span>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-trash me-1 text-muted"></i></a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck3">
                                    <label class="form-check-label" for="customCheck3">&nbsp;</label>
                                </div>
                            </td>
                            <td><a href="ecommerce-orders-details.blade.php"
                                   class="text-body fw-bold">#CD2305</a></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ asset('storage/assets/images/users/avatar-2.jpg') }}" alt=""
                                         class="avatar-sm rounded-circle">
                                    <div>
                                        <h5 class="mb-0">Ilham Budi</h5>
                                        <a href="" class="text-muted fs-6 mb-0">ilhambudi@gmail.com</a>
                                    </div>
                                </div>
                            </td>
                            <td>August 04 2018
                                <h6 class="text-muted mb-0">3:10pm</h6>
                            </td>

                            <td>
                                $1,458.65
                            </td>
                            <td>
                                Visa
                            </td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary fs-6 fw-semibold">Processing</span>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-trash me-1 text-muted"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck4">
                                    <label class="form-check-label" for="customCheck4">&nbsp;</label>
                                </div>
                            </td>
                            <td><a href="ecommerce-orders-details.blade.php"
                                   class="text-body fw-bold">#CD2310</a></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ asset('storage/assets/images/users/avatar-3.jpg') }}" alt=""
                                         class="avatar-sm rounded-circle">
                                    <div>
                                        <h5 class="mb-0">Mohammad Karim</h5>
                                        <a href=""
                                           class="text-muted fs-6 mb-0">mohammad_karim@gmail.com</a>
                                    </div>
                                </div>
                            </td>
                            <td>August 04 2018
                                <h6 class="text-muted mb-0">3:40pm</h6>
                            </td>

                            <td>
                                $801.99
                            </td>
                            <td>
                                Credit Card
                            </td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary fs-6 fw-semibold">Processing</span>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-trash me-1 text-muted"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck5">
                                    <label class="form-check-label" for="customCheck5">&nbsp;</label>
                                </div>
                            </td>
                            <td><a href="ecommerce-orders-details.blade.php"
                                   class="text-body fw-bold">#CD2322</a></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ asset('storage/assets/images/users/avatar-4.jpg') }}" alt=""
                                         class="avatar-sm rounded-circle">
                                    <div>
                                        <h5 class="mb-0">Linda Blair</h5>
                                        <a href="" class="text-muted fs-6 mb-0">lindablair@gmail.com</a>
                                    </div>
                                </div>
                            </td>
                            <td>August 03 2018 <h6 class="text-muted mb-0">4:10pm</h6>
                            </td>

                            <td>
                                $215.35
                            </td>
                            <td>
                                Transfer
                            </td>
                            <td>
                                <span
                                    class="badge bg-info-subtle text-info fs-6 fw-semibold">Shiped</span>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-trash me-1 text-muted"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck6">
                                    <label class="form-check-label" for="customCheck6">&nbsp;</label>
                                </div>
                            </td>
                            <td><a href="ecommerce-orders-details.blade.php"
                                   class="text-body fw-bold">#CD2311</a></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ asset('storage/assets/images/users/avatar-5.jpg') }}" alt=""
                                         class="avatar-sm rounded-circle">
                                    <div>
                                        <h5 class="mb-0">Josh Adam</h5>
                                        <a href="" class="text-muted fs-6 mb-0">joshadam@gmail.com</a>
                                    </div>
                                </div>
                            </td>
                            <td>May 22 2018 <h6 class="text-muted mb-0">4:30pm</h6>
                            </td>

                            <td>
                                $2,514.36
                            </td>
                            <td>
                                Paypal
                            </td>
                            <td>
                                <span
                                    class="badge bg-info-subtle text-info fs-6 fw-semibold">Shiped</span>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-trash me-1 text-muted"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck7">
                                    <label class="form-check-label" for="customCheck7">&nbsp;</label>
                                </div>
                            </td>
                            <td><a href="ecommerce-orders-details.blade.php"
                                   class="text-body fw-bold">#CD2313</a></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ asset('storage/assets/images/users/avatar-6.jpg') }}" alt=""
                                         class="avatar-sm rounded-circle">
                                    <div>
                                        <h5 class="mb-0">Sin Tae</h5>
                                        <a href="" class="text-muted fs-6 mb-0">sintae@gmail.com</a>
                                    </div>
                                </div>
                            </td>
                            <td>April 02 2018 <h6 class="text-muted mb-0">4:45pm</h6>
                            </td>

                            <td>
                                $183.20
                            </td>
                            <td>
                                Payoneer
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success fs-6 fw-semibold">Delivered</span>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-trash me-1 text-muted"></i></a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck8">
                                    <label class="form-check-label" for="customCheck8">&nbsp;</label>
                                </div>
                            </td>
                            <td><a href="ecommerce-orders-details.blade.php"
                                   class="text-body fw-bold">#CD2323</a></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ asset('storage/assets/images/users/avatar-7.jpg') }}" alt=""
                                         class="avatar-sm rounded-circle">
                                    <div>
                                        <h5 class="mb-0">Rajesh Masvidal</h5>
                                        <a href=""
                                           class="text-muted fs-6 mb-0">rajeshmasvidal@gmail.com</a>
                                    </div>
                                </div>
                            </td>
                            <td>March 18 2018 <h6 class="text-muted mb-0">4:50pm</h6>
                            </td>

                            <td>
                                $1,768.41
                            </td>
                            <td>
                                Visa
                            </td>
                            <td>
                                <span class="badge bg-danger-subtle text-danger fs-6 fw-semibold">Cancelled</span>
                            </td>

                            <td>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-trash me-1 text-muted"></i></a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck9">
                                    <label class="form-check-label" for="customCheck9">&nbsp;</label>
                                </div>
                            </td>
                            <td><a href="ecommerce-orders-details.blade.php"
                                   class="text-body fw-bold">#CD2365</a></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ asset('storage/assets/images/users/avatar-8.jpg') }}" alt=""
                                         class="avatar-sm rounded-circle">
                                    <div>
                                        <h5 class="mb-0">Fajar Surya</h5>
                                        <a href="" class="text-muted fs-6 mb-0">fsurya@gmail.com</a>
                                    </div>
                                </div>
                            </td>
                            <td>February 01 2018 <h6 class="text-muted mb-0">5:25pm</h6>
                            </td>

                            <td>
                                $3,582.99
                            </td>
                            <td>
                                Paypal
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success fs-6 fw-semibold">Delivered</span>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-trash me-1 text-muted"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck10">
                                    <label class="form-check-label" for="customCheck10">&nbsp;</label>
                                </div>
                            </td>
                            <td><a href="ecommerce-orders-details.blade.php"
                                   class="text-body fw-bold">#CD2345</a></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ asset('storage/assets/images/users/avatar-9.jpg') }}" alt=""
                                         class="avatar-sm rounded-circle">
                                    <div>
                                        <h5 class="mb-0">Francy Grag</h5>
                                        <a href="" class="text-muted fs-6 mb-0">frany@gmail.com</a>
                                    </div>
                                </div>
                            </td>
                            <td>January 22 2018 <h6 class="text-muted mb-0">5:45pm</h6>
                            </td>

                            <td>
                                $923.95
                            </td>
                            <td>
                                Credit Card
                            </td>
                            <td>
                                <span class="badge bg-danger-subtle text-danger fs-6 fw-semibold">Cancelled</span>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i class="fa-solid fa-trash me-1 text-muted"></i></a>
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
