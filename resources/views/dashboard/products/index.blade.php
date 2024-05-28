@extends('layouts.dashboard')
@section('title', request()->routeIs('orderProducts') ? __('translate.orderProducts') : __('translate.products'))
@section('content')
    <section>
        @if (request()->routeIs('products.index'))
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
        @if (request()->routeIs('products.index'))
            @include('dashboard.products.components.products-table')
        @elseif (request()->routeIs('orderProducts'))
            @include('dashboard.products.components.order-products-table')
        @endif
    </section>
@endsection
