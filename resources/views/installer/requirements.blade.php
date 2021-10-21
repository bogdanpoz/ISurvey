@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(!$phpSupportInfo['supported'])
                <div class="alert alert-danger" role="alert">
                    {{ __('Fix the following issues before proceeding') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header bg-success">
                    {{ __('Permissions') }}
                </div>

                <div class="card-body p-0">
                    <table class="table">
                        <tr>
                            <td>PHP <strong>(version {{ $phpSupportInfo['minimum'] }} required)</strong></td>
                            <td>
                                @if($phpSupportInfo['supported'])
                                    <span class="badge badge-primary p-2">{{ $phpSupportInfo['current'] }}</span>
                                @else
                                    <span class="badge badge-danger p-2">{{ $phpSupportInfo['current'] }}</span>
                                @endif
                            </td>
                        </tr>

                        @foreach($requirements['requirements']['php'] as $requirement => $status)
                            <tr>
                                <td>{{ $requirement }}</td>
                                <td>
                                    @if($status)
                                        <span class="badge badge-primary p-2">{{ __('Ok') }}</span>
                                    @else
                                        <span class="badge badge-danger p-2">{{ __('Not Ok') }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="card-footer text-muted">
                        <form action="{{ route('install.environment.create') }}" method="GET">
                            <button type="submit" class="btn btn-primary float-right" @if(!$phpSupportInfo['supported']) disabled="disabled" @endif >{{ __('Proceed') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
