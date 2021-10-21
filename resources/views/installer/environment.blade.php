@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header bg-success">
                    {{ __('Environment') }}
                </div>

                <form method="POST" action="{{ route('install.environment.store') }}">
                    <div class="card-body">
                        @csrf

                        @foreach($inputs as $input)
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ $input['label'] }}</label>

                                <div class="col-md-6">
                                    <input type="{{ $input['type'] }}" class="form-control @if($errors->has($input['key'])) is-invalid @endif" name="{{ $input['key'] }}" value="{{ old($input['key'], $input['default']) }}" @if(Illuminate\Support\Str::contains($input['validation'], 'required')) required @endif >

                                    @if ($errors->has($input['key']))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first($input['key']) }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary float-right">{{ __('Proceed') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
