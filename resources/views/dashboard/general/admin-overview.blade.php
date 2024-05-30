@extends('layouts.dashboard')
@section('title', __('translate.overview'))
@section('content')
    <div class="row">
        <x-admin-overview-card title="{{ __('translate.admins') }}" icon="user" color="warning" total-count="{{ $adminsCount }}" active-count="{{ $activeAdminsCount }}" />
        <x-admin-overview-card title="{{ __('translate.vendors') }}" icon="home" color="info" total-count="{{ $vendorsCount }}" active-count="{{ $activeVendors ? $activeVendors->count() : 0 }}" />
        <x-admin-overview-card title="{{ __('translate.users') }}" icon="users" color="dark" total-count="{{ $usersCount }}" active-count="{{ $activeUsersCount }}" />
    </div>
    @foreach ($activeVendors as $vendor)
        <div class="pb-2">
            <h4>{{ $vendor->name }}</h4>
        </div>
        <div class="row">
            <x-vendor-overview-card title="{{ __('translate.managers') }}" icon="key" color="light-secondary" count="{{ $vendor->managers()->count() }}" />
            <x-vendor-overview-card title="{{ __('translate.users') }}" icon="users" color="light-warning" count="{{ $vendor->users()->count() }}" />
            <x-vendor-overview-card title="{{ __('translate.transactions') }}" icon="shuffle" color="light-success" count="{{ $vendor->total_transactions }}" />
            <x-vendor-overview-card title="{{ __('translate.categories') }}" icon="layers" color="light-primary" count="{{ $vendor->categories()->count() }}" />
            <x-vendor-overview-card title="{{ __('translate.subcategories') }}" icon="book-open" color="light-danger" count="{{ $vendor->subcategories()->count() }}" />
            <x-vendor-overview-card title="{{ __('translate.products') }}" icon="shopping-cart" color="secondary" count="{{ $vendor->products()->count() }}" />
            <x-vendor-overview-card title="{{ __('translate.components') }}" icon="command" color="light-info" count="{{ $vendor->components()->count() }}" />
            <x-vendor-overview-card title="{{ __('translate.types') }}" icon="radio" color="subtle" count="{{ $vendor->types()->count() }}" />
        </div>
        <p class="navigation-header">
            <span style='font-size: 16px;'>@lang('translate.orders')</span>
        </p>
        <div class="row">
            @php
                $vendorOrders = $vendor->orders($vendor->id)->get();
                $vendorInvoices = $vendor->invoices()->get();
            @endphp
            <x-vendor-overview-card title="{{ __('translate.ordered') }}" icon="list" color="primary" count="{{ $vendorOrders->where('status', 'ordered')->count() }}" />
            <x-vendor-overview-card title="{{ __('translate.accepted') }}" icon="check" color="success" count="{{ $vendorOrders->where('status', 'accepted')->count() }}" />
            <x-vendor-overview-card title="{{ __('translate.canceled') }}" icon="x-octagon" color="danger" count="{{ $vendorOrders->where('status', 'canceled')->count() }}" />
        </div>
        <p class="navigation-header">
            <span style='font-size: 16px;'>@lang('translate.invoices')</span>
        </p>
        <div class="row">
            <x-vendor-overview-card title="{{ __('translate.opened') }}" icon="square" color="warning" count="{{ $vendorInvoices->where('status', 'opened')->count() }}" />
            <x-vendor-overview-card title="{{ __('translate.closed') }}" icon="minus-square" color="info" count="{{ $vendorInvoices->where('status', 'closed')->count() }}" />
            <x-vendor-overview-card title="{{ __('translate.collected') }}" icon="x-square" color="dark" count="{{ $vendorInvoices->where('status', 'collected')->count() }}" />
        </div>
    @endforeach
@endsection
