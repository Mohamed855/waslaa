@extends('layouts.dashboard')
@section('title', __('translate.users') . (isset($username) ? ' [ ' . $username . ' ]' : ''))
@section('content')
    <div class="row">
        <div class="col-xl-12 d-flex">
            @if(auth('admin')->check() && auth('admin')->user()->is_primary)
                <div class="mb-2">
                        @include('dashboard.partials.delete-selected-modal', ['resource' => 'user'])
                </div>
            @endif
        </div>
    </div>
    <section>
        @include('dashboard.users.partials.list')
    </section>
@endsection
