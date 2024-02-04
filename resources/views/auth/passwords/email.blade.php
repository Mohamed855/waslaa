@extends('layouts.auth')

@section('title', __('auth.recoverPassword'))

@section('card-content')
    <h4 class="font-20">@lang('auth.forgetPass')</h4>
    <p class="text-muted mb-3">@lang('auth.forgetPassMessage')</p>

    <!-- form -->
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">@lang('auth.email')</label>
            <input class="form-control text-start" name="email" type="email" id="email" placeholder="@lang('auth.emailPlaceholder')">
        </div>

        <div class="mb-0 d-grid text-center">
            <button class="btn btn-primary fw-semibold" type="submit">@lang('auth.resetPass')</span></button>
        </div>
    </form>
    <!-- end form-->
@endsection

@section('secondary-action')
    <p class="text-muted text-center font-16 mb-5">@lang('translate.backTo') <a href="{{ route('signIn') }}" class="text-dark ms-1">@lang('auth.signIn')</a></p>
@endsection
