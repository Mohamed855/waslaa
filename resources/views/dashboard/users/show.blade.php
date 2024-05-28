@extends('layouts.dashboard')
@section('title', ucfirst($selected->username) . '\'s profile' )
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset($selected->avatar ? 'storage/images/users/' . $selected->avatar : 'storage/images/global/profile.jpg') }}" class="card-img-top" alt="profile image">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card p-2">
                    <div class="card-body">
                        <h5 class="card-title">{{ ucfirst($selected->name) . ' (' . $selected->username . ')' }}</h5>
                        <p class="card-text">@lang('translate.joinedAt'): {{ date_format($selected->created_at, 'd-m-Y') }}</p>

                        <h5 class="card-title">@lang('translate.details')</h5>
                        <p class="card-text">@lang('translate.phone'): {{ $selected->phone }}</p>
                        <p class="card-text">@lang('translate.secPhone'): {{ $selected->sec_phone ?? '-' }}</p>
                        <p class="card-text">@lang('translate.gender'): {{ $selected->gender }}</p>
                        <p class="card-text">@lang('translate.city'): {{ $selected->city->$nameOnLang }}</p>
                        @if (auth('admin')->user())
                            <p class="card-text">@lang('translate.following'): {{ count($selected->favoriteVendors) }}</p>
                            <p class="card-text">@lang('translate.userIn'): {{ count($selected->vendors) }}</p>
                            <p class="card-text">@lang('translate.complains'): {{ count($selected->complains) }}</p>
                        @endif
                        <div class="d-inline-block">
                            <a href="#orders" class="pe-1">@lang('translate.orders')</a>
                        </div>
                        <div class="d-inline-block">
                            <a href="#addresses" class="pe-1">@lang('translate.addresses')</a>
                        </div>
                        @if (auth('admin')->user())
                            <div class="d-inline-block">
                                <a href="#complains" class="pe-1">@lang('translate.complains')</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="orders">
        @include('dashboard.users.partials.orders')
    </section>
    <section id="addresses">
        @include('dashboard.users.partials.addresses')
    </section>
    @if (auth('admin')->user())
        <section id="complains">
            @include('dashboard.users.partials.complains')
        </section>
    @endif
@endsection
