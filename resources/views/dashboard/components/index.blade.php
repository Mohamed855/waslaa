@extends('layouts.dashboard')
@section('title', (request()->routeIs('productComponents') ? __('translate.productComponents') : __('translate.components')) . (isset($username) ? ' [ ' . $username . ' ]' : ''))
@section('content')
    <div class="row">
        <div class="col-xl-12 d-flex">
            <div class="mb-2">
                <button class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#AddComponent">
                    <i data-feather="plus"></i>
                    @lang('translate.add')
                </button>
            </div>
            @if(request()->routeIs('components.index') || (request()->routeIs('vendorComponents') && auth('admin')->user()->is_primary))
                <div class="mx-1 mb-2">
                        @include('dashboard.partials.delete-selected-modal', ['resource' => 'component'])
                </div>
            @endif
            @if (request()->routeIs(['components.index', 'vendorComponents']))
                @include('dashboard.components.partials.add')
            @elseif (request()->routeIs('productComponents'))
                @include('dashboard.components.partials.product-select-component')
            @endif
        </div>
    </div>
    @include('dashboard.components.partials.list')
@endsection
