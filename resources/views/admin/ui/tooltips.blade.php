@extends('layouts.admin')

@section('title', 'Tooltips')

@section('subtitle', 'Base UI')

@section('dashboard-content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Examples</h4>
                    <p class="text-muted mb-0">Hover over the links below to see tooltips.</p>
                </div>
                <div class="card-body">
                    <p class="muted mb-0">
                        Tight pants next level keffiyeh <a href="#" data-bs-toggle="tooltip"
                                                           data-bs-title="Default tooltip">you probably</a> haven't
                        heard
                        of them. Photo booth beard raw denim letterpress vegan messenger bag
                        stumptown. Farm-to-table Photo booth beard seitan, mcsweeney's fixie sustainable quinoa
                        8-bit american apparel <a href="#" data-bs-toggle="tooltip" data-bs-title="Another tooltip">have
                            a</a> terry richardson
                        vinyl chambray. Beard stumptown, cardigans banh mi lomo thundercats.
                        Tofu biodiesel williamsburg marfa, four loko mcsweeney's cleanse vegan
                        chambray. A really ironic artisan <a href="#" data-bs-toggle="tooltip"
                                                             data-bs-title="Another one here too">whatever
                        </a> keytar, scenester farm-to-table banksy Austin <a href="#" data-bs-toggle="tooltip"
                                                                              data-bs-title="The last tip!">twitter
                            handle</a> freegan cred
                        raw denim single-origin coffee viral.
                    </p>
                </div> <!-- end card-body -->
            </div> <!-- end card-->

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Disabled elements</h4>
                    <p class="text-muted mb-0">Elements with the <code>disabled</code> attribute
                        aren’t interactive, meaning users cannot focus, hover, or click them to trigger
                        a tooltip (or popover). As a workaround, you’ll want to trigger the tooltip from
                        a wrapper <code>&lt;div&gt;</code> or <code>&lt;span&gt;</code>, ideally made
                        keyboard-focusable using <code>tabindex="0"</code>, and override the
                        <code>pointer-events</code> on the disabled element.
                    </p>
                </div>
                <div class="card-body">

                    <div>
                        <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip"
                              data-bs-title="Disabled tooltip">
                            <button class="btn btn-primary pe-none" type="button" disabled>Disabled button</button>
                        </span>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Four Directions</h4>
                    <p class="text-muted fs-14 mb-0">Hover over the buttons below to see the four tooltips
                        directions: top, right, bottom, and left.</p>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="Tooltip on top">Tooltip on top
                        </button>
                        <button type="button" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-title="Tooltip on bottom">Tooltip on bottom
                        </button>
                        <button type="button" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="left"
                                data-bs-title="Tooltip on left">Tooltip on left
                        </button>
                        <button type="button" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="right"
                                data-bs-title="Tooltip on right">Tooltip on right
                        </button>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">HTML Tags</h4>
                    <p class="text-muted mb-0">And with custom HTML added:</p>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip"
                            data-bs-html="true" data-bs-title="<em>Tooltip</em> <u>with</u> <b>HTML</b>">
                        Tooltip with HTML
                    </button>
                </div> <!-- end card-body -->
            </div> <!-- end card-->

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Color Tooltips</h4>
                    <p class="text-muted fs-14 mb-0">We set a custom class with ex. <code>data-bs-custom-class="primary-tooltip"</code>
                        to scope our background-color primary appearance and use
                        it to override a local CSS
                        variable.
                    </p>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="primary-tooltip"
                                data-bs-title="This top tooltip is themed via CSS variables.">
                            Primary tooltip
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="danger-tooltip"
                                data-bs-title="This top tooltip is themed via CSS variables.">
                            Danger tooltip
                        </button>
                        <button type="button" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="info-tooltip"
                                data-bs-title="This top tooltip is themed via CSS variables.">
                            Info tooltip
                        </button>
                        <button type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="success-tooltip"
                                data-bs-title="This top tooltip is themed via CSS variables.">
                            Success tooltip
                        </button>
                        <button type="button" class="btn btn-pink" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="pink-tooltip"
                                data-bs-title="This top tooltip is themed via CSS variables.">
                            Pink tooltip
                        </button>
                        <button type="button" class="btn btn-blue" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="blue-tooltip"
                                data-bs-title="This top tooltip is themed via CSS variables.">
                            Blue tooltip
                        </button>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
