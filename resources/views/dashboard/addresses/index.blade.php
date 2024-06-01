@extends('layouts.dashboard')
@section('title', (request()->routeIs('vendorBranches') ? __('translate.branches') : __('translate.addresses')) . (isset($username) ? ' [ ' . $username . ' ]' : ''))
@section('content')
    @if (request()->routeIs('vendorBranches'))
        <div class="row">
            <div class="col-xl-12 d-flex">
                <div class="mb-2">
                    <button class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#AddAddress">
                        <i data-feather="plus"></i>
                        @lang('translate.add')
                    </button>
                </div>
                @include('dashboard.addresses.partials.add')
                @if(auth('admin')->check() && auth('admin')->user()->is_primary)
                    <div class="mx-1 mb-2">
                            @include('dashboard.partials.delete-selected-modal', ['resource' => 'address'])
                    </div>
                @endif
            </div>
        </div>
    @endif
    @include('dashboard.addresses.partials.list')
@endsection
