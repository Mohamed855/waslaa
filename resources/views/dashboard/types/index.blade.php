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
                @include('dashboard.types.partials.add')
            @elseif (request()->routeIs('productTypes'))
                @include('dashboard.types.partials.product-select-type')
            @endif
            @if(request()->routeIs('types.index') || (request()->routeIs('vendorTypes') && auth('admin')->user()->is_primary))
                <div class="mx-1 mb-2">
                        @include('dashboard.partials.delete-selected-modal', ['resource' => 'type'])
                </div>
            @endif
        </div>
    </div>
    @include('dashboard.types.partials.list')
@endsection
