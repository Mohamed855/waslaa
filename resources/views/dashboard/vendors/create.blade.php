@extends('layouts.dashboard')
@section('title', __('translate.add') . ' ' . __('translate.vendor'))
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-12 col-12 m-auto">
                @include('dashboard.vendors.components.add')
            </div>
        </div>
    </section>
@endsection
