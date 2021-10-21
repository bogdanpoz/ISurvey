@extends('layouts.admin',['title' => 'Extensions'])

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">


            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{ route('admin.extensions.create') }}" class="btn btn-primary float-sm-right">{{ __('Install Extensions') }}</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-success mt-3">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Installed Extensions') }}</h3>
                        </div>
                        <div class="card-body p-0">
                           @include('admin.shared.empty', ['lists' => $extensions])

                           @if(!$extensions->isEmpty())
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="15%">{{ __('Name') }}</th>
                                            <th width="15%">{{ __('Code') }}</th>
                                            <th width="45%">{{ __('Description') }}</th>
                                            <th width="10%">{{ __('Version') }}</th>
                                            <th width="15%">{{ __('Installed At') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($extensions as $extension)
                                            <tr>
                                                <td><a href="/admin/extensions/{{ strtolower($extension->code) }}">{{ $extension->name }}</a></td>
                                                <td>{{ $extension->code }}</td>
                                                <td>{{ $extension->description }}</td>
                                                <td>{{ $extension->version }}</td>
                                                <td>{{ $extension->created_at->format('d/m/Y') }}</td>
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
