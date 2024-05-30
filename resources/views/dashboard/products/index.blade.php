@extends('layouts.dashboard')
@section('title', __('translate.products') . (isset($username) ? ' [ ' . $username . ' ]' : ''))
@section('content')
    <section>
        @if (auth('vendor')->check() && request()->routeIs('products.index'))
            <div class="row d-flex">
                <div class="col-xl-12 mb-2">
                    <a href="{{ route('products.create') }}">
                        <button class="btn btn-success ms-auto" data-bs-toggle="modal">
                            <i data-feather="plus"></i>
                            @lang('translate.add')
                        </button>
                    </a>
                </div>
            </div>
        @endif
        @include('dashboard.products.partials.list')
    </section>
@endsection
