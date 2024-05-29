@extends('layouts.dashboard')
@section('title', ucfirst($selected->user->username) . '\'s order')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            @include('dashboard.orders.partials.details')
        </div>
    </section>
@endsection
