<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('company/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('company/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('company/css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('company/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('company/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('company/js/adminlte.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('company/css/google.css') }}">
</head>
<body @hasSection('body-class') class="@yield('body-class')" @endif>
    @yield('content')
</body>
</html>
