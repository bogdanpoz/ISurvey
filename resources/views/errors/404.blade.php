<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>iNextSurvey</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/boxicons/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">

</head>

<body>
    <div class="container pt-5">
        <div class=" text-center">
            <div class="d-flex justify-content-center">
            <lottie-player src="https://assets7.lottiefiles.com/private_files/lf30_d58yxtgl.json" background="transparent" speed="1" style="width: 500px; height: 500px;" loop autoplay></lottie-player>
            </div>
            <p class="display-5 mb-3">Oops! Something is wrong </p>
            <a class="btn btn-primary m-b3" href="{{ route('home') }}">GO BACK </a>
        </div>
    </div>
</body>

</html>