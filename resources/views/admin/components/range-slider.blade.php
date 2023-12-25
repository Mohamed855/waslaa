@extends('layouts.admin')

@section('title', 'ION Range Slider')

@section('additional-css')
    <!-- ION Slider -->
    <link href="{{ asset('storage/assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('subtitle', 'Extended UI')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Default</h4>
                    <p class="sub-header mb-0">
                        Start without params
                    </p>
                </div>
                <div class="card-body">
                    <input type="text" id="range_01">
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Min-Max</h4>
                    <p class="sub-header mb-0">
                        Set min value, max value and start point
                    </p>
                </div>
                <div class="card-body">
                    <input type="text" id="range_02">
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Prefix</h4>
                    <p class="sub-header mb-0">
                        Showing grid and adding prefix "$"
                    </p>
                </div>
                <div class="card-body">
                    <input type="text" id="range_03">
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Range</h4>
                    <p class="sub-header mb-0">
                        Set up range with negative values
                    </p>
                </div>
                <div class="card-body">
                    <input type="text" id="range_04">
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Step</h4>
                    <p class="sub-header mb-0">
                        Using step 250
                    </p>
                </div>
                <div class="card-body">
                    <input type="text" id="range_05">
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Custom Values</h4>
                    <p class="sub-header mb-0">
                        Using any strings as values
                    </p>
                </div>
                <div class="card-body">
                    <input type="text" id="range_06">
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Prettify Numbers</h4>
                    <p class="sub-header mb-0">
                        Prettify enabled. Much better!
                    </p>
                    <input type="text" id="range_07">
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Disabled</h4>
                    <p class="sub-header mb-0">
                        Lock slider by using disable option
                    </p>
                </div>
                <div class="card-body">
                    <input type="text" id="range_08">
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Extra Example</h4>
                    <p class="sub-header mb-0">
                        Whant to show that max number is not the biggest one?
                    </p>
                </div>
                <div class="card-body">
                    <input type="text" id="range_09">
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Use decorate_both option</h4>
                    <p class="sub-header mb-0">
                        Use decorate_both option
                    </p>
                </div>
                <div class="card-body">
                    <input type="text" id="range_10">
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Postfixes</h4>
                    <p class="sub-header mb-0">
                        Using postfixes
                    </p>
                </div>
                <div class="card-body">

                    <input type="text" id="range_11">
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Hide</h4>
                    <p class="sub-header mb-0">
                        Or hide any part you wish
                    </p>
                </div>
                <div class="card-body">
                    <input type="text" id="range_12">
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Modern skin</h4>
                    <p class="sub-header mb-0">
                        Example of modern skin
                    </p>
                </div>
                <div class="card-body">
                    <input type="text" id="range_13">
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sharp skin</h4>
                    <p class="sub-header mb-0">
                        Example of sharp skin
                    </p>
                </div>
                <div class="card-body">
                    <input type="text" id="range_14">
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Round skin</h4>
                    <p class="sub-header mb-0">
                        Example of round skin
                    </p>
                </div>
                <div class="card-body">
                    <input type="text" id="range_15">
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Square skin</h4>
                    <p class="sub-header mb-0">
                        Example of square skin
                    </p>
                </div>
                <div class="card-body">
                    <input type="text" id="range_16">
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('additional-scripts')
    <!-- Ion Range Slider-->
    <script src="{{ asset('storage/assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!-- Range slider init js-->
    <script src="{{ asset('storage/assets/js/pages/range-sliders.init.js') }}" type="module"></script>
@endsection
