<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('company/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('company/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('company/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('company/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('company/css/style.css') }}" rel="stylesheet">

    <!-- base style --->
    @include('layouts.base')



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('company/css/google.css') }}">

    @livewireStyles
</head>
<body class="hold-transition layout-top-nav">
    <script src="https://js.stripe.com/v3/"></script>

    <div class="wrapper">
        @include('company.shared.header')

        @include('flash::message')

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('company.shared.footer')
    </div>

    @if (settings()->get('sharethis_status'))
        <script src="https://platform-api.sharethis.com/js/sharethis.js#property={{ settings()->get('sharethis_property') }}&product=inline-share-buttons" async="async"></script>
    @endif

    <!-- Scripts -->
    <script src="{{ asset('company/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('company/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('company/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('frontend/js/alpine.min.js') }}" defer></script>
    <script src="{{ asset('company/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('company/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('company/plugins/clipboard/js/clipboard.min.js') }}"></script>

    @livewireScripts

    <script src="{{ asset('company/js/custom.js') }}"></script>
</body>
</html>
