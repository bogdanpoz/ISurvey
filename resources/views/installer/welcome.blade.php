@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success">{{ __('Welcome') }}</div>

                <div class="card-body">
                    <p>{{ __('Welcome to the installation process. Before getting started, we need some information on the database. You will need to know the following items before proceeding.') }}</p>

                    <ul>
                        <li>{{ __('Database name') }}</li>
                        <li>{{ __('Database username') }}</li>
                        <li>{{ __('Database password') }}</li>
                        <li>{{ __('Database host') }}</li>
                    </ul>

                </div>

                <div class="card-footer text-muted">
                    <a href="{{ route('install.permissions') }}" class="btn btn-primary float-right">{{ __('Let\'s Go') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
