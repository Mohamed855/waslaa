@extends('layouts.auth')

@section('title', 'Recover Password')

@section('card-content')
    <h4 class="font-20">@lang('auth.forgetPass')</h4>
    <p class="text-muted mb-3">@lang('auth.forgetPassMessage')</p>

    <!-- form -->
    <form action="#">
        <div class="mb-3">
            <label for="emailaddress" class="form-label">@lang('auth.email')</label>
            <input class="form-control" type="email" id="emailaddress" required="" placeholder="@lang('auth.emailPlaceholder')">
        </div>

        <div class="mb-0 text-start">
            <button class="btn btn-soft-primary w-100" type="submit"><i class="fa-solid fa-rotate-right font-18 lh-sm me-1 fw-bold"></i> <span class="fw-bold">@lang('auth.resetPass')</span></button>
        </div>
    </form>
    <!-- end form-->
@endsection

@section('secondary-action')
    <p class="text-muted text-center font-16 mb-5">@lang('auth.backTo') <a href="sign-in.blade.php" class="text-dark ms-1">@lang('auth.signIn')</a></p>
@endsection
