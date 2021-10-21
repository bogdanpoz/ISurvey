@extends('layouts.admin', ['title' => 'Languages'])

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <a href="{{ route('admin.language.create') }}"
                    class="btn btn-primary float-sm-right">{{ __('Add New Language') }}</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-success mt-3">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Languages') }}</h3>
                        </div>
                        <div class="card-body p-0">
                            @include('admin.shared.empty', ['lists' => $languages])

                            @if(!$languages->isEmpty())
                                <table class="table table-hover-table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="40%">{{ __('Name') }}</th>
                                            <th width="20%">{{ __('Code') }}</th>
                                            <th width="20%">{{ __('Status') }}</th>
                                            <th width="20%">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($languages as $key => $language)
                                            <tr>
                                                <td>{{ $language->name }}</td>
                                                <td>{{ $language->code }}</td>
                                                <td>{{ ($language->status == 1) ? 'Enabled':'Disabled' }}</td>
                                                <td><a href="{{ route('admin.language.edit', $language) }}">{{ __('Edit') }}</a></td>
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
        {{ $languages->links() }}
    </section>
</div>
@endsection
