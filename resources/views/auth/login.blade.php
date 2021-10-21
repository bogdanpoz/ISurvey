<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/boxicons/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/loginstyle.css') }}">
</head>


<body>
    @extends('layouts.app')

    @section('body-class', 'hold-transition register-page')

    @section('content')
    <div class="register-box">
        <div class="container-fluid">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="container">
                    <div class="d-flex">
                        <form method="POST" action="{{ route('login') }}" >
                           
                            <div class="register-logo">
                                <a href="/">
                                    <img src="{{ asset('landing/img/inextlogo.png') }}" class="logo">
                                </a>
                            </div>
                            <h4 class="login-box-msg">{{ __('Sign in') }}</h4>

                            @csrf
                            <div class="input-group mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <div class="input-group-append">

                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">

                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                                <div class="input-group-append">


                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class=" btn btn-primary btn-block">{{ __('Sign In') }}</button>
                                </div>
                            </div>
                        </form>
                        </div>

                        <p class="mb-0 mt-3">
                            <a href="{{ route('password.request') }}">{{ __('I forgot my password') }}</a>
                        </p>
                        <p class="mb-2 mt-2">
                            <a href="{{ route('register') }}" class="text-center">{{ __("Don't have an account?") }}</a>
                        </p>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>