@extends('layouts.dashboard')
@php
    $invoiceDesc = match (true) {
        isset($username) => ' [ ' . $username . ' ]',
        isset($status) => ' [ ' . $status . ' ]',
        default => '',
    };
@endphp
@section('title', __('translate.invoices') . $invoiceDesc)
@section('content')
    <section>
        @include('dashboard.invoices.partials.list')
    </section>
@endsection
