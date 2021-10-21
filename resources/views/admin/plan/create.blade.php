@extends('layouts.admin', ['title' => 'Create Plan'])

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-success mt-3">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Add Plan') }}</h3>
                        </div>
                        <form method="POST" action="{{ route('admin.plans.store') }}">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-3 col-form-label text-sm-right">{{ __('Title') }}</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="code" class="col-sm-3 col-form-label text-sm-right">{{ __('Description') }}</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control @error('description') is-invalid @enderror" rows="3" name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="code" class="col-sm-3 col-form-label text-sm-right">{{ __('Code') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}">
                                        @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="price" class="col-sm-3 col-form-label text-sm-right">{{ __('Price') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="code" class="col-sm-3 col-form-label text-sm-right">{{ __('Stripe Plan ID') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('stripe_plan_id') is-invalid @enderror" name="stripe_plan_id" value="{{ old('stripe_plan_id') }}">
                                        @error('stripe_plan_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="interval" class="col-sm-3 col-form-label text-sm-right">{{ __('Interval') }}</label>
                                    <div class="col-sm-6">
                                        <select class="form-control @error('interval') is-invalid @enderror" name="interval" value="{{ old('interval') }}">
                                            <option disabled selected>{{ __('Select Interval') }}</option>
                                            <option value="monthly" @if (old('interval')=="monthly" ) {{ 'selected' }} @endif>{{ __('Monthly') }}</option>
                                            <option value="yearly" @if (old('interval')=="yearly" ) {{ 'selected' }} @endif>{{ __('Yearly') }}</option>
                                        </select>
                                        @error('interval')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-sm-right">{{ __('Survey Count') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text"
                                            class="form-control @error('survey_count') is-invalid @enderror"
                                            name="survey_count" value="{{ old('survey_count') }}" placeholder="Limit">
                                        @error('survey_count')
                                        <span class="invalid-feedback d-block"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-sm-right">{{ __('Question Count Per Survey') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text"
                                            class="form-control @error('question_count_per_survey') is-invalid @enderror"
                                            name="question_count_per_survey" value="{{ old('question_count_per_survey') }}" placeholder="Limit">
                                        @error('question_count_per_survey')
                                        <span class="invalid-feedback d-block"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-sm-3 col-form-label text-sm-right">{{ __('Response Count Per Survey') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text"
                                            class="form-control @error('response_count_per_survey') is-invalid @enderror"
                                            name="response_count_per_survey" value="{{ old('response_count_per_survey') }}" placeholder="Limit">
                                        @error('response_count_per_survey')
                                        <span class="invalid-feedback d-block"
                                            role="alert"><strong>{{ $message }}</strong></span>
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
            </div>
        </div>
    </section>
</div>
@endsection