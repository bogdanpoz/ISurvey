@extends('layouts.admin', ['title' => 'Commands'])

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card card-outline card-success mt-3">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Artisan Commands') }}</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th width="80%">{{ __('Description') }}</th>
                                        <th width="20%">{{ __('Command') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($commands as $command)
                                    <tr>
                                        <td>{{ $command['title'] }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.commands.execute') }}">
                                                @csrf
                                                <input type="hidden" name="command" value="{{ $command['command'] }}">
                                                <button type="submit" class="btn btn-sm btn-danger">{{ __('Execute') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
