@extends('layouts.dashboard')
@section('title', __('translate.add') . ' ' . __('translate.vendor'))
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-12 col-12 m-auto">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('vendors.store') }}" class="form form-vertical" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-2">
                                <input type="hidden" name="added_by" value="{{ auth('admin')->id() }}">
                                {{-- name --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="name">@lang('translate.name') <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="type"></i></span>
                                        <input type="text" class="form-control" name="name" placeholder="@lang('translate.name')"/>
                                    </div>
                                </div>
                                {{-- crn --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="crn">@lang('translate.crn') <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="hash"></i></span>
                                        <input type="text" class="form-control" name="crn" placeholder="@lang('translate.crn')"/>
                                    </div>
                                </div>
                                {{-- owner name --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="owner_name">@lang('translate.ownerName') <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="feather"></i></span>
                                        <input type="text" class="form-control" name="owner_name" placeholder="@lang('translate.ownerName')"/>
                                    </div>
                                </div>
                                {{-- phone --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="phone">@lang('translate.phone') <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather='phone'></i></span>
                                        <input type="text" class="form-control" name="phone" onkeypress="return isNumberKey(event)" placeholder="01×××××××××"/>
                                    </div>
                                </div>
                                {{-- email --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="email">@lang('translate.email') <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather='at-sign'></i></span>
                                        <input type="email" class="form-control" name="email" placeholder="email@example.com"/>
                                    </div>
                                </div>
                                {{-- password --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="password">@lang('translate.password') <span class="text-danger">*</span></label>
                                    <div class="position-relative">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="@lang('translate.password')"/>
                                        <button class="btn btn-link position-absolute text-muted password-addon top-0 end-0" type="button" onclick="togglePasswordVisibility()">
                                            <i id="eyeIcon" data-feather="eye"></i>
                                        </button>
                                    </div>
                                </div>
                                {{-- select city --}}
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="city">@lang('translate.city') <span class="text-danger">*</span></label>
                                        <select id="editSelectedUser"
                                                class="form-control" name="city"
                                                data-search="true"
                                                data-silent-initial-value-set="true">
                                            <option value="" selected disabled>@lang('translate.select')</option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
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
                                    <label class="form-label" for="delivery_time">@lang('translate.deliveryTime') <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather='clock'></i></span>
                                        <input type="text" class="form-control" name="delivery_time" placeholder="@lang('translate.deliveryTime')"/>
                                    </div>
                                </div>
                                {{-- delivery cost --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="delivery_cost">@lang('translate.deliveryCost') <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather='dollar-sign'></i></span>
                                        <input type="text" class="form-control" name="delivery_cost" placeholder="@lang('translate.deliveryCost')"/>
                                    </div>
                                </div>
                                {{-- avatar --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="avatar">@lang('translate.avatar') <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="file" class="form-control" name="avatar"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-2 d-flex">
                                    <button type="submit" class="btn btn-success w-100"
                                            style="min-width: 120px">@lang('translate.create')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
