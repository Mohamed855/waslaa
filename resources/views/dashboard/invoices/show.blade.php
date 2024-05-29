@extends('layouts.dashboard')
@section('title', ucfirst($selected->vendor->name) . '\'s invoice')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            @include('dashboard.invoices.partials.details')
        </div>
    </section>
@endsection
