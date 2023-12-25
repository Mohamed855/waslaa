@extends('layouts.admin')

@section('title', 'Font Awesome Icons')

@section('subtitle', 'Icons')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Solid</h4>
                    <p class="sub-header">Use <code>&lt;i class="fas fa-ad"&gt;&lt;/i&gt;</code> <span
                            class="badge bg-success">v 5.13.0</span>.</p>

                    <div class="row icons-list-demo" id="solid">
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Regular</h4>
                    <p class="sub-header">Use <code>&lt;i class="far fa-address-book"&gt;&lt;/i&gt;</code> <span
                            class="badge bg-success">v 5.13.0</span>.</p>

                    <div class="row icons-list-demo" id="regular">
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Brands</h4>
                    <p class="sub-header">Use <code>&lt;i class="fab fa-500px"&gt;&lt;/i&gt;</code> <span
                            class="badge bg-success">v 5.13.0</span>.</p>

                    <div class="row icons-list-demo" id="brand">
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
