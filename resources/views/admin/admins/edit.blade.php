@extends('layouts.dashboard')
@section('title',  __('translate.edit') . ' ' . __('translate.admin') . ' [ ' . ucfirst($selected->username) . ' ]' )
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-12 col-12 m-auto">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admins.update', $selected->id) }}"
                              class="form form-vertical" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="row mb-2">
                                {{-- name --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="name">@lang('translate.name')</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="type"></i></span>
                                        <input type="text" id="text" class="form-control" value="{{ $selected->name }}"
                                               name="name" placeholder="@lang('translate.name')"/>
                                    </div>
                                </div>

                                {{-- username --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="username">@lang('translate.username')</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="type"></i></span>
                                        <input type="text" id="text" class="form-control" value="{{ $selected->username }}"
                                               name="username" placeholder="@lang('translate.username')"/>
                                    </div>
                                </div>

                                {{-- email --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="email">@lang('translate.email')</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather='at-sign'></i></span>
                                        <input type="email" id="email" class="form-control" name="email"
                                               value="{{ $selected->email }}"
                                               placeholder="email@example.com"/>
                                    </div>
                                </div>

                                {{-- Phone --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="phone">@lang('translate.phone')</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather='phone'></i></span>
                                        <input type="text" id="Phone" class="form-control" name="phone"
                                               value="{{ $selected->phone }}"
                                               placeholder="@lang('translate.phone')"/>
                                    </div>
                                </div>

                                {{-- avatar --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="avatar">@lang('translate.avatar')</label>
                                    <div class="input-group input-group-merge">
                                        <input type="file" id="ConfirmNewPassword" class="form-control" name="avatar"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-1 d-flex">
                                    <button type="submit" class="btn btn-primary w-100"
                                            style="min-width: 180px">@lang('translate.save')</button>
                                </div>
                            </div>
                        </form>

                        @if($selected->image != null)
                            <form class="col-12 col-md-1 mt-1" action="{{ route('image.remove', $selected->id) }}"
                                  method="POST">
                                @csrf
                                <button class="btn btn-danger w-100" style="min-width: 180px" data-bs-toggle="modal">
                                    <i data-feather="x"></i>
                                    @lang('translate.removeImage')
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
