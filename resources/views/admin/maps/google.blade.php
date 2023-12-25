@extends('layouts.admin')

@section('title', 'Google Maps')

@section('subtitle', 'Maps')

@section('dashboard-content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Basic</h4>
                    <div class="gmaps" id="gmaps-basic"></div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Markers</h4>
                    <div class="gmaps" id="gmaps-markers"></div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Ultra Light</h4>
                    <div class="gmaps" id="ultra-light"></div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Dark</h4>
                    <div class="gmaps" id="dark"></div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Polygons</h4>
                    <div class="gmaps" id="gmaps-polygons"></div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Overlays</h4>
                    <div class="gmaps" id="gmaps-overlay"></div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Street View Panoramas</h4>
                    <div class="gmaps-panaroma" id="panorama"></div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Routes</h4>
                    <div class="gmaps" id="gmaps-route"></div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Map Types</h4>
                    <div class="gmaps" id="gmaps-types"></div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Context menu (right click on map)</h4>
                    <div class="gmaps" id="gmaps-menu"></div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->
@endsection

@section('additional-scripts')
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDsucrEdmswqYrw0f6ej3bf4M4suDeRgNA"></script>
    <script src="{{ asset('storage/assets/js/pages/google-maps.init.js') }}" type="module"></script>
@endsection

