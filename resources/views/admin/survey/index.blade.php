@extends('layouts.admin', ['title' => 'Surveys'])
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <form action="{{ route('company.surveys.store') }}" method="POST">
					    @csrf
					    <button type="submit" class="btn btn-primary float-right mr-2">{{ __('Create Blank Survey') }}</button>
				    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Surveys') }}</h3>
                        </div>
                        <div class="card-body p-0">
                            @include('admin.shared.empty', ['lists' => $surveys])

                            @if(!$surveys->isEmpty())
                                <table class="table table-hover-table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="15%">{{ __('User') }}</th>
                                            <th width="30%">{{ __('Title') }}</th>
                                            <th width="10%">{{ __('Visibility') }}</th>
                                            <th width="10%">{{ __('Anonymous') }}</th>
                                            <th width="10%">{{ __('Responses') }}</th>
                                            <th width="10%">{{ __('Questions') }}</th>
                                            <th width="15%">{{ __('Created At') }}</th>
                                            <th width="15%">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($surveys as $key => $survey)
                                            <tr>
                                                <td>{{ $survey->user->name }}</td>
                                                <td><a href="{{ route('front.survey.show', [$survey]) }}">{{ $survey->title }}</a></td>
                                                <td>{{ ($survey->visibility == 1) ? 'On' : 'Off' }}</td>
                                                <td>{{ ($survey->annomous == 1) ? 'On' : 'Off' }}</td>
                                                <td>{{ $survey->responses_count }}</td>
                                                <td>{{ $survey->questions_count }}</td>
                                                <td>{{ date('d M, Y', strtotime($survey->created_at)) }}</td>
                                                <td><a href="{{ route('admin.surveys.edit', $survey) }}">{{ __('Edit') }}</a></td>
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
