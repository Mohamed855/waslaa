@extends('layouts.dashboard')
@section('title', __('translate.users') . (isset($username) ? ' [ ' . $username . ' ]' : ''))
@section('content')
    <section>
        @include('dashboard.users.partials.list')
    </section>
@endsection
