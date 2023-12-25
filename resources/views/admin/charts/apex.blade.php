@extends('layouts.admin')

@section('title', 'Apexcharts')

@section('subtitle', 'Charts')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Sparkline Charts</h4>
                </div>
                <div class="card-body">

                    <div class="row pt-3">
                        <div class="col-md-4">
                            <div id="spark1" class="apex-charts mb-sm-0 mb-4" data-colors="#00acc1"></div>
                        </div>
                        <div class="col-md-4">
                            <div id="spark2" class="apex-charts mb-sm-0 mb-4" data-colors="#DCE6EC"></div>
                        </div>
                        <div class="col-md-4">
                            <div id="spark3" class="apex-charts" data-colors="#f672a7"></div>
                        </div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Line with Data Labels</h4>
                </div>
                <div class="card-body">

                    <div id="apex-line-1" class="apex-charts pt-3" data-colors="#00acc1,#1abc9c"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-12">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Gradient Line Chart</h4>
                </div>
                <div class="card-body">

                    <div id="apex-line-2" class="apex-charts pt-3" data-colors="#f672a7"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-12">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Stacked Area</h4>
                </div>
                <div class="card-body">
                    <div id="apex-area" class="apex-charts pt-3" data-colors="#00acc1,#f7b84b,#CED4DC"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Basic Column Chart</h4>
                </div>
                <div class="card-body">

                    <div id="apex-column-1" class="apex-charts pt-3" data-colors="#00acc1,#1abc9c,#CED4DC"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-12">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Column Chart with Datalabels</h4>
                </div>
                <div class="card-body">
                    <div id="apex-column-2" class="apex-charts pt-3" data-colors="#00acc1"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Mixed Chart - Line & Area</h4>
                </div>
                <div class="card-body">
                    <div id="apex-mixed-1" class="apex-charts pt-3" data-colors="#CED4DC,#00acc1"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-12">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Basic Bar Chart</h4>
                </div>
                <div class="card-body">
                    <div id="apex-bar-1" class="apex-charts pt-3" data-colors="#1abc9c"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Bar with Negative Values</h4>
                </div>
                <div class="card-body">
                    <div id="apex-bar-2" class="apex-charts pt-3" data-colors="#00acc1,#1abc9c"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-12">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Line, Column & Area Chart</h4>
                </div>
                <div class="card-body">
                    <div id="apex-mixed-2" class="apex-charts pt-3" data-colors="#00acc1,#1abc9c,#f672a7"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Multiple Y-Axis Chart</h4>
                </div>
                <div class="card-body">
                    <div id="apex-mixed-3" class="apex-charts pt-3" data-colors="#00acc1,#ebf2f6,#f672a7"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-12">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Simple Bubble Chart</h4>
                </div>
                <div class="card-body">
                    <div id="apex-bubble-1" class="apex-charts pt-3" data-colors="#00acc1,#1abc9c,#f672a7"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">3D Bubble Chart</h4>
                </div>
                <div class="card-body">
                    <div id="apex-bubble-2" class="apex-charts pt-3"
                         data-colors="#00acc1,#1abc9c,#f672a7,#6c757d"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-12">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-header">

                    <h4 class="card-title mb-0">Scatter (XY) Chart</h4>
                </div>
                <div class="card-body">
                    <div id="apex-scatter-1" class="apex-charts pt-3" data-colors="#1abc9c,#f672a7,#6c757d"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Scatter Chart - Datetime</h4>
                </div>
                <div class="card-body">
                    <div id="apex-scatter-2" class="apex-charts pt-3"
                         data-colors="#1abc9c,#f672a7,#6c757d,#00acc1,#6559cc"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-12">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Simple Candlestick Chart</h4>
                </div>
                <div class="card-body">
                    <div id="apex-candlestick-1" class="apex-charts pt-3" data-colors="#00acc1,#1abc9c"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Combo Candlestick Chart</h4>
                </div>
                <div class="card-body">
                    <div class="pt-3">
                        <div id="apex-candlestick-2" class="apex-charts" data-colors="#00acc1,#f7b84b"></div>
                        <div id="apex-candlestick-3" class="apex-charts" data-colors="#f45454,#37cde6"></div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-4">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Simple Pie Chart</h4>
                </div>
                <div class="card-body">

                    <div id="cardCollpase18" class="collapse show" dir="ltr">
                        <div id="apex-pie-1" class="apex-charts pt-3"
                             data-colors="#00acc1,#4fc6e1,#4a81d4,#00b19d,#f1556c"></div>
                    </div> <!-- collapsed end -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-4">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Gradient Donut Chart</h4>
                </div>
                <div class="card-body">
                    <div id="cardCollpase19" class="collapse show" dir="ltr">
                        <div id="apex-pie-2" class="apex-charts pt-3"
                             data-colors="#00acc1,#4fc6e1,#4a81d4,#00b19d,#f1556c"></div>
                    </div> <!-- collapsed end -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Patterned Donut Chart</h4>
                </div>
                <div class="card-body">

                    <div id="cardCollpase20" class="collapse show" dir="ltr">
                        <div id="apex-pie-3" class="apex-charts pt-3"
                             data-colors="#00acc1,#4fc6e1,#4a81d4,#00b19d,#f1556c"></div>
                    </div> <!-- collapsed end -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-4">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Basic RadialBar Chart</h4>
                </div>
                <div class="card-body">
                    <div id="cardCollpase21" class="collapse show" dir="ltr">
                        <div id="apex-radialbar-1" class="apex-charts pt-3" data-colors="#6c757d"></div>
                    </div> <!-- collapsed end -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-4">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Multiple RadialBars</h4>
                </div>
                <div class="card-body">
                    <div id="cardCollpase22" class="collapse show" dir="ltr">
                        <div id="apex-radialbar-2" class="apex-charts pt-3"
                             data-colors="#00acc1,#e36498,#23b397,#f7b84b"></div>
                    </div> <!-- collapsed end -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Stroked Circular Guage</h4>
                </div>
                <div class="card-body">
                    <div id="cardCollpase23" class="collapse show" dir="ltr">
                        <div id="apex-radialbar-3" class="apex-charts pt-3" data-colors="#f1556c"></div>
                    </div> <!-- collapsed end -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->
@endsection

@section('additional-scripts')
    <!-- Third Party js-->
    <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
    <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
    <!-- init js -->
    <script src="{{ asset('storage/assets/js/pages/apexcharts.init.js') }}" type="module"></script>
@endsection
