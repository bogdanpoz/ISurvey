@extends('layouts.admin', ['title' => 'Update Profile'])

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-success mt-3">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Edit Profile') }}</h3>
                        </div>
                        <form method="POST" action="{{ route('admin.profile.update',$user) }}">
                            {{csrf_field()}}
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label text-sm-right">{{ __('Name') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text"
                                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" value="{{ old('name', $user->name) }}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label text-sm-right">{{ __('Email') }}</label>
                                    <div class="col-sm-6">
                                        <input type="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ old('email', $user->email) }}">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label text-sm-right">{{ __('Password') }}</label>
                                    <div class="col-sm-6">
                                        <input type="password"
                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label for="plan_id"
                                        class="col-sm-3 col-form-label text-sm-right"> {{ __('Language') }}</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="language_id">
                                            @foreach($languages as $language)
                                            <option value="{{ $language->id }}"
                                                {{ ($language->id == $user->language_id) ? 'selected' : '' }}>
                                                {{ $language->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                         @if ($errors->has('language'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('language') }}</strong>
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
