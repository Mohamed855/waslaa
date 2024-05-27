@extends('layouts.auth')

@section('title', __('auth.resetPass'))

@section('card-content')
    <h4 class="font-20">@lang('auth.resetPass')</h4>
    <p class="text-muted mb-3">@lang('auth.resetPassMessage')</p>
    <!-- form -->
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <div class="mb-3">
            {{--<label for="email" class="form-label">{{ __('Email Address') }}</label>--}}
            <input id="email" type="hidden" name="email" value="{{ $email ?? old('email') }}" required>
            <input id="token" type="hidden" name="token" value="{{ $token ?? old('token') }}" required>
        </div>
        <div class="mb-3 position-relative">
            <label class="form-label" for="password-input">@lang('auth.password')</label>
            <div class="position-relative auth-pass-inputgroup">
                <input type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="@lang('auth.passwordPlaceholder')" id="password password-input" name="password" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required autofocus>
                <button class="btn btn-link position-absolute text-muted password-addon end-0" style="top:15px" type="button" onclick="togglePasswordVisibility()">
                    <i id="eyeIcon" data-feather="eye"></i>
                </button>
            </div>
        </div>
        <div class="mb-3 position-relative">
            <label class="form-label" for="confirm-password-input">@lang('auth.confirmPassword')</label>
            <div class="position-relative auth-pass-inputgroup mb-3">
                <input type="password" class="form-control pe-5 password-input" onpaste="return false" id="password_confirmation" name="password_confirmation" placeholder="@lang('auth.confirmPasswordPlaceholder')" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                <button class="btn btn-link position-absolute text-muted end-0 top-0" type="button" onclick="toggleConfirmPasswordVisibility()">
                    <i id="eyeConfirmIcon" data-feather="eye"></i>
                </button>
                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="confirm-password-input">
                    <i class="ri-eye-fill align-middle"></i>
                </button>
            </div>
        </div>
        <div id="password-contain" class="p-3 bg-light mb-2 rounded">
            <h5 class="fs-13">Password must contain:</h5>
            <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
            <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)
            </p>
            <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter
                (A-Z)</p>
            <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary w-100" type="submit">@lang('auth.resetPass')</button>
        </div>
    </form>
    <!-- end form-->
@endsection

@section('secondary-action')
    <p class="text-muted text-center font-16 mb-5">@lang('translate.backTo') <a href="{{ route('signIn') }}" class="text-dark ms-1">@lang('auth.signIn')</a></p>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.min.css') }}">
@endsection

@section('scripts')
    <!-- password-addon init -->
    <script src="{{ URL::asset('assets/js/passowrd-create.init.js') }}"></script>
@endsection
