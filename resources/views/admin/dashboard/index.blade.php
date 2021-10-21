@extends('layouts.admin', ['title' => 'Dashboard'])

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning elevation-1">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('Total Users') }}</span>
                                <span class="info-box-number">{{ $users }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-info elevation-1">
                            <i class="fa fa-question-circle" aria-hidden="true"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('Total Surveys') }}</span>
                                <span class="info-box-number">{{ $surveys }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1">
                            <i class="fa fa-inbox" aria-hidden="true"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('Total Responses') }}</span>
                                <span class="info-box-number">{{ $responses }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Users by Day') }}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="">
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget=""></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="chart-users" style="height:230px; min-height:230px"></canvas>
                        </div>
                    </div>
                </div>

                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Surveys by Day') }}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="">
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="">
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="chart-survey" style="height:230px; min-height:230px"></canvas>
                        </div>
                    </div>
                </div>

                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Responses by Day') }}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="">
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="">
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="chart-response" style="height:230px; min-height:230px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script type="text/javascript">
        var userChart =
        {
            labels: @json(array_column($userData, 'date')),
            data: @json(array_column($userData, 'count'))
        }

        var surveyChart =
        {
            labels: @json(array_column($surveyData, 'date')),
            data: @json(array_column($surveyData, 'count'))
        }

        var responseChart =
        {
            labels: @json(array_column($responseData, 'date')),
            data: @json(array_column($responseData, 'count'))
        }
    </script>
@endsection
