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
                @if(request()->routeIs('categories.index') && auth('admin')->check() && auth('admin')->user()->is_primary)
                    <div class="mx-1 mb-2">
                            @include('dashboard.partials.delete-selected-modal', ['resource' => 'category'])
                    </div>
                @endif
            </div>
            @if (auth('admin')->check() && request()->routeIs('categories.index'))
                @include('dashboard.categories.partials.add')
            @elseif (auth('vendor')->check() || request()->routeIs('vendorCategories'))
                @include('dashboard.categories.partials.vendor-select-category')
            @endif
        </div>
    </div>
    @include('dashboard.categories.partials.list')
@endsection
