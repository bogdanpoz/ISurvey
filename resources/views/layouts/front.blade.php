<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/rangeslider.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="container">
            <div class="col-md-12 text-center">
                <h6>{{ __('Powered By') }}</h6>
                <img src="{{ asset('logos/main-logo.png') }}" class="img-fluid">
                <h6 class="mb-0">{{ __('Easily create surveys, quizzes, and polls.') }}</h6>
            </div>
        </div>
    </footer>
    <script src="{{ asset('company/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/alpine.min.js') }}" defer></script>
    <script src="{{ asset('frontend/js/intlTelInput.js') }}"></script>
    <script src="{{ asset('frontend/js/rangeslider.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script>
       
    </script>
</body>
</html>
