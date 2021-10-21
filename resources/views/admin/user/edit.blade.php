@extends('layouts.admin', ['title' => 'Update User'])

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-success mt-3">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Edit User') }}</h3>
                        </div>
                        <form method="POST" action="{{ route('admin.users.update',$user) }}">
                            {{csrf_field()}}
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label text-sm-right">{{ __('Name') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label text-sm-right">{{ __('Email') }}</label>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label text-sm-right">{{ __('Password') }}</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label for="status"
                                    class="col-sm-3 col-form-label text-sm-right">{{ __('Language')}}</label>
                                    <div class="col-sm-6">
                                        <select class="form-control @error('language_id') is-invalid @enderror" name="language_id">
                                            @foreach($languages as $language)
                                            <option value="{{ $language->id }}"
                                                {{ ($language->id == $user->language_id) ? 'selected' : '' }}>
                                                {{ $language->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('language')
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
                <x-admin.delete :action="route('admin.users.destroy',$user)" />
            </div>
        </div>
    </section>
</div>
@endsection