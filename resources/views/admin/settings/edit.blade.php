@extends('layouts.admin', ['title' => 'Application Settings'])

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                        <div class="card card-outline card-success mt-3">
                            <div class="card-header">
                                <h3 class="card-title">{{ $section['title'] }}</h3>
                            </div>

                            <form method="POST" action="{{ route('admin.settings.update', $sectionId) }}">
                                {{csrf_field()}}
                                <div class="card-body">
                                    @foreach($section['inputs'] as $input)
                                        <div class="form-group row">
                                            <label for="{{ $input['key'] }}" class="col-sm-3 col-form-label text-sm-right">{{ $input['label'] }}</label>
                                            <div class="{{ $input['class'] }}">
                                                @includeIf('admin.settings.inputs.' . $input['type'])
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="form-group row">
                                        <label for="select" class="col-sm-3 col-form-label text-sm-right"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
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