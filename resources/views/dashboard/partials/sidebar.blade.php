<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand">
                    <h2 class="brand-text">{{ env('APP_NAME') }}</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc">
                    </i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ request()->routeIs(['adminOverview', 'vendorOverview']) ? 'active' : '' }}">
                <a class="nav-link d-flex align-items-center" href="{{ auth('admin')->check() ? route('adminOverview') : route('vendorOverview') }}">
                    <i data-feather="activity"></i>
                    @lang('translate.overview')
                </a>
            </li>

            @if (auth('admin')->check())
                <li class="nav-item {{ request()->routeIs('ads.index') ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('ads.index') }}">
                        <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-zap">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        @lang('translate.ads')
                    </a>
                </li>
            @endif

            @if (auth('admin')->check() || auth('vendor')->check())
                <li class="nav-item {{ request()->routeIs(['notifications.index', 'notifications.create', 'notifications.edit']) ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('notifications.index') }}">
                        <i data-feather="bell"></i>
                        @lang('translate.notifications')
                    </a>
                </li>
            @endif

            @if (auth('admin')->check() || auth('vendor')->check())
                <li class="nav-item {{ request()->routeIs('complains.index') ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('complains.index') }}">
                        <i data-feather="file"></i>
                        @lang('translate.complains')
                    </a>
                </li>
            @endif

            @if (auth('admin')->check() || auth('vendor')->check())
                <li class="nav-item {{ request()->routeIs('settings') ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('settings') }}">
                        <i data-feather="settings"></i>
                        @lang('translate.settings')
                    </a>
                </li>
            @endif

            <li class="navigation-header">
                <span style='font-size: 16px;'>@lang('translate.users')</span>
            </li>

            @if (auth('admin')->check())
                <li class="nav-item {{ request()->routeIs(['admins.index', 'admins.create', 'admins.edit']) ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('admins.index') }}">
                        <i data-feather="user"></i>
                        @lang('translate.admins')
                    </a>
                </li>
            @endif

            @if (auth('admin')->check() || auth('vendor')->check())
                <li class="nav-item {{ request()->routeIs(['users.index', 'showUser']) ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('users.index') }}">
                        <i data-feather="users"></i>
                        @lang('translate.users')
                    </a>
                </li>
            @endif

            @if (auth('admin')->check())
                <li class="nav-item {{ request()->routeIs(['vendors.index', 'vendors.create', 'vendors.edit']) ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('vendors.index') }}">
                        <i data-feather="home"></i>
                        @lang('translate.vendors')
                    </a>
                </li>
            @endif

            @if (auth('vendor')->check())
                <li class="nav-item {{ request()->routeIs(['managers.index', 'managers.create', 'managers.edit']) ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('managers.index') }}">
                        <i data-feather="key"></i>
                        @lang('translate.managers')
                    </a>
                </li>
            @endif

            @if (auth('admin')->check() || auth('vendor')->check())
                @php
                    $orderStatus = $invoiceStatus = '';
                    if (request()->routeIs('orders.show')) {
                        $orderStatus = $selected->status;
                    }
                    if (request()->routeIs('invoices.show')) {
                        $invoiceStatus = $selected->status;
                    }
                @endphp

                <li class="navigation-header">
                    <span style='font-size: 16px;'>@lang('translate.orders')</span>
                </li>
                <li class="nav-item {{ request()->routeIs('ordered') || $orderStatus === 'ordered' ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('ordered') }}">
                        <i data-feather="list"></i>
                        @lang('translate.ordered')
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('accepted') || $orderStatus === 'accepted' ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('accepted') }}">
                        <i data-feather="check"></i>
                        @lang('translate.accepted')
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('canceled') || $orderStatus === 'canceled' ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('canceled') }}">
                        <i data-feather="x-octagon"></i>
                        @lang('translate.canceled')
                    </a>
                </li>

                <li class="navigation-header">
                    <span style='font-size: 16px;'>@lang('translate.invoices')</span>
                </li>
                <li class="nav-item {{ request()->routeIs('opened') || $invoiceStatus === 'opened' ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('opened') }}">
                        <i data-feather="square"></i>
                        @lang('translate.opened')
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('closed') || $invoiceStatus === 'closed' ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('closed') }}">
                        <i data-feather="minus-square"></i>
                        @lang('translate.closed')
                    </a>
                </li>
                <li
                    class="nav-item {{ request()->routeIs('collected') || $invoiceStatus === 'collected' ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('collected') }}">
                        <i data-feather="check-square"></i>
                        @lang('translate.collected')
                    </a>
                </li>
            @endif

            @if (auth('admin')->check())
                <li class="navigation-header">
                    <span style='font-size: 16px;'>@lang('translate.vendors')</span>
                </li>
                @foreach (\App\Models\Vendor::query()->where('active', 1)->get(['id', 'name', 'username', 'avatar']) as $vendor)
                    <li
                        class="nav-item {{ request()->getRequestUri() === str_replace(url('/'), '', route('showVendor', $vendor->username)) ? 'active' : '' }}">
                        <a class="nav-link d-flex align-items-center"
                            href="{{ route('showVendor', $vendor->username) }}">
                            <img class="avatar avatar-sm me-1" style="width: 25px; height: 25px"
                                src="{{ asset($vendor->avatar ? 'storage/images/vendors/' . $vendor->avatar : 'storage/images/global/profile.jpg') }}" />
                            {{ ucfirst($vendor->name) }}
                        </a>
                    </li>
                @endforeach
            @endif

            @if (auth('admin')->check() || auth('vendor')->check())
                <li class="navigation-header">
                    <span style='font-size: 16px;'>@lang('translate.sections')</span>
                </li>
                <li class="nav-item {{ request()->routeIs('categories.index') ? 'active' : '' }}">
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
            @endif

            @if (auth('vendor')->check())
                <li class="nav-item {{ request()->routeIs('subcategories.index') ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('subcategories.index') }}">
                        <i data-feather="book-open"></i>
                        @lang('translate.subcategories')
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs(['products.index', 'products.show']) ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('products.index') }}">
                        <i data-feather="shopping-cart"></i>
                        @lang('translate.products')
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('components.index') ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('components.index') }}">
                        <i data-feather="command"></i>
                        @lang('translate.components')
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('types.index') ? 'active' : '' }}">
                    <a class="nav-link d-flex align-items-center" href="{{ route('types.index') }}">
                        <i data-feather="radio"></i>
                        @lang('translate.types')
                    </a>
                </li>
            @endif

            @if (auth('admin')->check())
                <li class="nav-item {{ request()->routeIs('countries.index') ? 'active' : '' }}">
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
                <li class="nav-item {{ request()->routeIs('cities.index') ? 'active' : '' }}">
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
            @endif
        </ul>
    </div>
</div>
