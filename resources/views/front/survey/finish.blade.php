@extends('layouts.front')
@section('title', $survey->title)
@section('content')
<section class="survey" style="font-family: {{ $survey->font_style}} !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto text-right">
            @if($survey->annomous)
                <span class="badge bg-info btn-primary" style="padding:10px;"> Anonymous Mode</span>
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="welcome"  x-data="{url : '{{ $survey->redirect_url }}', backgroundColor: '{{ $survey->background_color }}'}" x-init="document.body.style.backgroundColor = backgroundColor; setTimeout(() => { if (!! url) window.location.href = url }, 3000)">
                    <h1 class="text-primary text-center">{{ $survey->goodbye_text ?? __('Thank You For Doing Survey !') }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
