<!-- ========== Topbar Start ========== -->
<div class="navbar-custom">
    <div class="topbar px-2">
        <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">

            <!-- Topbar Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a href="#" class="logo-light">
                    <img src="{{ asset('storage/assets/images/logo-light.png') }}" alt="logo" class="logo-lg">
                    <img src="{{ asset('storage/assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm">
                </a>

                <!-- Brand Logo Dark -->
                <a href="#" class="logo-dark">
                    <img src="{{ asset('storage/assets/images/logo-dark.png') }}" alt="dark logo" class="logo-lg">
                    <img src="{{ asset('storage/assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm">
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Topbar Search Form -->
            <li class="app-search dropdown d-none d-lg-block">
                <form>
                    <input type="search" class="form-control" placeholder="Search...">
                    <span class="mdi mdi-magnify search-icon font-22"></span>
                </form>
            </li>
        </div>

        <ul class="topbar-menu d-flex align-items-center gap-3">

            <li class="d-none d-md-inline-block">
                <a class="nav-link" href="" data-toggle="fullscreen">
                    <i class="fa-solid fa-expand"></i>
                </a>
            </li>

            <li class="dropdown d-lg-none">
                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                    <form class="p-3">
                        <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                    </form>
                </div>
            </li>

            <li class="dropdown d-none d-md-inline-block">
                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('storage/assets/images/flags/us.jpg') }}" alt="user-image" class="me-0 me-sm-1" height="18">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{ asset('storage/assets/images/flags/germany.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{ asset('storage/assets/images/flags/italy.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{ asset('storage/assets/images/flags/spain.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{ asset('storage/assets/images/flags/russia.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                    </a>

                </div>
            </li>


            <li class="d-inline-flex">
                <div class="nav-link" id="light-dark-mode">
                    <i class="fa-solid fa-moon"></i>
                </div>
            </li>

            <li>
                <a class="nav-link waves-effect waves-light" data-bs-toggle="offcanvas" href="#theme-settings-offcanvas">
                    <i class="fa-solid fa-gear"></i>
                </a>
            </li>

            <li class="dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('storage/assets/images/users/avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
                    <span class="ms-1 d-none d-md-inline-block">
                        Daniel <i class="fa-solid fa-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="pages-profile.html" class="dropdown-item notify-item">
                        <i class="fa-solid fa-user"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fa-solid fa-user-gear"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="auth-lock-screen.html" class="dropdown-item notify-item">
                        <i class="fa-regular fa-lock"></i>
                        <span>Lock Screen</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="auth-logout.html" class="dropdown-item notify-item">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>
        </ul>
    </div>
</div>
<!-- ========== Topbar End ========== -->
