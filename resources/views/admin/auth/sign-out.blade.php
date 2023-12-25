@extends('layouts.auth')

@section('title', 'Log Out')

@section('card-content')
    <div class="text-center">
        <h4 class="mt-0 fs-20">@lang('auth.signOut')</h4>
        <p class="text-muted mb-4">@lang('auth.signOutMessage')</p>
    </div>

    <div class="d-flex justify-content-center m-auto">
        <img src="{{ asset('storage/assets/images/svg/logout.svg') }}" alt="" width="140" class="img-fluid mx-auto">
    </div>

    <p class="text-muted text-center font-16 mt-3">@lang('auth.backTo') <a href="{{ route('admin.signIn') }}" class="text-dark ms-1">@lang('auth.signIn')</a></p>
@endsection

@section('secondary-action')
    <div class="text-muted text-center font-16 mb-5"></div>
@endsection
