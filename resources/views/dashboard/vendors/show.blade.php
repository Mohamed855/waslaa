@extends('layouts.dashboard')
@section('title', ucfirst($selected['username']) . '\'s profile' )
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-12 col--5 col-lg-4">
                <div class="card">
                    <img src="{{ asset($selected['avatar'] ? 'storage/images/vendors/' . $selected['avatar'] : 'storage/images/global/profile.jpg') }}" class="card-img-top profile-image" alt="profile image">
                    <div class="card-body">
                        <div class="row">
                            @if ($selected['avatar'] == 'default.jpg')
                                <form action="{{ route('avatar.update', [ 'guard' => 'vendor', 'id' => $selected['id'] ]) }}" id="avatar_form" method="post" enctype="multipart/form-data" class="cursor-pointer">
                                    @csrf
                                    <label class="btn col-12 btn-success">
                                        <input type="file" name="avatar" id="avatar" class="d-none" accept=".png,.jpg">
                                        @lang('translate.add')
                                    </label>
                                </form>
                            @else
                                <div class="row justify-content-between m-auto">
                                    <form action="{{ route('avatar.update', [ 'guard' => 'vendor', 'id' => $selected['id'] ]) }}" id="avatar_form" method="post" enctype="multipart/form-data" class="d-inline cursor-pointer pb-1 col-12">
                                        @csrf
                                        <label class="btn w-100 btn-primary">
                                            <input type="file" name="avatar" id="avatar" class="d-none" accept=".png,.jpg">
                                            <i data-feather="edit"></i>
                                            @lang('translate.edit')
                                        </label>
                                    </form>
                                    <form action="{{ route('avatar.remove', [ 'guard' => 'vendor', 'id' => $selected['id'] ]) }}" method="post" class="d-inline cursor-pointer col-12">
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
                        <h5 class="card-title">{{ ucfirst($selected['name']) . ' (' . $selected->username . ')' }}</h5>
                        <p class="card-text">@lang('translate.createdAt') : {{ date_format($selected['created_at'], 'd-m-Y') }}</p>
                        <p class="card-text">@lang('translate.city') : {{ $selected['city'][$nameOnLang] }}</p>
                        <p class="card-text">@lang('translate.followers') : {{ count($selected['favorites']) }}</p>
                        <div class="row">
                            <div class="d-inline-block pt-1 col-6 col-md-3">
                                <a href="{{ route('vendorManagers', $selected->username) }}" class="pe-1">@lang('translate.managers')</a>
                            </div>
                            <div class="d-inline-block pt-1 col-6 col-md-3">
                                <a href="{{ route('vendorInvoices', $selected->username) }}" class="pe-1">@lang('translate.invoices')</a>
                            </div>
                            <div class="d-inline-block pt-1 col-6 col-md-3">
                                <a href="{{ route('vendorOrders', $selected->username) }}" class="pe-1">@lang('translate.orders')</a>
                            </div>
                            <div class="d-inline-block pt-1 col-6 col-md-3">
                                <a href="{{ route('vendorCategories', $selected->username) }}" class="pe-1">@lang('translate.categories')</a>
                            </div>
                            <div class="d-inline-block pt-1 col-6 col-md-3">
                                <a href="{{ route('vendorSubcategories', $selected->username) }}" class="pe-1">@lang('translate.subcategories')</a>
                            </div>
                            <div class="d-inline-block pt-1 col-6 col-md-3">
                                <a href="{{ route('vendorProducts', $selected->username) }}" class="pe-1">@lang('translate.products')</a>
                            </div>
                            <div class="d-inline-block pt-1 col-6 col-md-3">
                                <a href="{{ route('vendorComponents', $selected->username) }}" class="pe-1">@lang('translate.components')</a>
                            </div>
                            <div class="d-inline-block pt-1 col-6 col-md-3">
                                <a href="{{ route('vendorTypes', $selected->username) }}" class="pe-1">@lang('translate.types')</a>
                            </div>
                            <div class="d-inline-block pt-1 col-6 col-md-3">
                                <a href="{{ route('vendorComplains', $selected->username) }}" class="pe-1">@lang('translate.complains')</a>
                            </div>
                            <div class="d-inline-block pt-1 col-6 col-md-3">
                                <a href="{{ route('vendorAddresses', $selected->username) }}" class="pe-1">@lang('translate.addresses')</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('vendors.update', $selected->id) }}" class="form form-vertical" enctype="multipart/form-data">
                                        @csrf @method('PUT')
                                        <div class="row mb-2">
                                            {{-- name --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="name">@lang('translate.name') <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="type"></i></span>
                                                    <input type="text" id="text" class="form-control" value="{{ $selected['name'] }}" name="name" placeholder="@lang('translate.name')"/>
                                                </div>
                                            </div>
                                            {{-- crn --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="crn">@lang('translate.crn') <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="hash"></i></span>
                                                    <input type="text" id="text" class="form-control" value="{{ $selected['crn'] }}" name="crn" placeholder="@lang('translate.crn')"/>
                                                </div>
                                            </div>
                                            {{-- owner name --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="owner_name">@lang('translate.ownerName') <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="feather"></i></span>
                                                    <input type="text" class="form-control" value="{{ $selected['owner_name'] }}" name="owner_name" placeholder="@lang('translate.ownerName')"/>
                                                </div>
                                            </div>
                                            {{-- username --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="username">@lang('translate.username') <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="type"></i></span>
                                                    <input type="text" id="text" class="form-control" value="{{ $selected['username'] }}" name="username" placeholder="@lang('translate.username')"/>
                                                </div>
                                            </div>
                                            {{-- phone --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="phone">@lang('translate.phone') <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather='phone'></i></span>
                                                    <input type="text" id="Phone" class="form-control" name="phone" onkeypress="return isNumberKey(event)" value="{{ $selected['phone'] }}" placeholder="01×××××××××"/>
                                                </div>
                                            </div>
                                            {{-- email --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="email">@lang('translate.email') <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather='at-sign'></i></span>
                                                    <input type="email" id="email" class="form-control" name="email" value="{{ $selected['email'] }}" placeholder="email@example.com"/>
                                                </div>
                                            </div>
                                            {{-- priority --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="priority">@lang('translate.priority') <span class="text-danger">*</span></label>
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
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="city">@lang('translate.city') <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                        <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-map-pin">
                                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                            <circle cx="12" cy="10" r="3"></circle>
                                                        </svg>
                                                    </span>
                                                    <select id="selectedCity" class="form-control">
                                                        <option selected disabled>@lang('translate.select')</option>
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}" {{ $selected->city_id == $city->id ? 'selected' : '' }}>{{ $city->$nameOnLang }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <script type="text/javascript">
                                                VirtualSelect.init({
                                                    ele: '#selectedCity',
                                                    search: true
                                                });
                                            </script>
                                            {{-- delivery time --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="delivery_time">@lang('translate.deliveryTime') <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather='clock'></i></span>
                                                    <input type="text" class="form-control" value="{{ $selected->delivery_time }}" name="delivery_time" placeholder="@lang('translate.deliveryTime')"/>
                                                </div>
                                            </div>
                                            {{-- delivery cost --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="delivery_cost">@lang('translate.deliveryCost') <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather='dollar-sign'></i></span>
                                                    <input type="text" class="form-control" value="{{ $selected->delivery_cost }}" name="delivery_cost" placeholder="@lang('translate.deliveryCost')"/>
                                                </div>
                                            </div>
                                            {{-- Lang --}}
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="phone">@lang('translate.defaultLang') <span class="text-danger">*</span></label>
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
                                                <button type="submit" class="btn btn-primary w-100" style="min-width: 180px">@lang('translate.save')</button>
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
                        <form method="POST" action="{{ route('password.change', ['guard' => 'vendor', 'id' => $selected['id']]) }}" class="form form-vertical">
                            @csrf
                            <div class="row mb-2">
                                {{-- new password --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="password">@lang('auth.password')</label>
                                    <div class="position-relative">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="@lang('auth.password')"/>
                                        <button class="btn btn-link position-absolute text-muted password-addon top-0 end-0" type="button" onclick="togglePasswordVisibility()">
                                            <i id="eyeIcon" data-feather="eye"></i>
                                        </button>
                                    </div>
                                </div>
                                {{-- password confirmation --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="password_confirmation">@lang('auth.confirmPassword')</label>
                                    <div class="position-relative">
                                        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="@lang('auth.confirmPassword')"/>
                                        <button class="btn btn-link position-absolute text-muted end-0 top-0" type="button" onclick="toggleConfirmPasswordVisibility()">
                                            <i id="eyeConfirmIcon" data-feather="eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-2 d-flex">
                                    <button type="submit" class="btn btn-primary w-100" style="min-width: 180px">@lang('translate.changePassword')</button>
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
