@extends('layouts.auth')

@section('title', __('auth.signOut'))

@section('card-content')
    <div class="text-center">
        <h4 class="mt-0 fs-20">@lang('auth.signOutTitle')</h4>
        <p class="text-muted mb-4">@lang('auth.signOutMessage')</p>
    </div>

    <div class="d-flex justify-content-center m-auto">
        <img src="{{ asset('storage/images/svg/logout.svg') }}" alt="" width="140" class="img-fluid mx-auto">
    </div>

    <div class="text-muted text-center font-16 mt-3">
        <button class="btn btn-flat-light" onclick="history.back()">@lang('translate.back')</button>
        <form class="d-inline"  action="{{ route('endSession') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">@lang('translate.confirm')</button>
        </form>
    </div>
@endsection

@section('secondary-action')
    <div class="text-muted text-center font-16 mb-5"></div>
@endsection

