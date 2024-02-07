@extends('layouts.dashboard')
@section('title', __('translate.overview'))
@section('content')
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-12">
            <p class="navigation-header">
                <span style='font-size: 16px;'>@lang('translate.admins')</span>
            </p>
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <p class="card-text font-small-3 mb-0">@lang('translate.total')</p>
                        <h4 class="font-weight-bolder mb-0">1</h4>
                    </div>
                    <div class="text-center">
                        <p class="card-text font-small-3 mb-0">@lang('translate.active')</p>
                        <h4 class="font-weight-bolder mb-0">1</h4>
                    </div>
                    <div class="avatar bg-light-info p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="user"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-6 col-12">
            <p class="navigation-header">
                <span style='font-size: 16px;'>@lang('translate.vendors')</span>
            </p>
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <p class="card-text font-small-3 mb-0">@lang('translate.total')</p>
                        <h4 class="font-weight-bolder mb-0">1</h4>
                    </div>
                    <div class="text-center">
                        <p class="card-text font-small-3 mb-0">@lang('translate.active')</p>
                        <h4 class="font-weight-bolder mb-0">1</h4>
                    </div>
                    <div class="avatar bg-light-primary p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="home"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-6 col-12">
            <p class="navigation-header">
                <span style='font-size: 16px;'>@lang('translate.users')</span>
            </p>
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <p class="card-text font-small-3 mb-0">@lang('translate.total')</p>
                        <h4 class="font-weight-bolder mb-0">1</h4>
                    </div>
                    <div class="text-center">
                        <p class="card-text font-small-3 mb-0">@lang('translate.active')</p>
                        <h4 class="font-weight-bolder mb-0">1</h4>
                    </div>
                    <div class="avatar bg-light-primary p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-2">
        <h4>@lang('vendor-name')</h4>
    </div>
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <p class="card-text font-small-3 mb-0">@lang('translate.managers')</p>
                        <h4 class="font-weight-bolder mb-0">1</h4>
                    </div>
                    <div class="avatar bg-light-subtle p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="key"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <p class="card-text font-small-3 mb-0">@lang('translate.categories')</p>
                        <h4 class="font-weight-bolder mb-0">1</h4>
                    </div>
                    <div class="avatar bg-light-primary p-50 m-0">
                        <div class="avatar-content">
                            <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-layers">
                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                <polyline points="2 17 12 22 22 17"></polyline>
                                <polyline points="2 12 12 17 22 12"></polyline>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <p class="card-text font-small-3 mb-0">@lang('translate.subcategories')</p>
                        <h4 class="font-weight-bolder mb-0">1</h4>
                    </div>
                    <div class="avatar bg-light-danger p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="book-open"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <p class="card-text font-small-3 mb-0">@lang('translate.products')</p>
                        <h4 class="font-weight-bolder mb-0">1</h4>
                    </div>
                    <div class="avatar bg-light-secondary p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-2">
        <h4>@lang('vendor-name')</h4>
    </div>
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <p class="card-text font-small-3 mb-0">@lang('translate.managers')</p>
                        <h4 class="font-weight-bolder mb-0">1</h4>
                    </div>
                    <div class="avatar bg-light-subtle p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="key"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <p class="card-text font-small-3 mb-0">@lang('translate.categories')</p>
                        <h4 class="font-weight-bolder mb-0">1</h4>
                    </div>
                    <div class="avatar bg-light-primary p-50 m-0">
                        <div class="avatar-content">
                            <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-layers">
                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                <polyline points="2 17 12 22 22 17"></polyline>
                                <polyline points="2 12 12 17 22 12"></polyline>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <p class="card-text font-small-3 mb-0">@lang('translate.subcategories')</p>
                        <h4 class="font-weight-bolder mb-0">1</h4>
                    </div>
                    <div class="avatar bg-light-danger p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="book-open"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <p class="card-text font-small-3 mb-0">@lang('translate.products')</p>
                        <h4 class="font-weight-bolder mb-0">1</h4>
                    </div>
                    <div class="avatar bg-light-secondary p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
