@extends('layouts.admin', ['title' => 'Subscriptions'])

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{ route('admin.subscriptions.create') }}" class="btn btn-primary float-sm-right">{{ __('Add Subscription') }}</a>
                    <div class="dropdown show">
                        <a class="btn btn-custom dropdown-toggle float-sm-right" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Filter') }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ url()->current().'?'.http_build_query(array_merge(request()->except('page'),['status' => 'active'])) }}">{{ __('Active') }}</a>
                            <a class="dropdown-item" href="{{ url()->current().'?'.http_build_query(array_merge(request()->except('page'),['status' => 'ended'])) }}">{{ __('Ended') }}</a>
                            <a class="dropdown-item" href="{{ url()->current().'?'.http_build_query(array_merge(request()->except('page'),['status' => 'canceled'])) }}">{{ __('Canceled') }}</a>
                        </div>
                    </div>
                    @if (app('request')->all())
                     <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-primary">{{ __('Reset') }}</a>
                     @endif
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
                            <h3 class="card-title">{{ __('Subscriptions') }}</h3>
                        </div>
                        <div class="card-body" style="padding: 0px 0px;">
                            @include('admin.shared.empty', ['lists' => $subscriptions])

                            @if(!$subscriptions->isEmpty())
                            <table class="table table-hover-table-responsive">
                                <thead>
                                    <tr>
                                        <th width="15%">{{__('Name')}}</th>
                                        <th width="15%">{{ __('Plan')}}</th>
                                        <th width="15%">{{ __('Starts At')}}</th>
                                        <th width="15%">{{__('Ends At')}}</th>
                                        <th width="10%">{{__('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subscriptions as $subscription)
                                        <tr>
                                            <td>{{ $subscription->user->name }}</td>
                                            <td>{{ $subscription->plan->title }} </td>
                                            <td>{{ date('d M, Y', strtotime($subscription->starts_at)) }}</td>
                                            <td>{{ date('d M, Y', strtotime($subscription->ends_at)) }}</td>
                                            <td><a href="{{ route('admin.subscriptions.edit', $subscription) }}">{{ __('Edit') }}</a></td>
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
