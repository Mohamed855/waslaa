@extends('layouts.dashboard')
@php
    $productDesc = match (true) {
        isset($username) => ' [ ' . $username . ' ]',
        default => '',
    };
    $title = request()->routeIs('orderProducts') ? __('translate.orderProducts') : __('translate.products');
@endphp
@section('title', $title . $productDesc)
@section('content')
    <section>
        @if (auth('vendor')->check() && request()->routeIs('products.index'))
            <div class="row d-flex">
                <div class="col-xl-12 mb-2">
                    <a href="{{ route('products.create') }}">
                        <button class="btn btn-success ms-auto" data-bs-toggle="modal">
                            <i data-feather="plus"></i>
                            @lang('translate.add')
                        </button>
                    </a>
                </div>
            </div>
        @endif
        @if (request()->routeIs(['products.index', 'vendorProducts']))
            @include('dashboard.products.partials.products-list')
        @elseif (request()->routeIs('orderProducts'))
            @include('dashboard.products.partials.order-products-list')
        @endif
    </section>
@endsection
