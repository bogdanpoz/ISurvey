@extends('layouts.admin', ['title' => 'Update Offline Payment Request'])

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-success mt-3">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Edit Offline Payment Request') }}</h3>
                        </div>
                        <form role="form" method="POST"
                            action="{{ route('admin.transactions.update', $transaction) }}">
                            {{csrf_field()}}
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label text-sm-right">{{ __('Amount') }}</label>
                                    <div class="col-sm-4">
                                        <input type="text"
                                        class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}"
                                        name="amount" value="{{old('amount',$transaction->amount) }}">
                                        @if ($errors->has('amount'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('amount') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label text-sm-right">{{ __('Status') }}</label>
                                    <div class="col-sm-4">
                                        <input type="text"
                                        class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}"
                                        name="status" value="{{old('status',$transaction->status) }}">
                                        @if ($errors->has('status'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label text-sm-right">{{ __('Note') }}</label>
                                    <div class="col-sm-4">
                                        <input type="text"
                                        class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}"
                                        name="note" value="{{old('note',$transaction->note) }}">
                                        @if ($errors->has('note'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('note') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                   <div class="form-group row">
                                    <label for="select" class="col-sm-3 col-form-label text-sm-right"></label>
                                    <div class="col-sm-4">
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
