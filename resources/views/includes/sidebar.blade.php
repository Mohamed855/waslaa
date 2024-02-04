<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand">
                    <h2 class="brand-text">{{ env('APP_NAME') }}</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0"
                                               data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4"
                                                                            data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
                        data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ request()->routeIs('admin.overview') ? 'active':'' }}">
                <a class="nav-link d-flex align-items-center" href="{{ route('admin.overview') }}">
                    <i data-feather="activity"></i>
                    @lang('translate.overview')
                </a>
            </li>
            <li class=" nav-item {{ request()->routeIs('ads.index') ? 'active':'' }}">
                <a class="nav-link d-flex align-items-center" href="{{ route('ads.index') }}">
                    <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-zap">
                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                    </svg>
                    @lang('translate.ads')
                </a>
            </li>
            <li class=" nav-item {{ request()->routeIs('admins.index') || request()->routeIs('admins.create') || request()->routeIs('admins.edit') ? 'active':'' }}">
                <a class="nav-link d-flex align-items-center" href="{{ route('admins.index') }}">
                    <i data-feather="user"></i>
                    @lang('translate.admins')
                </a>
            </li>
            <li class=" nav-item {{ request()->routeIs('users.index') || request()->routeIs('users.show') ? 'active':'' }}">
                <a class="nav-link d-flex align-items-center" href="{{ route('users.index') }}">
                    <i data-feather="users"></i>
                    @lang('translate.users')
                </a>
            </li>
            <li class=" nav-item {{ request()->routeIs('vendors.index') || request()->routeIs('vendors.create') || request()->routeIs('vendors.edit') ? 'active':'' }}">
                <a class="nav-link d-flex align-items-center" href="{{ route('vendors.index') }}">
                    <i data-feather="home"></i>
                    @lang('translate.vendors')
                </a>
            </li>
            <li class=" nav-item {{ request()->routeIs('settings') ? 'active':'' }}">
                <a class="nav-link d-flex align-items-center" href="{{ route('settings') }}">
                    <i data-feather="settings"></i>
                    @lang('translate.settings')
                </a>
            </li>

            <li class="navigation-header">
                <span style='font-size: 16px;'>@lang('translate.sections')</span>
            </li>
            <li class=" nav-item {{ request()->routeIs('categories.index') || request()->routeIs('categories.create') || request()->routeIs('categories.edit') ? 'active':'' }}">
                <a class="nav-link d-flex align-items-center" href="{{ route('categories.index') }}">
                    <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-layers">
                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                        <polyline points="2 17 12 22 22 17"></polyline>
                        <polyline points="2 12 12 17 22 12"></polyline>
                    </svg>
                    @lang('translate.categories')
                </a>
            </li>
            <li class=" nav-item {{ request()->routeIs('subcategories.index') || request()->routeIs('subcategories.create') || request()->routeIs('subcategories.edit') ? 'active':'' }}">
                <a class="nav-link d-flex align-items-center" href="{{ route('subcategories.index') }}">
                    <i data-feather="book-open"></i>
                    @lang('translate.subcategories')
                </a>
            </li>

            <li class="navigation-header">
                <span style='font-size: 16px;'>@lang('translate.vendors')</span>
            </li>

            @for($i = 1; $i <= 15; $i++)
                <li class=" nav-item {{ request()->routeIs('vendors.show') ? 'active':'' }}">
                    <a class="nav-link d-flex align-items-center" href="">
                        <i>{{ $i }}</i>
                        vendor-name
                    </a>
                </li>
            @endfor


            <li class="navigation-header">
                <span style='font-size: 16px;'>@lang('translate.orders')</span>
            </li>
            <li class=" nav-item {{ request()->routeIs('orders.ordered') ? 'active':'' }}">
                <a class="nav-link d-flex align-items-center" href="">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 294.842 294.842" style="enable-background:new 0 0 294.842 294.842;"
                         xml:space="preserve">
                            <g>
                                <path
                                    d="M292.128,214.846c-2.342-2.344-6.143-2.344-8.484,0l-59.512,59.511V6c0-3.313-2.687-6-6-6s-6,2.687-6,6v268.356
                           l-59.513-59.512c-2.342-2.342-6.142-2.343-8.485,0.001c-2.343,2.343-2.343,6.142,0.001,8.485l69.755,69.754
                           c1.171,1.171,2.707,1.757,4.242,1.757s3.071-0.586,4.242-1.758l69.754-69.754C294.472,220.987,294.472,217.188,292.128,214.846z" />
                                <path
                                    d="M6.956,12h180.137c3.313,0,6-2.687,6-6s-2.687-6-6-6H6.956c-3.313,0-6,2.687-6,6S3.643,12,6.956,12z" />
                                <path
                                    d="M6.956,82.228h180.137c3.313,0,6-2.687,6-6s-2.687-6-6-6H6.956c-3.313,0-6,2.687-6,6S3.643,82.228,6.956,82.228z" />
                                <path
                                    d="M6.956,152.456h180.137c3.313,0,6-2.687,6-6s-2.687-6-6-6H6.956c-3.313,0-6,2.687-6,6S3.643,152.456,6.956,152.456z" />
                                <path
                                    d="M124.438,210.685H6.956c-3.313,0-6,2.687-6,6s2.687,6,6,6h117.482c3.313,0,6-2.687,6-6S127.752,210.685,124.438,210.685z" />
                                <path
                                    d="M124.438,280.912H6.956c-3.313,0-6,2.687-6,6s2.687,6,6,6h117.482c3.313,0,6-2.687,6-6S127.752,280.912,124.438,280.912z" />
                            </g>
                        </svg>
                    @lang('translate.ordered')
                </a>
            </li>
            <li class=" nav-item {{ request()->routeIs('orders.delivered') ? 'active':'' }}">
                <a class="nav-link d-flex align-items-center" href="">
                    <i data-feather="check"></i>
                    @lang('translate.delivered')
                </a>
            </li>
            <li class=" nav-item {{ request()->routeIs('orders.canceled') ? 'active':'' }}">
                <a class="nav-link d-flex align-items-center" href="">
                    <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-folder-minus">
                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z">
                        </path>
                        <line x1="9" y1="14" x2="15" y2="14"></line>
                    </svg>
                    @lang('translate.canceled')
                </a>
            </li>
            <li class="navigation-header">
                <span style='font-size: 16px;'>@lang('translate.locations')</span>
            </li>
            <li class=" nav-item {{ request()->routeIs('countries.index') ? 'active':'' }}">
                <a class="nav-link d-flex align-items-center" href="{{ route('countries.index') }}">
                    <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-map">
                        <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                        <line x1="8" y1="2" x2="8" y2="18"></line>
                        <line x1="16" y1="6" x2="16" y2="22"></line>
                    </svg>
                    @lang('translate.countries')
                </a>
            </li>
            <li class=" nav-item {{ request()->routeIs('cities.index') ? 'active':'' }}">
                <a class="nav-link d-flex align-items-center" href="{{ route('cities.index') }}">
                    <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-map-pin">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    @lang('translate.cities')
                </a>
            </li>
        </ul>
    </div>
</div>
