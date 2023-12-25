<!-- Theme Settings -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
    <div class="d-flex align-items-center w-100 bg-primary p-0 offcanvas-header">
        <h6 class="fw-medium py-2 px-3 font-16 text-white">
            <span class="d-block py-1">Theme Settings</span>
        </h6>
    </div>

    <div class="offcanvas-body p-3 h-100" data-simplebar>
        <div>
            <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h5>

            <div class="d-flex gap-2">
                <div class="form-check form-radio w-50">
                    <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-light" value="light">
                    <label class="form-check-label" for="layout-color-light">Light</label>
                </div>

                <div class="form-check form-radio w-50">
                    <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-dark" value="dark">
                    <label class="form-check-label" for="layout-color-dark">Dark</label>
                </div>
            </div>
        </div>


        <div>
            <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Layout Mode</h5>

            <div class="d-flex gap-2">
                <div class="form-check form-radio w-50">
                    <input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-fluid" value="default">
                    <label class="form-check-label" for="layout-mode-fluid">Default</label>
                </div>

                <div class="form-check form-radio w-50">
                    <input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-detached" value="detached">
                    <label class="form-check-label" for="layout-mode-detached">Detached</label>
                </div>
            </div>
        </div>

        <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Topbar Color</h5>

        <div class="d-flex gap-2">
            <div class="form-check form-radio w-50">
                <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-light" value="light">
                <label class="form-check-label" for="topbar-color-light">Light</label>
            </div>

            <div class="form-check form-radio w-50">
                <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-dark" value="dark">
                <label class="form-check-label" for="topbar-color-dark">Dark</label>
            </div>

            <div class="form-check form-radio w-50">
                <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-brand" value="brand">
                <label class="form-check-label" for="topbar-color-brand">Brand</label>
            </div>
        </div>

        <div>
            <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Menu Color</h5>

            <div class="d-flex gap-2">
                <div class="form-check form-radio w-50">
                    <input class="form-check-input" type="radio" name="data-sidenav-color" id="leftbar-color-light" value="light">
                    <label class="form-check-label" for="leftbar-color-light">Light</label>
                </div>

                <div class="form-check form-radio w-50">
                    <input class="form-check-input" type="radio" name="data-sidenav-color" id="leftbar-color-dark" value="dark">
                    <label class="form-check-label" for="leftbar-color-dark">Dark</label>
                </div>
                <div class="form-check form-radio w-50">
                    <input class="form-check-input" type="radio" name="data-sidenav-color" id="leftbar-color-brand" value="brand">
                    <label class="form-check-label" for="leftbar-color-brand">Brand</label>
                </div>
            </div>
        </div>

        <div>
            <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Sidebar Size</h5>

            <div class="d-flex gap-2 mb-2">
                <div class="form-check form-radio w-50">
                    <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-default" value="default">
                    <label class="form-check-label" for="sidenav-size-default">Default</label>
                </div>

                <div class="form-check form-radio w-50">
                    <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-md" value="md">
                    <label class="form-check-label" for="sidenav-size-md">Compact</label>
                </div>
            </div>

            <div class="d-flex gap-2 mb-2">
                <div class="form-check form-radio w-50">
                    <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-small" value="sm">
                    <label class="form-check-label" for="sidenav-size-small">Small</label>
                </div>

                <div class="form-check form-radio w-50">
                    <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-overlay" value="overlay">
                    <label class="form-check-label" for="sidenav-size-overlay">Overlay</label>
                </div>
            </div>

            <div class="form-check form-radio w-50">
                <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-hidden" value="hidden">
                <label class="form-check-label" for="sidenav-size-hidden">Hidden</label>
            </div>
        </div>

    </div>

    <div class="offcanvas-footer border-top py-2 px-2 text-center">
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-soft-danger w-100" id="reset-layout">Reset</button>
        </div>
    </div>
</div>
