@extends('layouts.dashboard')
@section('title', ucfirst($selected->_vendor->name) . '\'s invoice')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div>
                <div class="card p-2">
                    <div class="card-body">
                        <h5 class="card-title">@lang('translate.invoiceDetails')</h5>
                        <p class="card-text">@lang('translate.vendor'): <a href="{{ route('vendors.show', $selected->_vendor->id) }}">{{ $selected->_vendor->name }}</a></p>
                        <p class="card-text">@lang('translate.start'): {{ date_format($selected->start, 'd-m-Y') }}</p>
                        <p class="card-text">@lang('translate.end'): {{ date_format($selected->end, 'd-m-Y') }}</p>
                        <p class="card-text">@lang('translate.orders'): {{ count($selected->_orders) }}</p>
                        <p class="card-text">@lang('translate.total'): {{ $selected->total_price }} @lang('translate.pound')</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="orders">
        @include('admin.invoices.orders')
    </section>
@endsection
