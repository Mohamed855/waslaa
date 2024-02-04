@extends('layouts.error')

@section('title', __('translate.error') . ' | 404')

@section('err-logo', asset('storage/images/svg/404.svg'))

@section('err-code', '404')

@section('err-title', __('error.pageNotFound'))

@section('err-description', __('error.404-description'))

@section('err-action')
    <a href="{{ route('signIn') }}" class="btn btn-link w-100"><i class="fa-solid fa-house me-1"></i>{{ __('error.backToSignIn') }}</a>
@endsection
