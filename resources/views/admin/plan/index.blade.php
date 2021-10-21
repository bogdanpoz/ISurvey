@extends('layouts.admin', ['title' => 'Plans'])

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{ route('admin.plans.create') }}" class="btn btn-primary float-sm-right">{{ __('Add Plan') }}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Plans') }}</h3>
                        </div>
                            @include('admin.shared.empty', ['lists' => $plans])

                            @if(!$plans->isEmpty())
                                <table class="table table-hover-table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="25%">{{ __('Title') }}</th>
                                            <th width="25%">{{ __('Code') }}</th>
                                            <th width="25%">{{ __('Price') }}</th>
                                            <th width="25%">{{ __('Interval') }}</th>
                                            <th width="25%">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($plans as $key => $plan)
                                            <tr>
                                                <td>{{ $plan->title }}</td>
                                                <td>{{ $plan->code }}</td>
                                                <td>{{ $plan->price }}</td>
                                                <td>{{ ucfirst($plan->interval) }}</td>
                                                 <td><a href="{{ route('admin.plans.edit', $plan) }}">{{ __('Edit') }}</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
