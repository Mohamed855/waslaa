@extends('layouts.admin')

@section('title', 'Quilljs Editors')

@section('subtitle', 'Forms')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Snow Editor</h4>
                    <p class="sub-header mb-0">Snow is a clean, flat toolbar theme.</p>
                </div>
                <div class="card-body">

                    <div id="snow-editor" style="height: 300px;">
                        <h3><span class="ql-size-large">Hello World!</span></h3>
                        <p><br></p>
                        <h3>This is an simple editable area.</h3>
                        <p><br></p>
                        <ul>
                            <li>
                                Select a text to reveal the toolbar.
                            </li>
                            <li>
                                Edit rich document on-the-fly, so elastic!
                            </li>
                        </ul>
                        <p><br></p>
                        <p>
                            End of simple area
                        </p>

                    </div> <!-- end Snow-editor-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div><!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Bubble Editor</h4>
                    <p class="sub-header mb-0">Bubble is a simple tooltip based theme.</p>
                </div>
                <div class="card-body">
                    <div id="bubble-editor" style="height: 300px;">
                        <h3><span class="ql-size-large">Hello World!</span></h3>
                        <p><br></p>
                        <h3>This is an simple editable area.</h3>
                        <p><br></p>
                        <ul>
                            <li>
                                Select a text to reveal the toolbar.
                            </li>
                            <li>
                                Edit rich document on-the-fly, so elastic!
                            </li>
                        </ul>
                        <p><br></p>
                        <p>
                            End of simple area
                        </p>
                    </div> <!-- end Snow-editor-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('additional-scripts')
    <!-- Plugins js -->
    <script src="{{ asset('storage/assets/libs/quill/quill.min.js') }}"></script>
    <!-- Init js-->
    <script src="{{ asset('storage/assets/js/pages/form-quilljs.init.js') }}" type="module"></script>
@endsection
