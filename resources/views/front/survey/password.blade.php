@extends('layouts.front')
@section('title', $survey->title)
@section('content')

<section class="survey m-auto" style="font-family: {{ $survey->font_style}} !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="welcome" x-data="{
                    buttonColor : '{{ $survey->button_color }}',
                    buttonTextColor : '{{ $survey->button_text_color }}',
                    backgroundColor: '{{ $survey->background_color }}'
                }" x-init="document.body.style.backgroundColor = backgroundColor;">
                    <h5 class="text-center">{{ __('Enter the password for attend survey') }}</h5>
                    <form method="POST" action="{{ route('front.survey.password.submit', ['survey' => $survey]) }}">
                        @csrf
                        <input type="password" class="form-control col-md-12"
                        name="password" placeholder="Enter Password">
                        @error('password')
                            <div class="invalid-feedback ">
                                {{ $message }}
                            </div>
                        @enderror
                        @if (request()->has('embed'))
                            <input type="hidden" name="embed" value="true">
                        @endif
                        <div class="col-md-12 text-center">
                            <input type="submit"
                                        class="btn btn-primary start mt-4" value="Submit"  :style="`background-color : ${buttonColor}; color: ${buttonTextColor}`"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
