@extends('layouts.dashboard')
@section('title', __('translate.vendors'))
@section('content')
    <section>
        <div class="row d-flex">
            <div class="col-xl-12 mb-2">
                <a href="{{ route('vendors.create') }}">
                    <button class="btn btn-success ms-auto" data-bs-toggle="modal">
                        <i data-feather="plus"></i>
                        @lang('translate.add')
                    </button>
                </a>
            </div>
            @if(auth('admin')->check() && auth('admin')->user()->is_primary)
                <div class="mx-1 mb-2">
                        @include('dashboard.partials.delete-selected-modal', ['resource' => 'vendor'])
                </div>
            @endif
        </div>
        @include('dashboard.vendors.partials.list')
    </section>
@endsection
