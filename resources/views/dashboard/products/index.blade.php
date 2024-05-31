@extends('layouts.dashboard')
@section('title', __('translate.products') . (isset($username) ? ' [ ' . $username . ' ]' : ''))
@section('content')
    <section>
        <div class="row">
            <div class="col-xl-12 d-flex">
                @if (auth('vendor')->check() && request()->routeIs('products.index'))
                    <a class="mb-2" href="{{ route('products.create') }}">
                        <button class="btn btn-success ms-auto" data-bs-toggle="modal">
                            <i data-feather="plus"></i>
                            @lang('translate.add')
                        </button>
                    </a>
                @endif
                @if((auth('vendor')->check() && request()->routeIs('products.index')) || (request()->routeIs('vendorProducts') && auth('admin')->user()->is_primary))
                    <div class="d-inline-block {{ request()->routeIs('products.index') ? 'mx-1' : '' }} mb-2">
                            @include('dashboard.partials.delete-selected-modal', ['resource' => 'product'])
                    </div>
                @endif
            </div>
        </div>
        @include('dashboard.products.partials.list')
    </section>
@endsection
