@extends('layouts.dashboard')
@section('title', ucfirst($selected->vendor->name) . '\'s invoice')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div>
                <div class="card p-2">
                    <div class="card-body">
                        <h5 class="card-title">@lang('translate.invoiceDetails')</h5>
                        <p class="card-text">@lang('translate.vendor'): <a href="{{ route('showVendor', $selected->vendor->username) }}">{{ $selected->vendor->name }}</a></p>
                        <p class="card-text">@lang('translate.start'): {{ date_format($selected->start, 'd-m-Y') }}</p>
                        @if ($selected->status !== 'opened')
                            <p class="card-text">@lang('translate.end'): {{ date_format($selected->end, 'd-m-Y') }}</p>
                        @endif
                        <p class="card-text">@lang('translate.orders'): {{ count($selected->orders) }}</p>
                        <p class="card-text">@lang('translate.total'): {{ $selected->total_price }} @lang('translate.pound')</p>
                        <div class="d-inline-block">
                            <a href="{{ route('invoiceOrders', $selected->id) }}" class="pe-1">@lang('translate.orders')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
