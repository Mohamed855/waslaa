@extends('layouts.auth')

@section('title', 'Register')

@section('card-content')
    <div class="">
        <h4 class="font-20">@lang('auth.signUp')</h4>
        <p class="text-muted mb-3">@lang('auth.signUpMessage')</p>
    </div>

    <form action="#">
        <div class="mb-3">
            <label for="fullname" class="form-label">@lang('auth.fullName')</label>
            <input class="form-control" type="text" id="fullname" placeholder="@lang('auth.fullNamePlaceholder')" required="">
        </div>
        <div class="mb-3">
            <label for="emailaddress" class="form-label">@lang('auth.email')</label>
            <input class="form-control" type="email" id="emailaddress" required="" placeholder="@lang('auth.emailPlaceholder')">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">@lang('auth.password')</label>
            <input class="form-control" type="password" required="" id="password" placeholder="@lang('auth.passwordPlaceholder')">
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkbox-signUp">
                <label class="form-check-label" for="checkbox-signUp">@lang('auth.accept') <a href="javascript: void(0);" class="text-dark">@lang('auth.termsCondition')</a></label>
            </div>
        </div>
        <div class="mb-0 d-grid text-center">
            <button class="btn btn-primary fw-semibold" type="submit">@lang('auth.signUp')</button>
        </div>
    </form>

    <div class="text-center mt-4">
        <p class="text-muted font-18">@lang('auth.signUpWith')</p>
        <div class="d-flex gap-2 justify-content-center mt-3">
            <a href="javascript: void(0);" class="btn btn-sm btn-soft-primary font-16"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="javascript: void(0);" class="btn btn-sm btn-soft-danger font-16"><i class="fa-brands fa-instagram"></i></a>
            <a href="javascript: void(0);" class="btn btn-sm btn-soft-info font-16"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="javascript: void(0);" class="btn btn-sm btn-soft-dark font-16"><i class="fa-brands fa-github"></i></a>
        </div>
    </div>
@endsection

@section('secondary-action')
    <p class="text-muted text-center font-16 mb-5">@lang('auth.haveAcc') <a href="{{ route('admin.signIn') }}" class="text-dark ms-1">@lang('auth.signIn')</a></p>
@endsection
