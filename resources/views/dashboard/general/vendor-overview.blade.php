@extends('layouts.dashboard')
@section('title', __('translate.overview'))
@section('content')
    <div class="row">
        <x-vendor-overview-card title="{{ __('translate.managers') }}" icon="key" color="light-secondary" count="{{ $managersCount }}" />
        <x-vendor-overview-card title="{{ __('translate.users') }}" icon="users" color="light-warning" count="{{ $usersCount }}" />
        <x-vendor-overview-card title="{{ __('translate.transactions') }}" icon="trending-up" color="light-success" count="{{ auth('vendor')->user()->total_transactions }}" />
        <x-vendor-overview-card title="{{ __('translate.categories') }}" icon="layers" color="light-primary" count="{{ $categoriesCount }}" />
        <x-vendor-overview-card title="{{ __('translate.subcategories') }}" icon="book-open" color="light-danger" count="{{ $subcategoriesCount }}" />
        <x-vendor-overview-card title="{{ __('translate.products') }}" icon="shopping-cart" color="secondary" count="{{ $productsCount }}" />
        <x-vendor-overview-card title="{{ __('translate.components') }}" icon="command" color="light-info" count="{{ $componentsCount }}" />
        <x-vendor-overview-card title="{{ __('translate.types') }}" icon="radio" color="subtle" count="{{ $typesCount }}" />
    </div>
    <div class="pb-2">
        <h4>@lang('translate.orders')</h4>
    </div>
    <div class="row">
        <x-vendor-overview-card title="{{ __('translate.ordered') }}" icon="list" color="primary" count="{{ $orders->where('status', 'ordered')->count() }}" />
        <x-vendor-overview-card title="{{ __('translate.accepted') }}" icon="check" color="success" count="{{ $orders->where('status', 'accepted')->count() }}" />
        <x-vendor-overview-card title="{{ __('translate.canceled') }}" icon="x-octagon" color="danger" count="{{ $orders->where('status', 'canceled')->count() }}" />
    </div>
    <div class="pb-2">
        <h4>@lang('translate.invoices')</h4>
    </div>
    <div class="row">
        <x-vendor-overview-card title="{{ __('translate.opened') }}" icon="square" color="warning" count="{{ $invoices->where('status', 'opened')->count() }}" />
        <x-vendor-overview-card title="{{ __('translate.closed') }}" icon="minus-square" color="info" count="{{ $invoices->where('status', 'closed')->count() }}" />
        <x-vendor-overview-card title="{{ __('translate.canceled') }}" icon="check-square" color="dark" count="{{ $invoices->where('status', 'collected')->count() }}" />
    </div>
@endsection
