@extends('layouts.front')
@section('title', $survey->title)
@section('content')
<section class="survey" style="font-family: {{ $survey->font_style}} !important;">
    <div class="container">
        @if($survey->annomous)
        <div class="row">
            <div class="col-md-10 mx-auto" style="background: skyblue;text-align: center !important;color: white;border-radius: 5px;padding: 5px 0px;">
                This survey is in Anonymous Mode. We will not save your personal information.
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="welcome" x-data="{
                    buttonColor : '{{ $survey->button_color }}',
                    buttonTextColor : '{{ $survey->button_text_color }}',
                    backgroundColor: '{{ $survey->background_color }}'
                }" x-init="document.body.style.backgroundColor = backgroundColor;">
                    <h1 class="text-primary text-center">{{ $survey->welcome_message }}</h1>
                    <h5 class="text-center">{{ $survey->description ??  '' }}<h5>
                    <div class="col-md-12 text-center">
                        <a href="{{ route('front.survey.start', array_merge(['survey' => $survey->uuid], request()->all()))}}" class="btn btn-primary start" :style="`background-color : ${buttonColor}; color: ${buttonTextColor}`">{{ __('Start') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
