@extends('layouts.dashboard')
@section('title', __('translate.countries'))
@section('content')
    <div class="row">
        <div class="col-xl-12 d-flex">
            <div class="mb-2">
                <button class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#AddCountry">
                    <i data-feather="plus"></i>
                    @lang('translate.add')
                </button>
            </div>
            @include('dashboard.countries.components.add')
        </div>
    </div>
    @include('dashboard.countries.components.list')
@endsection
