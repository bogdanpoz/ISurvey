@extends('layouts.admin', ['title' => 'Notification'])

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                       <div class="card card-outline card-success mt-3">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Send Notification') }}</h3>
                        </div>
                        <form method="POST" action="{{ route('admin.notification.store') }}">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-3 col-form-label text-sm-right">{{ __('Title') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label for="code" class="col-sm-3 col-form-label text-sm-right">{{ __('Body') }}</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control @error('body') is-invalid @enderror" rows="3" name="body">{{ old('body') }}</textarea>
                                        @error('body')
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
            </div>
        </div>
    </section>
</div>
@endsection