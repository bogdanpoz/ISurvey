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
            <div class="col-md-12">
                <div class="survey-1" x-data="{
                    font_style: '{{ $survey->font_style}}',
                    questionColor: '{{ $survey->question_color}}',
                    answerColor : '{{ $survey->answer_color}}',
                    buttonColor : '{{ $survey->button_color }}',
                    buttonTextColor : '{{ $survey->button_text_color }}',
                    backgroundColor: '{{ $survey->background_color }}'
                }" x-init="document.body.style.backgroundColor = backgroundColor;">
                    <div class="border-0 border-light py-5 px-md-4">
                        <div class=" mb-5 text-primary">
                            <h3 class=" text-primary mb-0">{{ $survey->title }}</h3>
                        </div>
                        <form method="POST" action="{{ route('front.survey.submit', ['survey'=> $survey->uuid]) }}">
                        @csrf
                        @foreach ($survey->questions as $question)
                            <div>
                                <h5 class="text-left mb-3" :style="`color: ${questionColor}`">{{ $loop->iteration }}. {{ $question->text }}</h5>
                                @if ($question->image)
                                    <img src="{{url('/storage/'.$question->image) }}" class="img-fluid survey-img">
                                @endif
                            </div>
                            @if ($question->type === \App\Models\Question::MULTIPLE_CHOICES)
                                @foreach ($question->choices()  as $choice)
                                <div class="select-1">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio-{{ $question->id.$loop->iteration }}" class="custom-control-input" name="response[{{ $question->id }}]" value="{{ $choice }}" @if(old('response.'. $question->id) === $choice) checked @endif>
                                        <label class="custom-control-label" for="customRadio-{{ $question->id.$loop->iteration }}" :style="`color: ${answerColor}`">{{ $choice }}</label>
                                    </div>
                                </div>
                                @endforeach
                            @endif

                            @if ($question->type === \App\Models\Question::SHORT_TEXT)
                                <input type="text" class="form-control col-md-4" name="response[{{ $question->id }}]" value="{{ old('response.'.$question->id) }}">
                            @endif

                            @if ($question->type === \App\Models\Question::LONG_TEXT)
                                <textarea class="form-control col-md-6" id="" rows="4" name="response[{{ $question->id }}]">{{ old('response.'.$question->id) }}</textarea>
                            @endif

                            @if ($question->type === \App\Models\Question::NUMBER)
                                <input type="number" class="form-control col-md-4" name="response[{{ $question->id }}]" value="{{ old('response.'.$question->id) }}">
                            @endif

                            @if ($question->type === \App\Models\Question::EMAIL)
                                <input type="email" class="form-control col-md-4" name="response[{{ $question->id }}]" value="{{ old('response.'.$question->id) }}">
                            @endif

                            @if ($question->type === \App\Models\Question::YES_NO)
                                @foreach ($question->choices()  as $choice)
                                <div class="select-1">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio-{{ $question->id.$loop->iteration }}" class="custom-control-input" name="response[{{ $question->id }}]" value="{{ $choice }}" @if(old('response.'. $question->id) === $choice) checked @endif>
                                        <label :style="`color: ${answerColor}`" class="custom-control-label" for="customRadio-{{ $question->id.$loop->iteration }}">{{ $choice }}</label>
                                    </div>
                                </div>
                                @endforeach
                            @endif

                            @if ($question->type === \App\Models\Question::PHONE)
                                <input id="phone" class="form-control" name="response[{{ $question->id }}]" type="tel" value="{{ old('response.'.$question->id) }}">
                            @endif

                            @if ($question->type === \App\Models\Question::DATE)
                                <input type="date" class="form-control col-md-4" name="response[{{ $question->id }}]" value="{{ old('response.'.$question->id) }}">
                            @endif

                            @if ($question->type === \App\Models\Question::DROPDOWN)
                                <select id="inputState" class="form-control col-md-4" name="response[{{ $question->id }}]" value="{{ old('response.'. $question->id) }}">
                                    <option selected disabled>{{ __('Choose...') }}</option>
                                    @foreach ($question->choices()  as $choice)
                                        <option :style="`color: ${answerColor}`" value="{{ $choice }}" @if (old('response.'.$question->id) === $choice) selected @endif >{{ $choice }}</option>
                                    @endforeach
                                </select>
                            @endif

                            @if ($question->type === \App\Models\Question::RATING)
                                <div class="rating" x-data="{rating: null}" x-init="rating = '{{ old('response.'. $question->id)}}'">
                                    <input type="hidden" x-model="rating" name="response[{{ $question->id }}]" value="">
                                    <button type="button" :class="{'active': rating == 1}" @click="rating = 1" class="btn">1</button>
                                    <button type="button" :class="{'active': rating == 2}" @click="rating = 2" class="btn">2</button>
                                    <button type="button" :class="{'active': rating == 3}" @click="rating = 3" class="btn">3</button>
                                    <button type="button" :class="{'active': rating == 4}" @click="rating = 4" class="btn">4</button>
                                    <button type="button" :class="{'active': rating == 5}" @click="rating = 5" class="btn">5</button>
                                </div>
                            @endif
                            @if ($question->type === \App\Models\Question::SLIDER)
                                <div class="quest-ranger quest-ranger-{{ $loop->iteration }}">
                                <input type="range" class="range-{{ $loop->iteration }}" min="{{$question->choices()[0]}}"  max="{{$question->choices()[1]}}" data-orientation="horizontal" name="foo" >
                                <output class="slider-output slider-output-{{ $loop->iteration }}"></output>
                                <input type="hidden" id="abc" name="response[{{ $question->id }}]" value="2" class="slid-op slid-op-{{ $loop->iteration }}">
                                </div>
                            @endif

                            @error('response.'.$question->id)
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            @unless ($loop->last)
                                <hr class="my-5">
                            @endunless

                        @endforeach

                        @if (request()->has('embed'))
                            <input type="hidden" name="embed" value="true">
                        @endif

                        @can('addResponse', $survey)
                            <div class="d-flex justify-content-center mt-5">
                                <input type="submit"
                                    class="btn btn-block btn-primary text-center col-md-3 btn-lg submit-btn"
                                    :style="`background-color : ${buttonColor}; color: ${buttonTextColor}`"
                                    value="{{ __('Submit Answer') }}" />
                            </div>
                        @endcan

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style type="text/css">
    .rangeslider__fill{
        background: {{ $survey->button_color }}
    }
       
</style>
@endsection
