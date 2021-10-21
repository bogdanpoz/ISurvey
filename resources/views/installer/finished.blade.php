@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success">{{ __('Success') }}</div>

                <div class="card-body">
                    <p>{{ __('The application has been installed.') }}</p>

                    <p><a href="{{ route('login') }}">{{ __('Administrator Login') }}</a></p>

                    <p><a href="/">{{ __('Landing Page') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
