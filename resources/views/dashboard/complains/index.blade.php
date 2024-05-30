@extends('layouts.dashboard')
@section('title', __('translate.complains') . (isset($username) ? ' [ ' . $username . ' ]' : ''))
@section('content')
    @if (auth('vendor')->check())
        <div class="row">
            <div class="col-xl-12 d-flex">
                <div class="mb-2">
                    <button class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#AddComplain">
                        <i data-feather="plus"></i>
                        @lang('translate.add')
                    </button>
                </div>
                @include('dashboard.complains.partials.add')
                <div class="mx-1 mb-2">
                    @include('dashboard.partials.delete-selected-modal', ['resource' => 'complain'])
                </div>
            </div>
        </div>
    @endif
    @include('dashboard.complains.partials.list')
@endsection
