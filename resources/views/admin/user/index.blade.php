@extends('layouts.admin', ['title' => 'Users'])

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-success mt-3">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Users') }}</h3>
                        </div>
                        <div class="card-body p-0">
                            @include('admin.shared.empty', ['lists' => $users])

                            @if(!$users->isEmpty())
                            <table class="table table-hover-table-responsive">
                                <thead>
                                    <tr>
                                        <th width="25%">{{ __('Name') }}</th>
                                        <th width="25%">{{ __('Email') }}</th>
                                        <th width="25%">{{ __('Created At') }}</th>
                                        <th width="25%">{{ __('Updated At') }}</th>
                                        <th width="25%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ date('d M, Y', strtotime($user->created_at)) }}</td>
                                        <td>{{ date('d M, Y', strtotime($user->updated_at)) }}</td>
                                        <td><a href="{{ route('admin.users.edit', $user) }}">{{ __('Edit') }}</a></td>
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