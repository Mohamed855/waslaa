@extends('layouts.dashboard')
@section('title', __('translate.addresses') . (isset($username) ? ' [ ' . $username . ' ]' : ''))
@section('content')
    @if (request()->routeIs('vendorAddresses'))
        <div class="row">
            <div class="col-xl-12 d-flex">
                <div class="mb-2">
                    <button class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#AddAddress">
                        <i data-feather="plus"></i>
                        @lang('translate.add')
                    </button>
                </div>
                @include('dashboard.addresses.components.add')
            </div>
        </div>
    @endif
    @include('dashboard.addresses.components.list')
@endsection
