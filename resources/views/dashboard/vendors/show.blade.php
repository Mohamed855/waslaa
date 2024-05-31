@extends('layouts.dashboard')
@section('title', ucfirst($selected['username']) . '\'s profile' )
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-12 col-md-5 col-lg-4">
                <div class="card">
                    <img src="{{ asset($selected['avatar'] ? 'storage/images/vendors/' . $selected['avatar'] : 'storage/images/global/profile.jpg') }}" class="card-img-top profile-image" alt="profile image">
                    <div class="card-body">
                        <div class="row">
                            @if ($selected['avatar'] == 'default.jpg')
                                <form action="{{ route('updateAvatar', [ 'guard' => 'vendor', 'id' => $selected['id'] ]) }}" id="avatar_form" method="post" enctype="multipart/form-data" class="cursor-pointer">
                                    @csrf
                                    <label class="btn col-12 btn-success">
                                        <input type="file" name="avatar" id="avatar" class="d-none" accept=".png,.jpg">
                                        @lang('translate.add')
                                    </label>
                                </form>
                            @else
                                <div class="row justify-content-between m-auto">
                                    <form action="{{ route('updateAvatar', [ 'guard' => 'vendor', 'id' => $selected['id'] ]) }}" id="avatar_form" method="post" enctype="multipart/form-data" class="d-inline cursor-pointer pb-1 col-12">
                                        @csrf
                                        <label class="btn w-100 btn-primary">
                                            <input type="file" name="avatar" id="avatar" class="d-none" accept=".png,.jpg">
                                            <i data-feather="edit"></i>
                                            @lang('translate.edit')
                                        </label>
                                    </form>
                                    <form action="{{ route('removeAvatar', [ 'guard' => 'vendor', 'id' => $selected['id'] ]) }}" method="post" class="d-inline cursor-pointer col-12">
                                        @csrf
                                        <button type="submit" class="btn w-100 btn-danger">
                                            <i data-feather="x"></i>
                                            @lang('translate.remove')
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-8">
                @include('dashboard.vendors.partials.details')
                @include('dashboard.vendors.partials.update-password')
            </div>
        </div>
    </section>
    <script>
        document.getElementById('avatar').addEventListener('change', function () {
            document.getElementById('avatar_form').submit();
        });
    </script>
@endsection
