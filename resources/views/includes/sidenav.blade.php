<div class="app-sidenav">

    <!-- Brand Logo -->
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

    <!--- Menu -->
    <div class="h-100" data-simplebar>
        <ul class="menu">

            <li class="menu-title">Navigation</li>

            <li class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i data-feather="home"></i></span>
                    <span class="menu-text"> Dashboard </span>
                    <span class="badge bg-success rounded ms-auto">01</span>
                </a>
            </li>

            <li class="menu-title">Apps</li>

            <li class="menu-item">
                <a href="apps-calendar.html" class="menu-link">
                    <span class="menu-icon"><i data-feather="calendar"></i></span>
                    <span class="menu-text"> Calendar </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="#ecommerce" data-bs-toggle="collapse" class="menu-link">
                    <span class="menu-icon"><i data-feather="shopping-cart"></i></span>
                    <span class="menu-text"> Ecommerce </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="ecommerce">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="apps-ecommerce-product.html" class="menu-link">
                                <span class="menu-text">Products</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="apps-ecommerce-product-create.html" class="menu-link">
                                <span class="menu-text">Product Create</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="apps-ecommerce-product-edit.html" class="menu-link">
                                <span class="menu-text">Product Edit</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="apps-ecommerce-products-details.html" class="menu-link">
                                <span class="menu-text">Product Details</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="apps-ecommerce-order.html" class="menu-link">
                                <span class="menu-text">Order</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="apps-ecommerce-orders-details.html" class="menu-link">
                                <span class="menu-text">Order Details</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#invoice" data-bs-toggle="collapse" class="menu-link">
                    <span class="menu-icon"><i data-feather="file-text"></i></span>
                    <span class="menu-text"> Invoice </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="invoice">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="apps-invoice-report.html" class="menu-link">
                                <span class="menu-text">Invoice Report</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="apps-invoice.html" class="menu-link">
                                <span class="menu-text">Invoice</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="menu-title">Pages</li>

            <li class="menu-item">
                <a href="#menuExpages" data-bs-toggle="collapse" class="menu-link">
                    <span class="menu-icon"><i data-feather="book"></i></span>
                    <span class="menu-text"> Extra Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuExpages">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="pages-starter.html" class="menu-link">
                                <span class="menu-text">Starter</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="pages-profile.html" class="menu-link">
                                <span class="menu-text">Profile</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="pages-contact-list.html" class="menu-link">
                                <span class="menu-text">Contact List</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="pages-pricing.html" class="menu-link">
                                <span class="menu-text">Pricing</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="pages-faq.html" class="menu-link">
                                <span class="menu-text">FAQ</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="pages-timeline.html" class="menu-link">
                                <span class="menu-text">Timeline</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="error-404.html" class="menu-link">
                                <span class="menu-text">Error 404</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="error-404-alt.html" class="menu-link">
                                <span class="menu-text">Error 404 Alt</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="error-500.html" class="menu-link">
                                <span class="menu-text">Error 500</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#authPages" data-bs-toggle="collapse" class="menu-link">
                    <span class="menu-icon"><i data-feather="users"></i></span>
                    <span class="menu-text"> Auth Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="authPages">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="auth-login.html" class="menu-link">
                                <span class="menu-text">Sign In</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="auth-register.html" class="menu-link">
                                <span class="menu-text">Sign Up</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="auth-logout.html" class="menu-link">
                                <span class="menu-text">Logout</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="auth-forgotpw.html" class="menu-link">
                                <span class="menu-text">Forgot Password</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="auth-lock-screen.html" class="menu-link">
                                <span class="menu-text">Lock Screen</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuLayouts" data-bs-toggle="collapse" class="menu-link">
                    <span class="menu-icon"><i data-feather="layers"></i></span>
                    <span class="menu-text"> Layouts </span>
                    <span class="badge bg-blue ms-auto">New</span>
                </a>
                <div class="collapse" id="menuLayouts">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="layouts-light-sidebar.html" target="_blank" class="menu-link">
                                <span class="menu-text">Light Sidebar</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="layouts-compact-sidebar.html" target="_blank" class="menu-link">
                                <span class="menu-text">Compact Sidebar</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="layouts-small-sidebar.html" target="_blank" class="menu-link">
                                <span class="menu-text">Small Sidebar</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="layouts-overlay-sidebar.html" target="_blank" class="menu-link">
                                <span class="menu-text">Overlay Sidebar</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="layouts-hidden-sidebar.html" target="_blank" class="menu-link">
                                <span class="menu-text">Hidden Sidebar</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="layouts-default-mode.html" target="_blank" class="menu-link">
                                <span class="menu-text">Default Mode</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-title">Components</li>

            <li class="menu-item">
                <a href="#menuUIElements" data-bs-toggle="collapse" class="menu-link">
                    <span class="menu-icon"><i data-feather="target"></i></span>
                    <span class="menu-text"> UI Elements</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuUIElements">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="ui-accordions.html" class="menu-link">
                                <span class="menu-text">Accordions</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-alerts.html" class="menu-link">
                                <span class="menu-text">Alert</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-avatars.html" class="menu-link">
                                <span class="menu-text">Avatars</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-buttons.html" class="menu-link">
                                <span class="menu-text">Buttons</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-badges.html" class="menu-link">
                                <span class="menu-text">Badges</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-breadcrumb.html" class="menu-link">
                                <span class="menu-text">Breadcrumb</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-cards.html" class="menu-link">
                                <span class="menu-text">Cards</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-carousel.html" class="menu-link">
                                <span class="menu-text">Carousel</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-collapse.html" class="menu-link">
                                <span class="menu-text">Collapse</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-dropdowns.html" class="menu-link">
                                <span class="menu-text">Dropdowns</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-embed-video.html" class="menu-link">
                                <span class="menu-text">Embed Video</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-links.html" class="menu-link">
                                <span class="menu-text">Links</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui-list-group.html" class="menu-link">
                                <span class="menu-text">List Group</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-modals.html" class="menu-link">
                                <span class="menu-text">Modals</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-notifications.html" class="menu-link">
                                <span class="menu-text">Notifications</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-offcanvas.html" class="menu-link">
                                <span class="menu-text">Offcanvas</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-placeholders.html" class="menu-link">
                                <span class="menu-text">Placeholders</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-pagination.html" class="menu-link">
                                <span class="menu-text">Pagination</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-popovers.html" class="menu-link">
                                <span class="menu-text">Popovers</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-progress.html" class="menu-link">
                                <span class="menu-text">Progress</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-spinners.html" class="menu-link">
                                <span class="menu-text">Spinners</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-tabs.html" class="menu-link">
                                <span class="menu-text">Tabs</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-tooltips.html" class="menu-link">
                                <span class="menu-text">Tooltips</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="ui-typography.html" class="menu-link">
                                <span class="menu-text">Typography</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuComponentsui" data-bs-toggle="collapse" class="menu-link">
                    <span class="menu-icon"><i data-feather="life-buoy"></i></span>
                    <span class="menu-text"> Components </span>
                    <span class="badge bg-info ms-auto">Hot</span>
                </a>
                <div class="collapse" id="menuComponentsui">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="components-range-slider.html" class="menu-link">
                                <span class="menu-text">Range Slider</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="components-sweet-alert.html" class="menu-link">
                                <span class="menu-text">Sweet Alert</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="components-tosts.html" class="menu-link">
                                <span class="menu-text">Tosts</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="components-loading-buttons.html" class="menu-link">
                                <span class="menu-text">Loading Buttons</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuIcons" data-bs-toggle="collapse" class="menu-link">
                    <span class="menu-icon"><i data-feather="hexagon"></i></span>
                    <span class="menu-text"> Icons </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuIcons">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="icons-feather.html" class="menu-link">
                                <span class="menu-text">Feather Icons</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="icons-mdi.html" class="menu-link">
                                <span class="menu-text">Material Design Icons</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="icons-dripicons.html" class="menu-link">
                                <span class="menu-text">Dripicons</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuForms" data-bs-toggle="collapse" class="menu-link">
                    <span class="menu-icon"><i data-feather="edit-2"></i></span>
                    <span class="menu-text"> Forms </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuForms">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="forms-elements.html" class="menu-link">
                                <span class="menu-text">General Elements</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="forms-advanced.html" class="menu-link">
                                <span class="menu-text">Advanced</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="forms-validation.html" class="menu-link">
                                <span class="menu-text">Validation</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="forms-quilljs.html" class="menu-link">
                                <span class="menu-text">Editor</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="forms-file-uploads.html" class="menu-link">
                                <span class="menu-text">File Uploads</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuTables" data-bs-toggle="collapse" class="menu-link">
                    <span class="menu-icon"><i data-feather="table"></i></span>
                    <span class="menu-text"> Tables </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuTables">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="tables-basic.html" class="menu-link">
                                <span class="menu-text">Basic Tables</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="tables-datatables.html" class="menu-link">
                                <span class="menu-text">Data Tables</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuCharts" data-bs-toggle="collapse" class="menu-link">
                    <span class="menu-icon"><i data-feather="bar-chart-2"></i></span>
                    <span class="menu-text"> Charts </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuCharts">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="charts-apex.html" class="menu-link">
                                <span class="menu-text">Apex Charts</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="charts-chartjs.html" class="menu-link">
                                <span class="menu-text">Chartjs Charts</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuMaps" data-bs-toggle="collapse" class="menu-link">
                    <span class="menu-icon"><i data-feather="map"></i></span>
                    <span class="menu-text"> Maps </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuMaps">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="maps-google.html" class="menu-link">
                                <span class="menu-text">Google Maps</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="maps-vector.html" class="menu-link">
                                <span class="menu-text">Vector Maps</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuMultilevel" data-bs-toggle="collapse" class="menu-link">
                    <span class="menu-icon"><i data-feather="share-2"></i></span>
                    <span class="menu-text"> Multi Level </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuMultilevel">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="#menuMultilevel2" data-bs-toggle="collapse" class="menu-link">
                                <span class="menu-text"> Second Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="menuMultilevel2">
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a href="javascript: void(0);" class="menu-link">
                                            <span class="menu-text">Item 1</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="javascript: void(0);" class="menu-link">
                                            <span class="menu-text">Item 2</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-item">
                            <a href="#menuMultilevel3" data-bs-toggle="collapse" class="menu-link">
                                <span class="menu-text">Third Level</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="menuMultilevel3">
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a href="javascript: void(0);" class="menu-link">
                                            <span class="menu-text">Item 1</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#menuMultilevel4" data-bs-toggle="collapse" class="menu-link">
                                            <span class="menu-text">Item 2</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="menuMultilevel4">
                                            <ul class="sub-menu">
                                                <li class="menu-item">
                                                    <a href="javascript: void(0);" class="menu-link">
                                                        <span class="menu-text">Item 1</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="javascript: void(0);" class="menu-link">
                                                        <span class="menu-text">Item 2</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <!--- End Menu -->
        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left menu End ========== -->
