@extends('layouts.auth')

@section('title', 'Log In')

@section('card-content')
    <div class="">
        <h4 class="font-20">@lang('auth.signIn')</h4>
        <p class="text-muted mb-3">@lang('auth.signInMessage')</p>
    </div>

    <form action="#" class="mb-3">
        <div class="form-group mb-3">
            <label class="form-label" for="emailaddress">@lang('auth.email')</label>
            <input class="form-control" type="email" id="emailaddress" required="" placeholder="@lang('auth.emailPlaceholder')">
        </div>

        <div class="mb-3">
            <a href="{{ route('admin.reset') }}" class="text-muted {{ app()->getLocale() == 'ar' ? 'float-start' : 'float-end' }}"><small>@lang('auth.forgetPass')</small></a>
            <label for="password" class="form-label">@lang('auth.password')</label>
            <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" placeholder="@lang('auth.passwordPlaceholder')">
                <div class="input-group-text" data-password="false">
                    <span class="password-eye"></span>
                </div>
            </div>
        </div>

        <div class="form-group mb-3">
            <div class="d-flex gap-2">
                <input class="form-check-input" type="checkbox" id="checkbox-signin" checked>
                <label class="form-check-label" for="checkbox-signin">@lang('auth.rememberMe')</label>
            </div>
        </div>

        <div class="form-group mb-0 text-center">
            <button class="btn btn-blue w-100" type="submit"><i class="mdi mdi-login me-1"></i>@lang('auth.signIn')</button>
        </div>

    </form>

    <div class="text-center mt-4">
        <p class="text-muted font-18">@lang('auth.signInWith')</p>
        <div class="d-flex gap-2 justify-content-center mt-3">
            <a href="javascript: void(0);" class="btn btn-sm btn-soft-primary font-16"><i class="mdi mdi-facebook"></i></a>
            <a href="javascript: void(0);" class="btn btn-sm btn-soft-danger font-16"><i class="mdi mdi-instagram"></i></a>
            <a href="javascript: void(0);" class="btn btn-sm btn-soft-info font-16"><i class="mdi mdi-twitter"></i></a>
            <a href="javascript: void(0);" class="btn btn-sm btn-soft-dark font-16"><i class="mdi mdi-github"></i></a>
        </div>
    </div>
@endsection

@section('secondary-action')
    <p class="text-muted text-center font-16 mb-5">@lang('auth.notHaveAcc') <a href="{{ route('admin.signUp') }}" class="text-dark ms-1">@lang('auth.signUp')</a></p>
@endsection

