@extends('layouts.dashboard')
@section('title', ucfirst($selected->user->username) . '\'s order')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            @include('dashboard.orders.components.details')
        </div>
    </section>
@endsection
