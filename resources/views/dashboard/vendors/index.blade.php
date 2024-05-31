@extends('layouts.dashboard')
@section('title', __('translate.vendors'))
@section('content')
    <section>
        <div class="row">
            <div class="col-xl-12 d-flex">
                <a class="mb-2" href="{{ route('vendors.create') }}">
                    <button class="btn btn-success ms-auto" data-bs-toggle="modal">
                        <i data-feather="plus"></i>
                        @lang('translate.add')
                    </button>
                </a>
                @if(auth('admin')->user()->is_primary)
                    <div class="d-inline-block mx-1 mb-2">
                            @include('dashboard.partials.delete-selected-modal', ['resource' => 'vendor'])
                    </div>
                @endif
            </div>
        </div>
        @include('dashboard.vendors.partials.list')
    </section>
@endsection
