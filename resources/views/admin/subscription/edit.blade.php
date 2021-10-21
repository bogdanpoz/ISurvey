@extends('layouts.admin', ['title' => 'Subscriptions'])

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-success mt-3">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Edit Subscription') }}</h3>
                        </div>
                        <form role="form" method="POST"
                            action="{{ route('admin.subscriptions.update', $subscription) }}">
                            {{csrf_field()}}
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="plan_id"
                                        class="col-sm-3 col-form-label text-sm-right"> {{__('Plan')}}</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="plan_id">
                                            @foreach($plans as $plan)
                                            <option value="{{ $plan->id }}"
                                                {{ ($plan->id == $subscription->plan_id) ? 'selected' : '' }}>
                                                {{ $plan->title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label text-sm-right">{{ __('Starts At') }}</label>
                                    <div class="col-sm-4">
                                         <input type="date" class="form-control {{ $errors->has('starts_at') ? ' is-invalid' : '' }}" name="starts_at" value="{{ old('starts_at', $subscription->starts_at?$subscription->starts_at->format('Y-m-d'):'') }}">             @if ($errors->has('starts_at'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('starts_at') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label text-sm-right">{{ __('Ends At') }}</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control {{ $errors->has('ends_at') ? ' is-invalid' : '' }}" name="ends_at"  value="{{ old('ends_at', $subscription->ends_at?$subscription->ends_at->format('Y-m-d'):'') }}">
                                        @if ($errors->has('ends_at'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('ends_at') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="select" class="col-sm-3 col-form-label text-sm-right"></label>
                                    <div class="col-sm-6">
                                        <button type="submit"
                                            class="btn btn-primary">{{ __('Submit')}}</button>
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
