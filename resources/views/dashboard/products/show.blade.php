@extends('layouts.dashboard')
@section('title', ucfirst($selected->$nameOnLang))
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-12 col-md-5 col-lg-4">
                <div class="card">
                    <img src="{{ asset($selected->avatar ? 'storage/images/products/' . $selected->avatar : 'storage/images/global/default.jpg') }}" class="card-img-top" alt="profile image">
                    <div class="card-body">
                        <div class="row">
                            @if ($selected['avatar'] == 'default.jpg')
                                <form action="{{ route('updateAvatar', [ 'guard' => 'product', 'id' => $selected['id'] ]) }}" id="avatar_form" method="post" enctype="multipart/form-data" class="cursor-pointer">
                                    @csrf
                                    <label class="btn col-12 btn-success">
                                        <input type="file" name="avatar" id="avatar" class="d-none" accept=".png,.jpg">
                                        @lang('translate.add')
                                    </label>
                                </form>
                            @else
                                <div class="row justify-content-between m-auto">
                                    <form action="{{ route('updateAvatar', [ 'guard' => 'product', 'id' => $selected['id'] ]) }}" id="avatar_form" method="post" enctype="multipart/form-data" class="d-inline cursor-pointer pb-1 col-12">
                                        @csrf
                                        <label class="btn w-100 btn-primary">
                                            <input type="file" name="avatar" id="avatar" class="d-none" accept=".png,.jpg">
                                            <i data-feather="edit"></i>
                                            @lang('translate.edit')
                                        </label>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-8">
                @include('dashboard.products.partials.details')
            </div>
        </div>
    </section>
@endsection
