@extends('layouts.error')

@section('title', __('translate.error') . ' | 500')

@section('err-logo', asset('storage/images/svg/500.svg'))

@section('err-code', '500')

@section('err-title', __('error.serverError'))

@section('err-description')
    @lang('error.500-description') <br> @lang('error.500-advice') <a href="" class="text-primary py-2"><b>@lang('translate.support')</b></a>
@endsection
