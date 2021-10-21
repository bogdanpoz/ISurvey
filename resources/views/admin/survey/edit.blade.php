@extends('layouts.admin', ['title' => 'Update Survey'])

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-success mt-3">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Edit Survey') }}</h3>
                        </div>
                        <form method="POST" action="{{ route('admin.surveys.update',$survey) }}">
                            {{csrf_field()}}
                            @method('PUT')
                           <div class="card-body">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-3 col-form-label text-sm-right">{{ __('Title') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $survey->title) }}">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label for="goodbye_text" class="col-sm-3 col-form-label text-sm-right">{{ __('Good Bye Text') }}</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control @error('goodbye_text') is-invalid @enderror" rows="3" name="goodbye_text">{{ old('goodbye_text', $survey->goodbye_text) }}</textarea>
                                        @error('goodbye_text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="goodbye_text" class="col-sm-3 col-form-label text-sm-right">{{ __('Welcome Message') }}</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control @error('welcome_message') is-invalid @enderror" rows="3" name="welcome_message">{{ old('welcome_message', $survey->welcome_message) }}</textarea>
                                        @error('welcome_message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="redirect_url" class="col-sm-3 col-form-label text-sm-right">{{ __('Redirect Url') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('redirect_url') is-invalid @enderror" name="redirect_url" value="{{ old('redirect_url', $survey->redirect_url) }}">
                                        @error('redirect_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label text-sm-right">{{ __('Password') }}</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="select" class="col-sm-3 col-form-label text-sm-right">{{ __('Require Password') }}</label>
                                    <div class="col-sm-6">
                                        <select class="form-control @error('require_password') is-invalid @enderror" name="require_password">
                                            <option {{ old('require_password', $survey->require_password) == 1 ? 'selected' : '' }} value="1">{{ __('Yes') }}</option>
                                            <option {{ old('require_password', $survey->require_password) == 0 ? 'selected' : '' }} value="0">{{ __('No') }}</option>
                                        </select>
                                        @error('require_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="select" class="col-sm-3 col-form-label text-sm-right">{{ __('Anonymous') }}</label>
                                    <div class="col-sm-6">
                                        <select class="form-control @error('annomous') is-invalid @enderror" name="annomous">
                                            <option {{ old('annomous', $survey->annomous) == 1 ? 'selected' : '' }} value="1">{{ __('On') }}</option>
                                            <option {{ old('annomous', $survey->annomous) == 0 ? 'selected' : '' }} value="0">{{ __('Off') }}</option>
                                        </select>
                                        @error('annomous')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="select" class="col-sm-3 col-form-label text-sm-right">{{ __('Visibility') }}</label>
                                    <div class="col-sm-6">
                                        <select class="form-control @error('visibility') is-invalid @enderror" name="visibility">
                                            <option {{ old('visibility', $survey->visibility) == 1 ? 'selected' : '' }} value="1">{{ __('On') }}</option>
                                            <option {{ old('visibility', $survey->visibility) == 0 ? 'selected' : '' }} value="0">{{ __('Off') }}</option>
                                        </select>
                                        @error('visibility')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="question_color" class="col-sm-3 col-form-label text-sm-right">{{ __('Question Color') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('question_color') is-invalid @enderror" name="question_color" value="{{ old('question_color', $survey->question_color) }}">
                                        @error('question_color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="answer_color" class="col-sm-3 col-form-label text-sm-right">{{ __('Answer Color') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('answer_color') is-invalid @enderror" name="answer_color" value="{{ old('answer_color', $survey->answer_color) }}">
                                        @error('answer_color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="button_color" class="col-sm-3 col-form-label text-sm-right">{{ __('Button Color') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('button_color') is-invalid @enderror" name="button_color" value="{{ old('button_color', $survey->button_color) }}">
                                        @error('button_color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="button_text_color" class="col-sm-3 col-form-label text-sm-right">{{ __('Button Text Color') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('button_text_color') is-invalid @enderror" name="button_text_color" value="{{ old('button_text_color', $survey->button_text_color) }}">
                                        @error('button_text_color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="background_color" class="col-sm-3 col-form-label text-sm-right">{{ __('Background Color') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('background_color') is-invalid @enderror" name="background_color" value="{{ old('background_color', $survey->background_color) }}">
                                        @error('background_color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="select" class="col-sm-3 col-form-label text-sm-right">{{ __('Add as a Template') }}</label>
                                    <div class="col-sm-6">
                                        <select class="form-control @error('is_template') is-invalid @enderror" name="is_template">
                                            <option {{ old('is_template', $survey->is_template) == 1 ? 'selected' : '' }} value="1">Yes</option>
                                            <option {{ old('is_template', $survey->is_template) == 0 ? 'selected' : '' }} value="0">No</option>
                                        </select>
                                        @error('is_template')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="select" class="col-sm-3 col-form-label text-sm-right"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
                <x-admin.delete :action="route('admin.surveys.destroy',$survey)" />
            </div>
        </div>
    </section>
</div>
@endsection