@extends('layouts.admin')

@section('title', 'ChartJs')

@section('subtitle', 'Charts')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Line Chart</h4>
                </div>
                <div class="card-body">
                    <canvas id="line-chart-example" height="350" data-colors="#1abc9c,#f1556c"></canvas>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Bar Chart</h4>
                </div>
                <div class="card-body">
                    <div class="mt-4 chartjs-chart">
                        <canvas id="bar-chart-example" height="350" data-colors="#4a81d4,#e3eaef"></canvas>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pie Chart</h4>
                </div>
                <div class="card-body">
                    <div class="mt-4 chartjs-chart">
                        <canvas id="pie-chart-example" height="350" class="mt-4"
                                data-colors="#6658dd,#fa5c7c,#4fc6e1,#ebeff2"></canvas>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Donut Chart</h4>
                </div>
                <div class="card-body">
                    <div class="mt-4 chartjs-chart">
                        <canvas id="donut-chart-example" height="350" data-colors="#6c757d,#1abc9c,#ebeff2"></canvas>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Polar area Chart</h4>
                </div>
                <div class="card-body">
                    <div class="mt-4 chartjs-chart">
                        <canvas id="polar-chart-example" height="350"
                                data-colors="#4a81d4,#fa5c7c,#4fc6e1,#ebeff2"></canvas>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Radar Chart</h4>
                </div>

                <div class="card-body">
                    <div class="mt-4 chartjs-chart">
                        <canvas id="radar-chart-example" height="350" data-colors="#39afd1,#a17fe0"></canvas>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('additional-scripts')
    <!-- Chart.js Area Demo js -->
    <script src="{{ asset('storage/assets/js/pages/chartjs.init.js') }}" type="module"></script>
@endsection

