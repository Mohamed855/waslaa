@extends('layouts.dashboard')
@section('title', ucfirst($selected->username) . '\'s profile' )
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset($selected->avatar ? 'storage/images/users/' . $selected->avatar : 'storage/images/global/profile.jpg') }}"
                         class="card-img-top" alt="profile image">
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
                        <p class="card-text">@lang('translate.following'): {{ count($selected->favoriteVendors) }}</p>
                        <p class="card-text">@lang('translate.userIn'): {{ count($selected->vendors) }}</p>
                        <p class="card-text">@lang('translate.complains'): {{ count($selected->complains) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        @include('general.users.complains')
    </section>
@endsection
