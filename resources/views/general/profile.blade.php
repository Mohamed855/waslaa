@extends('layouts.dashboard')
@section('title', __('translate.welcome') . ' ' . $authUser['username'] )
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-12 col-sm-5 col-lg-4">
                <div class="card">
                    <img src="{{ asset($authUser['avatar'] ? 'storage/images/' . $guard . 's/' . $authUser['avatar'] : 'storage/images/global/profile.jpg') }}"
                         class="card-img-top profile-image" alt="profile image">
                    <div class="card-body">
                        <div class="row">
                            @if($authUser['avatar'] == null)
                                <form action="{{ route('avatar.update', ['guard' => $guard, 'id' => auth($guard)->id()]) }}"
                                      id="avatar_form"
                                      method="post" enctype="multipart/form-data" class="cursor-pointer">
                                    @csrf
                                    <label class="btn col-12 btn-success">
                                        <input type="file" name="avatar" id="avatar" class="d-none" accept=".png,.jpg">
                                        @lang('translate.add')
                                    </label>
                                </form>
                            @else
                                <div class="row justify-content-between m-auto">
                                    <form action="{{ route('avatar.update', ['guard' => $guard, 'id' => auth($guard)->id()]) }}"
                                          id="avatar_form"
                                          method="post" enctype="multipart/form-data"
                                          class="d-inline cursor-pointer pb-1 col-12">
                                        @csrf
                                        <label class="btn w-100 btn-primary">
                                            <input type="file" name="avatar" id="avatar" class="d-none"
                                                   accept=".png,.jpg">
                                            <i data-feather="edit"></i>
                                            @lang('translate.edit')
                                        </label>
                                    </form>
                                    <form action="{{ route('avatar.remove', ['guard' => $guard, 'id' => auth($guard)->id()]) }}"
                                          method="post"
                                          class="d-inline cursor-pointer col-12">
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
            <div class="col-12 col-sm-7 col-lg-8">
                <div class="card p-2">
                    <div class="card-body">
                        <h5 class="card-title">{{ ucfirst($authUser['name']) }}</h5>
                        <p class="card-text">@lang('translate.joinedAt')
                            : {{ date_format($authUser['created_at'], 'd-m-Y') }}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST"
                                          action="{{ route('profile.update', ['guard' => $guard, 'id' => auth($guard)->id()]) }}"
                                          class="form form-vertical" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-2">
                                            {{-- name --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="name">@lang('translate.name')</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="type"></i></span>
                                                    <input type="text" id="text" class="form-control"
                                                           value="{{ $authUser['name'] }}"
                                                           name="name" placeholder="@lang('translate.name')"/>
                                                </div>
                                            </div>

                                            {{-- username --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="username">@lang('translate.username')</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="type"></i></span>
                                                    <input type="text" id="text" class="form-control"
                                                           value="{{ $authUser['username'] }}"
                                                           name="username" placeholder="@lang('translate.username')"/>
                                                </div>
                                            </div>

                                            {{-- email --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="email">@lang('translate.email')</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather='at-sign'></i></span>
                                                    <input type="email" id="email" class="form-control" name="email"
                                                           value="{{ $authUser['email'] }}"
                                                           placeholder="email@example.com"/>
                                                </div>
                                            </div>

                                            {{-- Phone --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="phone">@lang('translate.phone')</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather='phone'></i></span>
                                                    <input type="text" id="Phone" class="form-control" name="phone"
                                                           value="{{ $authUser['phone'] }}"
                                                           placeholder="@lang('translate.phone')"/>
                                                </div>
                                            </div>

                                            {{-- Lang --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label"
                                                       for="phone">@lang('translate.defaultLang')</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather='globe'></i></span>
                                                    <select class="form-control" name="lang">
                                                        <option {{ $authUser['lang'] == 'en' ? 'selected' : '' }} value="en">@lang('translate.en')</option>
                                                        <option {{ $authUser['lang'] == 'ar' ? 'selected' : '' }} value="ar">@lang('translate.ar')</option>
                                                    </select>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.change', ['guard' => $guard, 'id' => $authUser['id']]) }}"
                              class="form form-vertical">
                            @csrf
                            <div class="row mb-2">
                                {{-- new password --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="password">@lang('auth.password')</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather='lock'></i></span>
                                        <input type="password" id="ConfirmNewPassword" class="form-control"
                                               name="password"
                                               placeholder="@lang('auth.password')"/>
                                    </div>
                                </div>

                                {{-- password confirmation --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label"
                                           for="password_confirmation">@lang('auth.confirmPassword')</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather='lock'></i></span>
                                        <input type="password" id="ConfirmNewPassword" class="form-control"
                                               name="password_confirmation"
                                               placeholder="@lang('auth.confirmPassword')"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-2 d-flex">
                                    <button type="submit" class="btn btn-primary w-100"
                                            style="min-width: 180px">@lang('translate.changePassword')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('avatar').addEventListener('change', function () {
            document.getElementById('avatar_form').submit();
        });
    </script>
@endsection
