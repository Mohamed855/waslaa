<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" @yield('options')>
    <head>
        <meta charset="utf-8" />
        <title>@yield('title')  | TechUI - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="GetAppui" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('storage/assets/images/favicon.ico') }}">
        <!-- Theme Config Js -->
        <script src="{{ asset('storage/assets/js/head.js') }}" type="module"></script>
        <!-- Font Family -->
        <link href="https://api.fontshare.com/v2/css?f[]=satoshi@900,700,500,300,400&display=swap" rel="stylesheet">
        <!-- Css styles -->
        <link rel="stylesheet" href="{{ asset('storage/assets/css/app.min.css') }}">

        @yield('additional-css')
    </head>
    <body class="@yield('body-class')">
        @yield('body-content')

        <!-- Vendor js -->
        <script src="{{ asset('storage/assets/js/vendor.min.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('storage/assets/js/app.js') }}" type="module"></script>

        @yield('additional-scripts')
    </body>
</html>
