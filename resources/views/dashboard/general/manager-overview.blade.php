@extends('layouts.dashboard')
@section('title', __('translate.overview'))
@section('content')
    <div class="row">
        <x-vendor-overview-card title="{{ __('translate.users') }}" icon="users" color="light-warning" count="{{ $usersCount }}" />
        <x-vendor-overview-card title="{{ __('translate.categories') }}" icon="layers" color="light-primary" count="{{ $categoriesCount }}" />
        <x-vendor-overview-card title="{{ __('translate.subcategories') }}" icon="book-open" color="light-danger" count="{{ $subcategoriesCount }}" />
        <x-vendor-overview-card title="{{ __('translate.products') }}" icon="shopping-cart" color="secondary" count="{{ $productsCount }}" />
        <x-vendor-overview-card title="{{ __('translate.components') }}" icon="command" color="light-info" count="{{ $componentsCount }}" />
        <x-vendor-overview-card title="{{ __('translate.types') }}" icon="radio" color="subtle" count="{{ $typesCount }}" />
    </div>
@endsection
