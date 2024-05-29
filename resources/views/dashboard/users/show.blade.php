@extends('layouts.dashboard')
@section('title', ucfirst($selected->username) . '\'s profile' )
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-12 col-md-5 col-lg-4">
                <div class="card">
                    <img src="{{ asset($selected->avatar ? 'storage/images/users/' . $selected->avatar : 'storage/images/global/profile.jpg') }}" class="card-img-top" alt="profile image">
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-8">
                @include('dashboard.users.components.details')
            </div>
        </div>
    </section>
@endsection
