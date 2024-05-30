@extends('layouts.dashboard')
@section('title', __('translate.ads'))
@section('content')
    <div class="row">
        <div class="col-xl-12 d-flex">
            <div class="mb-2">
                <button class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#AddAd">
                    <i data-feather="plus"></i>
                    @lang('translate.add')
                </button>
            </div>
            @include('dashboard.ads.partials.add')
            @if(auth('admin')->user()->is_primary)
                <div class="mx-1 mb-2">
                        @include('dashboard.partials.delete-selected-modal', ['resource' => 'ad'])
                </div>
            @endif
        </div>
    </div>
    @include('dashboard.ads.partials.list')
@endsection
