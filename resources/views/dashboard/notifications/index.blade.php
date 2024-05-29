@extends('layouts.dashboard')
@section('title', __('translate.notifications'))
@section('content')
    <div class="row">
        <div class="col-xl-12 d-flex">
            <div class="mb-2">
                <button class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#AddNotification">
                    <i data-feather="plus"></i>
                    @lang('translate.add')
                </button>
            </div>
            @include('dashboard.notifications.partials.add')
        </div>
    </div>
    @include('dashboard.notifications.partials.list')
@endsection
