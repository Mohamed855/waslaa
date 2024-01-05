@extends('layouts.admin')

@section('title', 'Product Details')

@section('subtitle', 'Ecommerce')

@section('dashboard-content')
    <div class="card">
        <div class="card-body">
            <div class="row g-0">
                <div class="col-lg-4">
                    <!-- Product image -->
                    <div id="carouselExampleControls" class="carousel slide mb-4"
                         data-bs-ride="carousel">
                        <div class="carousel-inner mx-auto" role="listbox">
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/assets/images/products/product-5.jpg') }}"
                                     class="w-100 rounded"
                                     alt="Product-img"/>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('storage/assets/images/products/product-2.jpg') }}"
                                     class="w-100 rounded"
                                     alt="Product-img"/>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('storage/assets/images/products/product-3.jpg') }}"
                                     class="w-100 rounded"
                                     alt="Product-img"/>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('storage/assets/images/products/product-6.jpg') }}"
                                     class="w-100 rounded"
                                     alt="Product-img"/>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('storage/assets/images/products/product-11.jpg') }}"
                                     class="w-100 rounded"
                                     alt="Product-img"/>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                           data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                           data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                        <div class="carousel-indicators d-lg-flex d-none" style="bottom: -100px;">
                            <button type="button" class="active"
                                    data-bs-target="#carouselExampleControls" data-bs-slide-to="0"
                                    aria-current="true" aria-label="Slide 1"
                                    style="width: 80px; height: auto;">
                                <img src="{{ asset('storage/assets/images/products/product-5.jpg') }}"
                                     class="d-block rounded img-fluid" alt="swiper-indicator-img">
                            </button>
                            <button type="button" data-bs-target="#carouselExampleControls"
                                    data-bs-slide-to="1" aria-label="Slide 2"
                                    style="width: 80px; height: auto;">
                                <img src="{{ asset('storage/assets/images/products/product-2.jpg') }}"
                                     class="d-block rounded img-fluid" alt="swiper-indicator-img">
                            </button>
                            <button type="button" data-bs-target="#carouselExampleControls"
                                    data-bs-slide-to="2" aria-label="Slide 3"
                                    style="width: 80px; height: auto;">
                                <img src="{{ asset('storage/assets/images/products/product-3.jpg') }}"
                                     class="d-block rounded img-fluid" alt="swiper-indicator-img">
                            </button>
                            <button type="button" data-bs-target="#carouselExampleControls"
                                    data-bs-slide-to="3" aria-label="Slide 3"
                                    style="width: 80px; height: auto;">
                                <img src="{{ asset('storage/assets/images/products/product-6.jpg') }}"
                                     class="d-block rounded img-fluid" alt="swiper-indicator-img">
                            </button>
                            <button type="button" data-bs-target="#carouselExampleControls"
                                    data-bs-slide-to="4" aria-label="Slide 3"
                                    style="width: 80px; height: auto;">
                                <img src="{{ asset('storage/assets/images/products/product-11.jpg') }}"
                                     class="d-block rounded img-fluid" alt="swiper-indicator-img">
                            </button>
                        </div>
                    </div>
                </div> <!-- end col -->
                <div class="col-lg-8">
                    <form class="ps-lg-4">
                        <!-- Product title -->

                        <!-- Product stock -->
                        <div class="mb-3">
                            <h4><span class="badge bg-success-subtle text-success">Instock</span></h4>
                        </div>

                        <h3 class="mt-0">Campus Maxico Running Shoes<a
                                href="ecommerce-product-edit.blade.php" class="text-muted"><i
                                    class="mdi mdi-square-edit-outline ms-2"></i></a>
                        </h3>
                        <p class="mb-1">Added Date: 17/12/2018</p>
                        <p class="font-16">
                            <span class="text-warning mdi mdi-star"></span>
                            <span class="text-warning mdi mdi-star"></span>
                            <span class="text-warning mdi mdi-star"></span>
                            <span class="text-warning mdi mdi-star"></span>
                            <span class="text-warning mdi mdi-star"></span>
                        </p>

                        <!-- Product description -->
                        <div class="mt-4">
                            <h3> $139.58</h3>
                            <p class="text-muted fs-5 fw-semibold">Featuring the original ripple design
                                inspired by Japanese bullet trains, the Campus Maxico Running Shoes lets
                                you push your style full-speed ahead</p>
                        </div>


                        <hr>
                        <!-- Quantity -->
                        <div class="mt-4">

                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5>Size</h5>
                                <select class="form-select" id="example-select" style="width: 90px;">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5>Quantity</h5>
                                <input type="number" min="1" value="1" class="form-control"
                                       placeholder="Qty" style="width: 90px;">
                            </div>

                        </div>

                        <hr>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-outline-danger"><i
                                    class="mdi mdi-cart me-1"></i> Add to cart
                            </button>
                            <button type="button" class="btn btn-outline-success"> Buy Now</button>
                        </div>

                        <!-- Product description -->
                        <div class="mt-4">
                            <h5>Description:</h5>
                            <p class="text-muted fs-5 fw-semibold">Shoes' Outsole- Experience the
                                confidence of the anti-slip outsole design, providing unmatched grip and
                                stability. Whether you're sprinting or strolling, these shoes for men
                                keep you steady on your feet.</p>
                        </div>

                        <!-- Product information -->
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Available Stock:</h5>
                                    <p class="text-sm lh-150">1784</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Number of Orders:</h5>
                                    <p class="text-sm lh-150">5,458</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Revenue:</h5>
                                    <p class="text-sm lh-150">$8,57,014</p>
                                </div>
                            </div>
                        </div>

                    </form>
                </div> <!-- end col -->
            </div> <!-- end row-->

            <div class="row justify-content-center align-items-center g-2 mt-4">
                <div class="col-xl-3 col-md-4">
                    <div class="text-center">
                        <i class="fa-solid fa-circle-check"></i>
                        <h5 class="mb-1">100% Original</h5>
                        <p class="text-muted fs-5 fw-semibold">Chocolate bar candy canes ice <br>
                            toffee cookie halvah.</p>
                    </div>
                </div><!-- end col -->

                <div class="col-xl-3 col-md-4">
                    <div class="text-center">
                        <i class="fa-solid fa-circle-check"></i>
                        <h5 class="mb-1">10 Day Replacement</h5>
                        <p class="text-muted fs-5 fw-semibold">Chocolate bar candy canes ice cream
                            <br> toffee cookie halvah.
                        </p>
                    </div>
                </div><!-- end col -->
                <div class="col-xl-3 col-md-4">
                    <div class="text-center">
                        <i class="fa-solid fa-circle-check"></i>
                        <h5 class="mb-1">Year Warranty</h5>
                        <p class="text-muted fs-5 fw-semibold">Chocolate bar candy canes ice cream
                            <br> toffee cookie halvah.
                        </p>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->

        </div> <!-- end card-body-->
    </div>
    <!-- end card-->
@endsection
