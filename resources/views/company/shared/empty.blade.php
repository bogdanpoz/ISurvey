<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">

</head>
<body>
    
</body>
</html>




<div class="empty">
    <img src="{{ asset('landing/img/questions.svg') }}" class="img-fluid">
    <h3 class="mt-4">{{ $heading }}</h3>
    <p>{{ $description }}</p>

    @if(isset($button))
        <a href="{{ $button['route'] }}" class="btn btn-primary">{{ $button['text'] }}</a>
    @endif

    @yield('buttonCustom')
</div>