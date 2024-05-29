@extends('layouts.dashboard')
@php
    $orderDesc = match (true) {
        isset($username) => ' [ ' . $username . ' ]',
        isset($status) => ' [ ' . $status . ' ]',
        default => '',
    };
    $title = request()->routeIs('invoiceOrders') ? __('translate.invoiceOrders') : __('translate.orders');
@endphp
@section('title', $title . $orderDesc)
@section('content')
    <section>
        @include('dashboard.orders.components.list')
    </section>
@endsection
