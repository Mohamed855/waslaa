@extends('layouts.admin')

@section('title', 'Alerts')

@section('additional-css')
    <!-- Notification css (Toastr) -->
    <link href="{{ asset('storage/assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('subtitle', 'Extended UI')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Toastr Alerts</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6">
                            <div class="mb-2">
                                <label>Title</label>
                                <input id="title" type="text" class="form-control" placeholder="Enter a title ..."/>
                            </div>

                            <div class="mb-2">
                                <label>Message</label>
                                <textarea class="form-control" id="message1" rows="3"
                                          placeholder="Enter a message ..."></textarea>
                            </div>

                            <div class="checkbox mb-1">
                                <input id="closeButton" type="checkbox" value="checked" class="form-check-input"/>
                                <label for="closeButton">
                                    Close Button
                                </label>
                            </div>

                            <div class="checkbox mb-2">
                                <input id="addBehaviorOnToastClick" type="checkbox" value="checked"
                                       class="form-check-input"/>
                                <label for="addBehaviorOnToastClick">
                                    Add behavior on toast click
                                </label>
                            </div>

                            <div class="checkbox mb-1">
                                <input id="debugInfo" type="checkbox" value="checked" class="form-check-input"/>
                                <label for="debugInfo">
                                    Debug
                                </label>
                            </div>

                            <div class="checkbox mb-1">
                                <input id="progressBar" type="checkbox" value="checked" class="form-check-input"/>
                                <label for="progressBar">
                                    Progress Bar
                                </label>
                            </div>

                            <div class="checkbox mb-1">
                                <input id="preventDuplicates" type="checkbox" value="checked" class="form-check-input"/>
                                <label for="preventDuplicates">
                                    Prevent Duplicates
                                </label>
                            </div>

                            <div class="checkbox mb-1">
                                <input id="addClear" type="checkbox" value="checked" class="form-check-input"/>
                                <label for="addClear">
                                    Add button to force clearing a toast, ignoring focus
                                </label>
                            </div>

                            <div class="checkbox mb-1">
                                <input id="newestOnTop" type="checkbox" value="checked" class="form-check-input"/>
                                <label for="newestOnTop">
                                    Newest on top
                                </label>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-6">
                            <div class="mt-3 mt-lg-0">
                                <div class="control-group" id="toastTypeGroup">
                                    <div class="controls">
                                        <label class="mb-2">Toast Type</label>
                                        <div class="mb-2">
                                            <input class="form-check-input form-radio-success" type="radio" name="radio"
                                                   id="radio1" value="success" checked>
                                            <label for="radio1">
                                                Success
                                            </label>
                                        </div>

                                        <div class="mb-2">
                                            <input class="form-check-input form-radio-info" type="radio" name="radio"
                                                   id="radio2" value="info">
                                            <label for="radio2">
                                                Info
                                            </label>
                                        </div>

                                        <div class="mb-2">
                                            <input class="form-check-input form-radio-warning" type="radio" name="radio"
                                                   id="radio3" value="warning">
                                            <label for="radio3">
                                                Warning
                                            </label>
                                        </div>

                                        <div class="mb-2">
                                            <input class="form-check-input form-radio-danger" type="radio" name="radio"
                                                   id="radio4" value="error">
                                            <label for="radio4">
                                                Error
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="control-group" id="positionGroup">
                                    <label class="my-2">Position</label>

                                    <div class="mb-1">
                                        <input class="form-check-input" type="radio" name="positions" id="radio5"
                                               value="toast-top-right" checked/>
                                        <label for="radio5">
                                            Top Right
                                        </label>
                                    </div>

                                    <div class="mb-1">
                                        <input class="form-check-input" type="radio" name="positions" id="radio6"
                                               value="toast-bottom-right"/>
                                        <label for="radio6">
                                            Bottom Right
                                        </label>
                                    </div>

                                    <div class="mb-1">
                                        <input class="form-check-input" type="radio" name="positions" id="radio7"
                                               value="toast-bottom-left"/>
                                        <label for="radio7">
                                            Bottom Left
                                        </label>
                                    </div>

                                    <div class="mb-1">
                                        <input class="form-check-input" type="radio" name="positions" id="radio8"
                                               value="toast-top-left"/>
                                        <label for="radio8">
                                            Top Left
                                        </label>
                                    </div>

                                    <div class="mb-1">
                                        <input class="form-check-input" type="radio" name="positions" id="radio9"
                                               value="toast-top-full-width"/>
                                        <label for="radio9">
                                            Top Full Width
                                        </label>
                                    </div>

                                    <div class="mb-1">
                                        <input class="form-check-input" type="radio" name="positions" id="radio10"
                                               value="toast-bottom-full-width"/>
                                        <label for="radio10">
                                            Bottom Full Width
                                        </label>
                                    </div>

                                    <div class="mb-1">
                                        <input class="form-check-input" type="radio" name="positions" id="radio11"
                                               value="toast-top-center"/>
                                        <label for="radio11">
                                            Top Center
                                        </label>
                                    </div>

                                    <div class="mb-1">
                                        <input class="form-check-input" type="radio" name="positions" id="radio12"
                                               value="toast-bottom-center"/>
                                        <label for="radio12">
                                            Bottom Center
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6">

                            <div>
                                <div class="mb-2">
                                    <label class="mb-2" for="showEasing">Show Easing</label>
                                    <input id="showEasing" type="text" placeholder="swing, linear" class="form-control"
                                           value="swing"/>
                                </div>

                                <div class="mb-2">
                                    <label class="mb-2" for="hideEasing">Hide Easing</label>
                                    <input id="hideEasing" type="text" placeholder="swing, linear" class="form-control"
                                           value="linear"/>
                                </div>

                                <div class="mb-2">
                                    <label class="mb-2" for="showMethod">Show Method</label>
                                    <input id="showMethod" type="text" placeholder="show, fadeIn, slideDown"
                                           class="form-control" value="fadeIn"/>
                                </div>

                                <div class="mb-2">
                                    <label class="mb-2" for="hideMethod">Hide Method</label>
                                    <input id="hideMethod" type="text" placeholder="hide, fadeOut, slideUp"
                                           class="form-control" value="fadeOut"/>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-3 col-lg-6">

                            <div>
                                <div class="mb-2">
                                    <label class="mb-2" for="showDuration">Show Duration</label>
                                    <input id="showDuration" type="text" placeholder="ms"
                                           class="form-check-input form-control" value="300"/>
                                </div>

                                <div class="mb-2">
                                    <label class="mb-2" for="hideDuration">Hide Duration</label>
                                    <input id="hideDuration" type="text" placeholder="ms"
                                           class="form-check-input form-control" value="1000"/>
                                </div>

                                <div class="mb-2">
                                    <label class="mb-2" for="timeOut">Time out</label>
                                    <input id="timeOut" type="text" placeholder="ms"
                                           class="form-check-input form-control" value="5000"/>
                                </div>

                                <div class="mb-2">
                                    <label class="mb-2" for="extendedTimeOut">Extended time out</label>
                                    <input id="extendedTimeOut" type="text" placeholder="ms"
                                           class="form-check-input form-control" value="1000"/>
                                </div>
                            </div>

                        </div>
                    </div><!-- end row -->

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary btn-sm" id="showtoast">Show Toast</button>
                            <button type="button" class="btn btn-danger btn-sm" id="cleartoasts">Clear Toasts</button>
                            <button type="button" class="btn btn-danger btn-sm" id="clearlasttoast">Clear Last Toast
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <pre id='toastrOptions' class="p-3 bg-light mt-3 mb-0"><h5
                                    class="m-0">Example Code</h5></pre>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div><!-- end col -->
    </div><!-- end row -->
@endsection

@section('additional-scripts')
    <!-- Toastr js -->
    <script src="{{ asset('storage/assets/libs/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/pages/toastr.init.js') }}" type="module"></script>
@endsection
