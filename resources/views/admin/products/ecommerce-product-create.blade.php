@extends('layouts.admin')

@section('title', 'Product Create')

@section('additional-css')
    <!-- Plugins css -->
    <link href="{{ asset('storage/assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('storage/assets/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Plugins css -->
    <link href="{{ asset('storage/assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('storage/assets/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('subtitle', 'Apps')

@section('dashboard-content')
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-1">Details</h4>
                    <p class="mb-0 text-muted">Title, short description, image...</p>
                </div>
                <div class="card-body">

                    <form action="">
                        <div class="mb-3">
                            <label class="form-label" for="product-name">Product Name</label>
                            <input type="email" class="form-control" id="product-name"
                                   placeholder="Product Name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="sub-des">Sub Description</label>
                            <input type="password" class="form-control" id="sub-des"
                                   placeholder="Description">
                        </div>

                        <div class="mb-3">
                            <h4 class="mt-0">Content</h4>
                            <div class="mb-2">
                                <div id="snow-editor" style="height: 300px;">
                                    <h3>Write Somthing Hear</h3>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h4 class="mt-0">Images</h4>

                            <input type="file" data-plugins="dropify" data-height="300"/>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-1">Properties</h4>
                    <p class="mb-0 text-muted">Additional functions and attributes...</p>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label" for="product-code">Product Code</label>
                                    <input type="text" class="form-control" id="product-code">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="simpleinput">Quantity</label>
                                    <input type="number" id="simpleinput" class="form-control"
                                           placeholder="0" value="0">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="color-select">Color</label>
                                    <select class="form-select" id="color-select">
                                        <option selected value="Red">Red</option>
                                        <option value="Blue">Blue</option>
                                        <option value="Cyan">Cyan</option>
                                        <option value="Green">Green</option>
                                        <option value="Yellow">Yellow</option>
                                        <option value="Black">Black</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label" for="product-sku">Product SKU</label>
                                    <input type="text" class="form-control" id="product-sku">
                                </div>
                                <div class="mb-3">
                                    <label for="inputState" class="form-label">Category</label>
                                    <select id="inputState" class="form-select">
                                        <option>Shirt</option>
                                        <optgroup label="Clothing">
                                            <option value="Shirts">Shirts</option>
                                            <option value="T-shirts">T-shirts</option>
                                            <option value="Jeans">Jeans</option>
                                            <option value="Leather">Leather</option>
                                            <option value="Accessories">Accessories</option>
                                        </optgroup>
                                        <optgroup label="Tailored">
                                            <option value="Suits">Suits</option>
                                            <option value="Blazers">Blazers</option>
                                            <option value="Trousers">Trousers</option>
                                            <option value="Waistcoats">Waistcoats</option>
                                            <option value="Apparel">Apparel</option>
                                        </optgroup>
                                        <optgroup label="Accessories">
                                            <option value="Shoes">Shoes</option>
                                            <option value="Backpacks and bags">Backpacks and bags
                                            </option>
                                            <option value="Bracelets">Bracelets</option>
                                            <option value="Face masks">Face masks</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="color-select">Sizes</label>
                                    <select class="form-select" id="example-select">
                                        <option selected value="7">7</option>
                                        <option value="8 ">8</option>
                                        <option value="8.56">8.56</option>
                                        <option value="9">9</option>
                                        <option value="9.5">9.5</option>
                                        <option value="10">10</option>
                                        <option value="10.5">10.5</option>
                                        <option value="11">11</option>
                                        <option value="11.5">11.5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="tags-select">Tags</label>
                                    <select class="form-select" id="tags-select">
                                        <option selected value="Technology">Technology</option>
                                        <option value="Marketing">Marketing</option>
                                        <option value="Design">Design</option>
                                        <option value="Photography">Photography</option>
                                        <option value="art">art</option>
                                        <option value="Fashion">Fashion</option>

                                    </select>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">Gender *:</label>
                                    <div class="d-flex gap-2">

                                        <div class="form-check mb-1">
                                            <input type="radio" name="gender" id="male" value="Male"
                                                   required="" class="form-check-input">
                                            <label for="male">Male</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="gender" id="female" value="Female"
                                                   class="form-check-input">
                                            <label for="female">Female</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="gender" id="kids" value="Female"
                                                   class="form-check-input">
                                            <label for="kids">Kids</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-1">Pricing</h4>
                        <p class="mb-0 text-muted">Price related inputs</p>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="mb-3">
                                <label for="regular-price" class="form-label">Regular Price</label>
                                <input type="text" id="regular-price" class="form-control" required=""
                                       placeholder="$ 0.00">
                            </div>
                            <div class="mb-3">
                                <label for="sales-price" class="form-label">Sales Price</label>
                                <input type="text" id="sales-price" class="form-control" required=""
                                       placeholder="$ 0.00">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-dark">Create Product</button>
            </div>
        </div>

    </div>
    <!-- end row -->
@endsection

@section('additional-scripts')
    <!-- Plugins js -->
    <script src="{{ asset('storage/assets/libs/quill/quill.min.js') }}"></script>
    <script src="{{ asset('storage/assets/libs/dropzone/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('storage/assets/libs/dropify/js/dropify.min.js') }}"></script>
    <!-- Init js-->
    <script src="{{ asset('storage/assets/js/pages/product-create.init.js') }}" type="module"></script>
@endsection
