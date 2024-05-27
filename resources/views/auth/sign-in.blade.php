@extends('layouts.auth')

@section('title', __('auth.signIn'))

@section('card-content')
    <div class="">
        <h4 class="font-20">@lang('auth.signIn')</h4>
        <p class="text-muted mb-3">@lang('auth.signInMessage')</p>
    </div>

    <form action="{{ route('checkCredentials') }}" method="POST" class="mb-3">
        @csrf
        <div class="form-group mb-3">
            <label class="form-label" for="email">@lang('auth.email')</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="@lang('auth.emailPlaceholder')">
        </div>

        <div class="form-group position-relative mb-3">
            <label for="password" class="form-label">@lang('auth.password')</label>
            <a href="{{ route('password.request') }}" class="text-muted float-end"><small>@lang('auth.forgetPass')</small></a>
            <input type="password" id="password" class="form-control text-start" name="password" placeholder="@lang('auth.passwordPlaceholder')">
            <button class="btn btn-link position-absolute text-muted password-addon top-0 end-0" type="button" onclick="togglePasswordVisibility()">
                <i id="eyeIcon" data-feather="eye"></i>
            </button>
        </div>

        <div class="mb-0 d-grid text-center">
            <button class="btn btn-primary fw-semibold" type="submit">@lang('auth.signIn')</button>
        </div>
    </form>
@endsection

