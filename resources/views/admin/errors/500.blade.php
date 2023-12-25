@extends('layouts.error')

@section('title', 'Error 500')

@section('err-logo', 'assets/images/svg/500.svg')

@section('err-code', '500')

@section('err-title', 'Internal server error')

@section('err-description')
    Why not try refreshing your page? or you can contact <a href="javascript: void(0);" class="text-primary"><b>Support</b></a>
@endsection
