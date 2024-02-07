@extends('layouts.dashboard')
@section('title', ucfirst($selected->name) . '\'s profile' )
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
                <div class="card  p-2">
                    <div class="card-body">
                        <h5 class="card-title">{{ ucfirst($selected->name) }}</h5>
                        <p class="card-text">@lang('translate.joinedAt')
                            : {{ date_format($selected->created_at, 'd-m-Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
