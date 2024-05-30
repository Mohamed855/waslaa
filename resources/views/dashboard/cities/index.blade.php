@extends('layouts.dashboard')
@section('title', __('translate.cities'))
@section('content')
    <div class="row">
        <div class="col-xl-12 d-flex">
            <div class="mb-2">
                <button class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#AddCity">
                    <i data-feather="plus"></i>
                    @lang('translate.add')
                </button>
            </div>
            @if(auth('admin')->user()->is_primary)
                <div class="mx-1 mb-2">
                        @include('dashboard.partials.delete-selected-modal', ['resource' => 'city'])
                </div>
            @endif
            @include('dashboard.cities.partials.add')
        </div>
    </div>
    @include('dashboard.cities.partials.list')
@endsection
