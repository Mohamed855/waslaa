@extends('layouts.dashboard')
@section('title', ucfirst($selected->user->username) . '\'s order')
@section('content')
    <section id="basic-horizontal-layouts">
        @include('dashboard.orders.partials.details')
    </section>
    <section id="products">
        <h3 class="py-1">@lang('translate.products')</h3>
        @include('dashboard.orders.partials.products')
    </section>
@endsection
