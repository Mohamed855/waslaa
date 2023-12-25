@extends('layouts.admin')

@section('title', 'Sweet Alerts')

@section('additional-css')
    <!-- Sweet Alert-->
    <link href="{{ asset('storage/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('subtitle', 'Extended UI')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Examples</h4>
                    <p class="sub-header mb-0">
                        A beautiful, responsive, customizable, accessible (WAI-ARIA) replacement for JavaScript's popup
                        boxes
                    </p>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-centered mb-0">
                        <thead class="table-light">
                        <tr>
                            <th style="width:50%;">Alert Type</th>
                            <th>Example</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>A basic message</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" id="sa-basic">Click me</button>
                            </td>
                        </tr>

                        <tr>
                            <td>A title with a text under</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" id="sa-title">Click me</button>
                            </td>
                        </tr>
                        <tr>
                            <td>A success message!</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" id="sa-success">Click me</button>
                            </td>
                        </tr>

                        <tr>
                            <td>A modal window with a long content inside:</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" id="sa-long-content">Click me
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>A custom positioned dialog</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" id="sa-custom-position">Click me
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>A modal with a title, an error icon, a text, and a footer</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" id="sa-error">Click me</button>
                            </td>
                        </tr>
                        <tr>
                            <td>A confirm dialog, with a function attached to the "Confirm"-button...</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" id="sa-warning">Click me</button>
                            </td>
                        </tr>
                        <tr>
                            <td>By passing a parameter, you can execute something else for "Cancel".</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" id="sa-params">Click me</button>
                            </td>
                        </tr>
                        <tr>
                            <td>A message with custom Image Header</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" id="sa-image">Click me</button>
                            </td>
                        </tr>
                        <tr>
                            <td>A message with auto close timer</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" id="sa-close">Click me</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Custom HTML description and buttons</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" id="custom-html-alert">Click me
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>A message with custom width, padding and background</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" id="custom-padding-width-alert">
                                    Click me
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Ajax request example</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" id="ajax-alert">Click me</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Chaining modals (queue) example</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" id="chaining-alert">Click me
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Dynamic queue example</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" id="dynamic-alert">Click me
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('additional-scripts')
    <!-- Sweet alert init js-->
    <script src="{{ asset('storage/assets/js/pages/sweet-alerts.init.js') }}" type="module"></script>
@endsection
