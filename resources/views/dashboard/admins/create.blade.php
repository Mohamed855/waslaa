@extends('layouts.dashboard')
@section('title', __('translate.add') . ' ' . __('translate.admin'))
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-12 col-12 m-auto">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admins.store') }}" class="form form-vertical" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-2">
                                {{-- name --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="name">@lang('translate.name') <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="type"></i></span>
                                        <input type="text" class="form-control" name="name" placeholder="@lang('translate.name')"/>
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
                                {{-- Phone --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="phone">@lang('translate.phone') <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather='phone'></i></span>
                                        <input type="text" class="form-control" name="phone" onkeypress="return isNumberKey(event)" placeholder="01×××××××××"/>
                                    </div>
                                </div>
                                {{-- password --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="password">@lang('translate.password') <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather='lock'></i></span>
                                        <input type="password" class="form-control" name="password" placeholder="@lang('translate.password')"/>
                                    </div>
                                </div>
                                {{-- avatar --}}
                                <div class="col-md-6 col-sm-12 mb-1">
                                    <label class="form-label" for="avatar">@lang('translate.avatar')</label>
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
