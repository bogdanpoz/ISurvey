@extends('layouts.admin', ['title' => 'Create Language'])

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-success mt-3">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Add Language') }}</h3>
                        </div>
                        <form method="POST" action="{{ route('admin.language.store') }}">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label text-sm-right">{{ __('Name') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        name="name" value="{{old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label text-sm-right">{{ __('Code') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text"
                                        class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}"
                                        name="code" value="{{old('code') }}">
                                        @if ($errors->has('code'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('code') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status"
                                    class="col-sm-3 col-form-label text-sm-right">{{ __('Status') }}</label>
                                    <div class="col-sm-6">
                                        <select class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}"
                                            name="status">
                                            <option disabled selected>Status</option>
                                            <option value="1" @if (old('status')=="1" ) {{ 'selected' }} @endif>
                                            {{ __('Enabled') }}</option>
                                            <option value="0" @if (old('status')=="0" ) {{ 'selected' }} @endif>
                                            {{ __('Disabled') }}</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="select" class="col-sm-3 col-form-label text-sm-right"></label>
                                    <div class="col-sm-6">
                                        <button type="submit"
                                        class="btn btn-primary">{{ __('Submit') }}</button>
                                    </div>
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
