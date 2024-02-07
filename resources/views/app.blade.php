<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ env('APP_NAME') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/virtual-select.min.css') }}">

    @yield('styles')

    <style>
        #paginateLinks.p {
            margin-right: 60px !important;
        }
    </style>

    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" type="text/css"
            href="{{ asset('/public/../app-assets/vendors/css/vendors-rtl.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('/public/../app-assets/vendors/css/charts/apexcharts.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('/public/../app-assets/vendors/css/extensions/toastr.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('/public/../app-assets/vendors/css/extensions/swiper.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('/public/../app-assets/vendors/css/maps/leaflet.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('/public/../app-assets/css-rtl/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('/public/../app-assets/css-rtl/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/public/../app-assets/css-rtl/colors.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/public/../app-assets/css-rtl/components.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('/public/../app-assets/css-rtl/themes/dark-layout.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('/public/../app-assets/css-rtl/themes/bordered-layout.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('/public/../app-assets/css-rtl/themes/semi-dark-layout.css') }}">


        <link rel="stylesheet" type="text/css"
            href="{{ asset('/public/../app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/public/../app-assets/css-rtl/pages/app-chat.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('/public/../app-assets/css-rtl/pages/app-chat-list.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('/public/../app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/public/../assets/css/style-rtl.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('/public/../app/assets/css/dataTables.bootstrap5.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('/public/../app-assets/css-rtl/plugins/extensions/ext-component-swiper.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('/public/../app-assets/css/plugins/maps/map-leaflet.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    @endif

    @if (app()->getLocale() == 'en')
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/swiper.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/maps/leaflet.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">

        <link rel="stylesheet" type="text/css"
            href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-chat.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-chat-list.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('app-assets/css/plugins/extensions/ext-component-swiper.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/maps/map-leaflet.css') }}">
    @endif

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&family=Montserrat&family=Noto+Kufi+Arabic:wght@400&display=swap"
        rel="stylesheet">

    <script type="text/javascript" src="{{ asset('assets/js/virtual-select.min.js') }}"></script>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    @yield('main-content')

    @yield('scripts')

</body>

<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
<script>
    ClassicEditor.create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

</html>
