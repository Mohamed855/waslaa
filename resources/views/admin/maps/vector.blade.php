@extends('layouts.admin')

@section('title', 'Vector Maps')

@section('subtitle', 'Maps')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">World Vector Map</h4>
                    <div id="world-map-markers" style="height: 420px"></div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">World Vector Map</h4>

                    <div class="mb-3">
                        <div id="world-map-markers-line" style="height: 360px"></div>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->
    </div>
    <!-- end row-->
@endsection

@section('additional-scripts')
    <script src="{{ asset('storage/assets/js/pages/vector-maps.init.js') }}" type="module"></script>
@endsection
