<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                                                                                 data-feather="menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav align-items-center ms-auto d-none d-lg-block">
                <li class="nav-item me-25">
                    <div class="display-date" style="color:#4084c4">
                        <span id="day">day</span>,
                        <span id="daynum">00</span>
                        <span id="month">month</span>
                        <span id="year">0000</span>
                        <span class="display-time"></span>
                    </div>
                </li>
            </ul>
        </div>


        <ul class="nav navbar-nav align-items-center ms-auto">
            <ul class="d-flex" type="none">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a class="dropdown-item" hreflang="{{ $localeCode }}"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            @if ($localeCode == 'en')
                                <i class="flag-icon flag-icon-us"></i>
                                <span class="selected-language">@lang('translate.en')</span>
                            @else
                                <i class="flag-icon flag-icon-sa"></i>
                                <span class="selected-language">@lang('translate.ar')</span>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- search --}}
            <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#" data-bs-toggle="dropdown">
                    <i class="ficon" data-feather="search"></i><span id="notification_number"></span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <form class="p-2">
                        <input type="text" class="form-control" placeholder="@lang('translate.search')" name="search">
                        <button class="position-absolute end-0 mx-2 px-1 btn btn-link" style="top: 26.5%">
                            <i data-feather="search"></i>
                        </button>
                    </form>
                </ul>
            </li>
            {{-- search --}}

            {{-- ntf --}}
            <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#"
                                                                         data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span
                        id="notification_number">

                        </span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 me-auto">@lang('translate.notifications')</h4>

                        </div>
                    </li>

                    {{-- order number --}}
                    <li class="scrollable-container media-list" id="order_data">

                    </li>
                    {{-- order number --}}
                    <li class="dropdown-menu-footer"><a class="btn btn-primary w-100"
                                                        href="">@lang('translate.seeAllTheNotifications')</a></li>
                </ul>
            </li>
            {{-- ntf --}}

            <li class="nav-item me-25 FullScreenMode">
                <a class="nav-link" href="#" data-bs-toggle="dropdown">
                    <i class="ficon" data-feather="airplay"></i>
                </a>
            </li>

            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user"
                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        @php
                            $guard = \App\Helpers\DashboardHelper::getCurrentGuard();
                        @endphp
                        <span class="user-name fw-bolder">{{ ucfirst(explode(' ', auth($guard)->name)[0]) }}</span>
                        <span class="user-status">{{ ucfirst($guard) }}</span>
                    </div>
                    <span class="avatar">
                            <img class="round" height="40" width="40" src="{{ asset(auth($guard)->user()->avatar ? 'storage/images/' . $guard . 's/' . auth($guard)->user()->avatar : 'storage/images/global/profile.jpg') }}">
                        </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{ route('profile') }}">
                        <i class="me-50" data-feather="settings"></i>
                        @lang('translate.profileSettings')
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('signOut') }}">
                        <i class="me-50" data-feather="log-out"></i>
                        @lang('translate.logout')
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
