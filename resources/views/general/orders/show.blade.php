@extends('layouts.dashboard')
@section('title', ucfirst($selected->user->username) . '\'s order')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div>
                <div class="card p-2">
                    <div class="card-body">
                        <h5 class="card-title">@lang('translate.orderDetails')</h5>
                        <p class="card-text">@lang('translate.orderedAt'): {{ date_format($selected->created_at, 'd-m-Y h:i a') }}</p>
                        <p class="card-text">@lang('translate.vendor'): <a href="{{ route('vendors.show', $selected->vendor['id']) }}">{{ $selected->vendor['name'] }}</a></p>
                        <p class="card-text">@lang('translate.phone'): {{ $selected->deliveryPhone }}</p>
                        <p class="card-text">@lang('translate.user'): <a href="{{ route('users.show', $selected->user->id) }}">{{ $selected->user->username }}</a></p>
                        <p class="card-text">@lang('translate.address'): {{ $selected->address }}</p>
                        <p class="card-text">@lang('translate.deliveryMethod'): {{ __('translate.' . $selected->deliveryMethod) }}</p>
                        <p class="card-text">@lang('translate.payMethod'): {{ __('translate.' . $selected->payMethod) }}</p>
                        <p class="card-text">@lang('translate.deliveryNote'): {{ $selected->deliveryNote }}</p>
                        <p class="card-text">@lang('translate.total'): {{ $selected->totalCost }} @lang('translate.pound')</p>
                        <div class="d-inline-block">
                            <a href="#products" class="pe-1">@lang('translate.products')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="products">
        @include('general.orders.products')
    </section>
@endsection
