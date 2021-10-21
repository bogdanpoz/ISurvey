@extends('layouts.admin', ['title' => 'Application Settings'])

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-success mt-3">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Configuration') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($settings as $setting)
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">
                                                    <a href="{{ $setting['route'] }}">{{ $setting['title'] }}</a>
                                                </h6>
                                                <p class="card-text">{{ $setting['description'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
