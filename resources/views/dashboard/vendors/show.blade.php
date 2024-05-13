@extends('layouts.admin-dashboard')
@section('title', ucfirst($selected['username']) )
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-12 col--5 col-lg-4">
                <div class="card">
                    <img src="{{ asset($selected['avatar'] ? 'storage/images/vendors/' . $selected['avatar'] : 'storage/images/global/profile.jpg') }}"
                         class="card-img-top profile-image" alt="profile image">
                    <div class="card-body">
                        <div class="row">
                            @if($selected['avatar'] == 'default.jpg')
                                <form action="{{ route('avatar.update', [ 'guard' => 'vendor', 'id' => $selected['id'] ]) }}"
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
                                    <form action="{{ route('avatar.update', [ 'guard' => 'vendor', 'id' => $selected['id'] ]) }}"
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
                                    <form action="{{ route('avatar.remove', [ 'guard' => 'vendor', 'id' => $selected['id'] ]) }}"
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
            <div class="col-12 col--7 col-lg-8">
                <div class="card p-2">
                    <div class="card-body">
                        <h5 class="card-title">{{ ucfirst($selected['name']) }}</h5>
                        <p class="card-text">@lang('translate.createdAt') : {{ date_format($selected['created_at'], 'd-m-Y') }}</p>
                        <p class="card-text">@lang('translate.city') : {{ $selected['city'][$nameOnLang] }}</p>
                        <p class="card-text">@lang('translate.followers') : {{ count($selected['favorites']) }}</p>
                        <div class="d-inline-block">
                            <a href="#managers" class="pe-1">@lang('translate.managers')</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST"
                                          action="{{ route('vendors.update', $selected->id) }}"
                                          class="form form-vertical" enctype="multipart/form-data">
                                        @csrf @method('PUT')
                                        <div class="row mb-2">
                                            {{-- name --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="name">@lang('translate.name')</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="type"></i></span>
                                                    <input type="text" id="text" class="form-control"
                                                           value="{{ $selected['name'] }}"
                                                           name="name" placeholder="@lang('translate.name')"/>
                                                </div>
                                            </div>

                                            {{-- crn --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="crn">@lang('translate.crn')</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="hash"></i></span>
                                                    <input type="text" id="text" class="form-control"
                                                           value="{{ $selected['crn'] }}"
                                                           name="crn" placeholder="@lang('translate.crn')"/>
                                                </div>
                                            </div>

                                            {{-- owner name --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="owner_name">@lang('translate.ownerName')</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="feather"></i></span>
                                                    <input type="text" class="form-control"
                                                           value="{{ $selected['owner_name'] }}"
                                                           name="owner_name" placeholder="@lang('translate.ownerName')"/>
                                                </div>
                                            </div>

                                            {{-- username --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="username">@lang('translate.username')</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="type"></i></span>
                                                    <input type="text" id="text" class="form-control"
                                                           value="{{ $selected['username'] }}"
                                                           name="username" placeholder="@lang('translate.username')"/>
                                                </div>
                                            </div>

                                            {{-- phone --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="phone">@lang('translate.phone')</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather='phone'></i></span>
                                                    <input type="text" id="Phone" class="form-control" name="phone"
                                                           value="{{ $selected['phone'] }}"
                                                           placeholder="@lang('translate.phone')"/>
                                                </div>
                                            </div>

                                            {{-- email --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="email">@lang('translate.email')</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather='at-sign'></i></span>
                                                    <input type="email" id="email" class="form-control" name="email"
                                                           value="{{ $selected['email'] }}"
                                                           placeholder="email@example.com"/>
                                                </div>
                                            </div>

                                            {{-- priority --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="priority">@lang('translate.priority')</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather='dollar-sign'></i></span>
                                                    <select class="form-control" name="priority">
                                                        <option value="1" {{ $selected->priority == 1 ? 'selected' : '' }}>@lang('translate.high')</option>
                                                        <option value="2" {{ $selected->priority == 2 ? 'selected' : '' }}>@lang('translate.medium')</option>
                                                        <option value="3" {{ $selected->priority == 3 ? 'selected' : '' }}>@lang('translate.low')</option>
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- select city --}}
                                            <div class="col-md-6 col-sm-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="city">@lang('translate.city')</label>
                                                    <select id="editSelectedUser"
                                                            class="form-control" name="city"
                                                            data-search="true"
                                                            data-silent-initial-value-set="true">
                                                        <option value="" selected disabled>@lang('translate.select')</option>

                                                        @foreach($cities as $city)
                                                            <option value="{{ $city->id }}" {{ $selected->city->id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <script type="text/javascript">
                                                    VirtualSelect.init({
                                                        ele: '#editSelectedUser'
                                                    });
                                                </script>
                                            </div>

                                            {{-- delivery time --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label"
                                                       for="delivery_time">@lang('translate.deliveryTime')</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather='clock'></i></span>
                                                    <input type="text" class="form-control" value="{{ $selected->delivery_time }}"
                                                           name="delivery_time" placeholder="@lang('translate.deliveryTime')"/>
                                                </div>
                                            </div>

                                            {{-- delivery cost --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label"
                                                       for="delivery_cost">@lang('translate.deliveryCost')</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather='dollar-sign'></i></span>
                                                    <input type="text" class="form-control" value="{{ $selected->delivery_cost }}"
                                                           name="delivery_cost" placeholder="@lang('translate.deliveryCost')"/>
                                                </div>
                                            </div>

                                            {{-- Lang --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label"
                                                       for="phone">@lang('translate.defaultLang')</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather='globe'></i></span>
                                                    <select class="form-control" name="lang">
                                                        <option {{ $selected['lang'] == 'en' ? 'selected' : '' }} value="en">@lang('translate.en')</option>
                                                        <option {{ $selected['lang'] == 'ar' ? 'selected' : '' }} value="ar">@lang('translate.ar')</option>
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
                        <form method="POST" action="{{ route('password.change', ['guard' => 'vendor', 'id' => $selected['id']]) }}"
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

    <section id="managers">
        @include('dashboard.vendors.managers')
    </section>

    <script>
        document.getElementById('avatar').addEventListener('change', function () {
            document.getElementById('avatar_form').submit();
        });
    </script>
@endsection
