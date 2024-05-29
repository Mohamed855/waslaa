@extends('layouts.dashboard')
@section('title', __('translate.categories') . (isset($username) ? ' [ ' . $username . ' ]' : ''))
@section('content')
    <div class="row">
        <div class="col-xl-12 d-flex">
            <div class="mb-2">
                <button class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#AddCategory">
                    <i data-feather="plus"></i>
                    @lang('translate.add')
                </button>
            </div>
            @if (auth('admin')->check() && request()->routeIs('categories.index'))
                @include('dashboard.categories.components.add')
            @elseif (auth('vendor')->check() || request()->routeIs('vendorCategories'))
                @include('dashboard.categories.components.vendor-select-category')
            @endif
        </div>
    </div>
    @include('dashboard.categories.components.list')
@endsection
