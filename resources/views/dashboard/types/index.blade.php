@extends('layouts.dashboard')
@section('title', (request()->routeIs('productTypes') ? __('translate.productType') : __('translate.type')) . (isset($username) ? ' [ ' . $username . ' ]' : ''))
@section('content')
    <div class="row">
        <div class="col-xl-12 d-flex">
            <div class="mb-2">
                <button class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#AddType">
                    <i data-feather="plus"></i>
                    @lang('translate.add')
                </button>
            </div>
            @if (request()->routeIs(['types.index', 'vendorTypes']))
                @include('dashboard.types.components.add')
            @elseif (request()->routeIs('productTypes'))
                @include('dashboard.types.components.product-select-type')
            @endif
        </div>
    </div>
    @include('dashboard.types.components.list')
@endsection
