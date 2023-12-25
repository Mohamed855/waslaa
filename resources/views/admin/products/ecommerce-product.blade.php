@extends('layouts.admin')

@section('title', 'Product')

@section('subtitle', 'Ecommerce')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-5">
                            <a href="javascript:void(0);" class="btn btn-danger"><i
                                    class="mdi mdi-plus-circle me-2"></i> Add Products</a>
                        </div>
                        <div class="col-sm-7">
                            <div class="text-sm-end">
                                <button type="button" class="btn btn-success me-1"><i
                                        class="mdi mdi-cog-outline"></i></button>
                                <button type="button" class="btn btn-light me-1">Import</button>
                                <button type="button" class="btn btn-light">Export</button>
                            </div>
                        </div><!-- end col-->
                    </div>
                </div><!-- end card-body-->

                <div class="table-responsive">
                    <table class="table table-centered w-100 nowrap mb-0">
                        <thead class="table-light">
                        <tr>
                            <th class="all" style="width: 20px;">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                </div>
                            </th>
                            <th class="all">Product</th>
                            <th>Brand</th>
                            <th>Added Date</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th style="width: 120px;">Action</th>
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
                            <td>
                                <img src="{{ asset('storage/assets/images/products/product-1.jpg') }}" alt="contact-img"
                                     title="contact-img" class="rounded me-3" height="48"/>
                                <p class="m-0 d-inline-block align-middle font-16">
                                    <a href="products-details.html" class="text-body">Blue Ndr Tennis
                                        Shoe</a>
                                    <br/>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                </p>
                            </td>
                            <td>
                                Wilson
                            </td>
                            <td>
                                09/12/2018
                            </td>
                            <td>
                                $148.66
                            </td>

                            <td>
                                254
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success p-1">Published</span>
                            </td>

                            <td class="table-action">
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-square-edit-outline"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck3">
                                    <label class="form-check-label" for="customCheck3">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <img src="{{ asset('storage/assets/images/products/product-6.jpg') }}" alt="contact-img"
                                     title="contact-img" class="rounded me-3" height="48"/>
                                <p class="m-0 d-inline-block align-middle font-16">
                                    <a href="products-details.html" class="text-body">Black Winter
                                        Shoes</a>
                                    <br/>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star-half"></span>
                                </p>
                            </td>
                            <td>
                                Nike
                            </td>
                            <td>
                                09/08/2018
                            </td>
                            <td>
                                $8.99
                            </td>

                            <td>
                                1,874
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success p-1">Published</span>
                            </td>
                            <td class="table-action">
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-square-edit-outline"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck4">
                                    <label class="form-check-label" for="customCheck4">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <img src="{{ asset('storage/assets/images/products/product-3.jpg') }}" alt="contact-img"
                                     title="contact-img" class="rounded me-3" height="48"/>
                                <p class="m-0 d-inline-block align-middle font-16">
                                    <a href="products-details.html" class="text-body">Branded
                                        Footwear</a>
                                    <br/>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star-outline"></span>
                                </p>
                            </td>
                            <td>
                                YONEX
                            </td>
                            <td>
                                09/05/2018
                            </td>
                            <td>
                                $68.32
                            </td>

                            <td>
                                2,541
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success p-1">Published</span>
                            </td>

                            <td class="table-action">
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-square-edit-outline"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck5">
                                    <label class="form-check-label" for="customCheck5">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <img src="{{ asset('storage/assets/images/products/product-4.jpg') }}" alt="contact-img"
                                     title="contact-img" class="rounded me-3" height="48"/>
                                <p class="m-0 d-inline-block align-middle font-16">
                                    <a href="products-details.html" class="text-body">Designer Soft
                                        Sandal</a>
                                    <br/>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star-half"></span>
                                    <span class="text-warning mdi mdi-star-outline"></span>
                                </p>
                            </td>
                            <td>
                                Wilson
                            </td>
                            <td>
                                08/23/2018
                            </td>
                            <td>
                                $112.00
                            </td>

                            <td>
                                3,540
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success p-1">Published</span>
                            </td>

                            <td class="table-action">
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-square-edit-outline"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck6">
                                    <label class="form-check-label" for="customCheck6">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <img src="{{ asset('storage/assets/images/products/product-2.jpg') }}" alt="contact-img"
                                     title="contact-img" class="rounded me-3" height="48"/>
                                <p class="m-0 d-inline-block align-middle font-16">
                                    <a href="products-details.html" class="text-body">Pink Sport
                                        shoes</a>
                                    <br/>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                </p>
                            </td>
                            <td>
                                YONEX
                            </td>
                            <td>
                                08/02/2018
                            </td>
                            <td>
                                $59.69
                            </td>

                            <td>
                                26
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success p-1">Published</span>
                            </td>

                            <td class="table-action">
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-square-edit-outline"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck7">
                                    <label class="form-check-label" for="customCheck7">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <img src="{{ asset('storage/assets/images/products/product-5.jpg') }}" alt="contact-img"
                                     title="contact-img" class="rounded me-3" height="48"/>
                                <p class="m-0 d-inline-block align-middle font-16">
                                    <a href="products-details.html" class="text-body">Campus Maxico
                                        Running Shoes</a>
                                    <br/>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star-half"></span>
                                </p>
                            </td>
                            <td>
                                Nike
                            </td>
                            <td>
                                17/12/2018
                            </td>
                            <td>
                                $148.66
                            </td>

                            <td>
                                485
                            </td>
                            <td>
                                <span class="badge bg-danger-subtle text-danger p-1">Draft</span>
                            </td>

                            <td class="table-action">
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-square-edit-outline"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck8">
                                    <label class="form-check-label" for="customCheck8">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <img src="{{ asset('storage/assets/images/products/product-4.jpg') }}" alt="contact-img"
                                     title="contact-img" class="rounded me-3" height="48"/>
                                <p class="m-0 d-inline-block align-middle font-16">
                                    <a href="products-details.html" class="text-body">Leather Footwear
                                    </a>
                                    <br/>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                </p>
                            </td>
                            <td>
                                Adidas
                            </td>
                            <td>
                                07/07/2018
                            </td>
                            <td>
                                $65.94
                            </td>

                            <td>
                                652
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success p-1">Published</span>
                            </td>

                            <td class="table-action">
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-square-edit-outline"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck9">
                                    <label class="form-check-label" for="customCheck9">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <img src="{{ asset('storage/assets/images/products/product-8.jpg') }}" alt="contact-img"
                                     title="contact-img" class="rounded me-3" height="48"/>
                                <p class="m-0 d-inline-block align-middle font-16">
                                    <a href="products-details.html" class="text-body">Campus Running
                                        Shoes</a>
                                    <br/>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                </p>
                            </td>
                            <td>
                                Wilson
                            </td>
                            <td>
                                06/30/2018
                            </td>
                            <td>
                                $99
                            </td>

                            <td>
                                1,021
                            </td>
                            <td>
                                <span class="badge bg-danger-subtle text-danger p-1">Draft</span>
                            </td>
                            <td class="table-action">
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-square-edit-outline"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck10">
                                    <label class="form-check-label" for="customCheck10">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <img src="{{ asset('storage/assets/images/products/product-9.jpg') }}" alt="contact-img"
                                     title="contact-img" class="rounded me-3" height="48"/>
                                <p class="m-0 d-inline-block align-middle font-16">
                                    <a href="products-details.html" class="text-body">Lacing
                                        footwear</a>
                                    <br/>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star-half"></span>
                                </p>
                            </td>
                            <td>
                                Adidas
                            </td>
                            <td>
                                06/19/2018
                            </td>
                            <td>
                                $58
                            </td>

                            <td>
                                874
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success p-1">Published</span>
                            </td>

                            <td class="table-action">
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-square-edit-outline"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck11">
                                    <label class="form-check-label" for="customCheck11">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <img src="{{ asset('storage/assets/images/products/product-10.jpg') }}"
                                     alt="contact-img"
                                     title="contact-img" class="rounded me-3" height="48"/>
                                <p class="m-0 d-inline-block align-middle font-16">
                                    <a href="products-details.html" class="text-body">Sport Matte Flip
                                        Flop</a>
                                    <br/>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star-half"></span>
                                </p>
                            </td>
                            <td>
                                Nike
                            </td>
                            <td>
                                05/06/2018
                            </td>
                            <td>
                                $39.5
                            </td>

                            <td>
                                1,254
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success p-1">Published</span>
                            </td>

                            <td class="table-action">
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-square-edit-outline"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck12">
                                    <label class="form-check-label" for="customCheck12">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <img src="{{ asset('storage/assets/images/products/product-11.jpg') }}"
                                     alt="contact-img"
                                     title="contact-img" class="rounded me-3" height="48"/>
                                <p class="m-0 d-inline-block align-middle font-16">
                                    <a href="products-details.html" class="text-body">Nike Air Zoom </a>
                                    <br/>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star-half"></span>
                                </p>
                            </td>
                            <td>
                                YONEX
                            </td>
                            <td>
                                04/09/2018
                            </td>
                            <td>
                                $78.66
                            </td>

                            <td>
                                524
                            </td>
                            <td>
                                <span class="badge bg-danger-subtle text-danger p-1">Draft</span>
                            </td>

                            <td class="table-action">
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-square-edit-outline"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck13">
                                    <label class="form-check-label" for="customCheck13">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <img src="{{ asset('storage/assets/images/products/product-1.jpg') }}" alt="contact-img"
                                     title="contact-img" class="rounded me-3" height="48"/>
                                <p class="m-0 d-inline-block align-middle font-16">
                                    <a href="products-details.html" class="text-body">Boston Soft
                                        Footbed</a>
                                    <br/>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star-half"></span>
                                </p>
                            </td>
                            <td>
                                Adidas
                            </td>
                            <td>
                                03/24/2018
                            </td>
                            <td>
                                $49
                            </td>

                            <td>
                                204
                            </td>
                            <td>
                                <span class="badge bg-danger-subtle text-danger p-1">Draft</span>
                            </td>

                            <td class="table-action">
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-eye"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-square-edit-outline"></i></a>
                                <a href="javascript:void(0);" class="action-icon"> <i
                                        class="mdi mdi-delete"></i></a>
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

