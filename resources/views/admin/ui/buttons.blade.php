@extends('layouts.admin')

@section('title', 'Buttons')

@section('subtitle', 'Base UI')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Default Buttons</h4>
                    <p class="text-muted mb-0">Use the button classes on an <code>&lt;a&gt;</code>,
                        <code>&lt;button&gt;</code>, or <code>&lt;input&gt;</code> element.</p>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-primary">Primary</button>
                        <button type="button" class="btn btn-secondary">Secondary</button>
                        <button type="button" class="btn btn-success">Success</button>
                        <button type="button" class="btn btn-danger">Danger</button>
                        <button type="button" class="btn btn-warning">Warning</button>
                        <button type="button" class="btn btn-info">Info</button>
                        <button type="button" class="btn btn-light">Light</button>
                        <button type="button" class="btn btn-dark">Dark</button>
                        <button type="button" class="btn btn-pink">Pink</button>
                        <button type="button" class="btn btn-blue">Blue</button>
                        <button type="button" class="btn btn-link">Link</button>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Button Outline</h4>
                    <p class="text-muted mb-0">Use a classes <code>.btn-outline-**</code> to quickly
                        create a bordered buttons.</p>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-outline-primary">Primary</button>
                        <button type="button" class="btn btn-outline-secondary">Secondary</button>
                        <button type="button" class="btn btn-outline-success">Success</button>
                        <button type="button" class="btn btn-outline-danger">Danger</button>
                        <button type="button" class="btn btn-outline-warning">Warning</button>
                        <button type="button" class="btn btn-outline-info">Info</button>
                        <button type="button" class="btn btn-outline-pink">Pink</button>
                        <button type="button" class="btn btn-outline-blue">Blue</button>
                        <button type="button" class="btn btn-outline-light">Light</button>
                        <button type="button" class="btn btn-outline-dark">Dark</button>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Button Rounded</h4>
                    <p class="text-muted mb-0">Add <code>.rounded-pill</code> to default button to get
                        rounded corners.</p>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-primary rounded-pill">Primary</button>
                        <button type="button" class="btn btn-secondary rounded-pill">Secondary</button>
                        <button type="button" class="btn btn-success rounded-pill">Success</button>
                        <button type="button" class="btn btn-danger rounded-pill">Danger</button>
                        <button type="button" class="btn btn-warning rounded-pill">Warning</button>
                        <button type="button" class="btn btn-info rounded-pill">Info</button>
                        <button type="button" class="btn btn-pink rounded-pill">Pink</button>
                        <button type="button" class="btn btn-blue rounded-pill">Blue</button>
                        <button type="button" class="btn btn-light rounded-pill">Light</button>
                        <button type="button" class="btn btn-dark rounded-pill">Dark</button>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Button Outline Rounded</h4>
                    <p class="text-muted mb-0">Use a classes <code>.btn-outline-**</code> to quickly
                        create a bordered buttons.</p>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button"
                                class="btn btn-outline-primary rounded-pill">Primary
                        </button>
                        <button type="button"
                                class="btn btn-outline-secondary rounded-pill">Secondary
                        </button>
                        <button type="button"
                                class="btn btn-outline-success rounded-pill">Success
                        </button>
                        <button type="button"
                                class="btn btn-outline-danger rounded-pill">Danger
                        </button>
                        <button type="button"
                                class="btn btn-outline-warning rounded-pill">Warning
                        </button>
                        <button type="button" class="btn btn-outline-info rounded-pill">Info</button>
                        <button type="button" class="btn btn-outline-pink rounded-pill">Pink</button>
                        <button type="button" class="btn btn-outline-blue rounded-pill">Blue</button>
                        <button type="button" class="btn btn-outline-light rounded-pill">Light</button>
                        <button type="button" class="btn btn-outline-dark rounded-pill">Dark</button>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Button-Sizes</h4>
                    <p class="text-muted mb-0">
                        Add <code>.btn-lg</code>, <code>.btn-sm</code> for additional sizes.
                    </p>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <button type="button" class="btn btn-primary btn-lg">Large</button>
                        <button type="button" class="btn btn-info">Normal</button>
                        <button type="button" class="btn btn-success btn-sm">Small</button>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Button-Disabled</h4>
                    <p class="text-muted mb-0">
                        Add the <code>disabled</code> attribute to <code>&lt;button&gt;</code> buttons.
                    </p>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-info" disabled>Info</button>
                        <button type="button" class="btn btn-success" disabled>Success</button>
                        <button type="button" class="btn btn-danger" disabled>Danger</button>
                        <button type="button" class="btn btn-dark" disabled>Dark</button>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Icon Buttons</h4>
                    <p class="text-muted mb-0">
                        Icon only button.
                    </p>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-light"><i
                                class="mdi mdi-heart-outline"></i></button>
                        <button type="button" class="btn btn-danger"><i
                                class="mdi mdi-window-closed-variant"></i></button>
                        <button type="button" class="btn btn-dark"><i class="mdi mdi-music-note"></i>
                        </button>
                        <button type="button" class="btn btn-primary"><i
                                class="mdi mdi-shield-star-outline"></i></button>
                        <button type="button" class="btn btn-success"><i
                                class="mdi mdi-thumb-up-outline"></i></button>
                        <button type="button" class="btn btn-info"><i
                                class="mdi mdi-keyboard-variant"></i></button>
                        <button type="button" class="btn btn-warning"><i class="mdi mdi-town-hall"></i>
                        </button>

                        <button type="button" class="btn btn-light"><i
                                class="mdi mdi-heart-multiple me-1"></i> <span>Like</span></button>
                        <button type="button" class="btn btn-warning"><i
                                class="mdi mdi-rocket-outline me-1"></i> <span>Launch</span></button>
                        <button type="button" class="btn btn-info"><i
                                class="mdi mdi-server-minus me-1"></i> <span>Cloud Hosting</span>
                        </button>

                        <button type="button" class="btn btn-outline-success"><i
                                class="mdi mdi-currency-gbp me-1"></i> Money
                        </button>
                        <button type="button" class="btn btn-outline-primary"><i
                                class="mdi mdi-alpha-p-circle-outline me-1"></i> PayPal
                        </button>
                        <button type="button" class="btn btn-outline-danger"><i
                                class="mdi mdi-tune-variant me-1"></i> Settings
                        </button>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Block Button</h4>
                    <p class="text-muted mb-0">
                        Create block level buttons by adding class <code>.d-grid</code> to parent div.
                    </p>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-sm btn-primary">Block Button</button>
                        <button type="button" class="btn btn-lg btn-success">Block Button</button>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Button Group</h4>
                    <p class="text-muted mb-0">
                        Wrap a series of buttons with <code>.btn</code> in <code>.btn-group</code>.
                    </p>
                </div>
                <div class="card-body">
                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-light">Left</button>
                        <button type="button" class="btn btn-light">Middle</button>
                        <button type="button" class="btn btn-light">Right</button>
                    </div>

                    <br>

                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-light">1</button>
                        <button type="button" class="btn btn-light">2</button>
                        <button type="button" class="btn btn-light">3</button>
                        <button type="button" class="btn btn-light">4</button>
                    </div>

                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-light">5</button>
                        <button type="button" class="btn btn-light">6</button>
                        <button type="button" class="btn btn-light">7</button>
                    </div>

                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-light">8</button>
                    </div>

                    <br>

                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-light">1</button>
                        <button type="button" class="btn btn-primary">2</button>
                        <button type="button" class="btn btn-light">3</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false"> Dropdown <i
                                    class="mdi mdi-menu-down fs-24"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Dropdown link</a>
                                <a class="dropdown-item" href="#">Dropdown link</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="btn-group-vertical mb-2">
                                <button type="button" class="btn btn-light">Top</button>
                                <button type="button" class="btn btn-light">Middle</button>
                                <button type="button" class="btn btn-light">Bottom</button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="btn-group-vertical mb-2">
                                <button type="button" class="btn btn-light">Button 1</button>
                                <button type="button" class="btn btn-light">Button 2</button>
                                <button type="button" class="btn btn-light dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false"> Button 3 <i
                                        class="mdi mdi-menu-down fs-24"></i></button>
                                <div class="dropdown-menu dropdown-menu-animated">
                                    <a class="dropdown-item" href="#">Dropdown link</a>
                                    <a class="dropdown-item" href="#">Dropdown link</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Toggle Button</h4>
                            <p class="text-muted mb-0">Add <code>data-bs-toggle="button"</code> to
                                toggle a button’s <code>active</code> state. If you’re pre-toggling a
                                button, you must manually add the <code>.active</code> class
                                <strong>and</strong> <code>aria-pressed="true"</code> to ensure that it
                                is conveyed appropriately to assistive technologies.</p>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-bs-toggle="button">Toggle
                                button
                            </button>
                            <button type="button" class="btn btn-primary active" data-bs-toggle="button"
                                    aria-pressed="true">Active toggle button
                            </button>
                            <button type="button" class="btn btn-primary" disabled
                                    data-bs-toggle="button">Disabled toggle button
                            </button>

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div><!--end col-->

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Button tags</h4>
                            <p class="text-muted mb-0">The <code>.btn</code> classes are designed to be
                                used with the <code>&lt;button&gt;</code> element. However, you can also
                                use these classes on <code>&lt;a&gt;</code> or
                                <code>&lt;input&gt;</code> elements (though some browsers may apply a
                                slightly different rendering).</p>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-primary" href="#" role="button">Link</a>
                            <button class="btn btn-primary" type="submit">Button</button>
                            <input class="btn btn-primary" type="button" value="Input">
                            <input class="btn btn-primary" type="submit" value="Submit">
                            <input class="btn btn-primary" type="reset" value="Reset">

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>
            </div><!--end row-->
        </div> <!-- end col -->

    </div>
    <!-- end row -->
@endsection

