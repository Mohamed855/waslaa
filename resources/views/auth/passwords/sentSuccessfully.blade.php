@extends('layouts.auth')

@section('title', __('auth.emailSent'))

@section('card-content')
    @if ($success)
        <div class="fs-5">
            <div class="alert alert-borderless alert-success text-center py-2 mx-2" role="alert">
                {{ $success }}
            </div>
        </div>
    @endif
@endsection

@section('secondary-action')
    <p class="text-muted text-center font-16 mb-5">@lang('translate.backTo') <a href="{{ route('signIn') }}" class="text-dark ms-1">@lang('auth.signIn')</a></p>
@endsection
