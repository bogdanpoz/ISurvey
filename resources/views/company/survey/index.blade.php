@extends('layouts.company')

@section('content')
<div class="content-header">
	<div class="container">

		<div class="row mb-2">
			<div class="col-sm-3"></div>
			<div class="col-sm-9 float-right">
				<a href="{{ route('company.surveys.templates.index') }}" class="btn btn-outline-secondary float-right mb-2">{{ __('Choose From Template') }}</a>
				<form action="{{ route('company.surveys.store') }}" method="POST">
					@csrf
					<button type="submit" class="btn btn-primary float-right mr-2">{{ __('Create Blank Survey') }}</button>
				</form>
			</div>

		</div>
		<div class="row mt-3">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title m-0"><strong>{{ __('Your Surveys') }}</strong></h5>
					</div>
					<div class="card-body table-responsive p-0">
						@includeWhen($surveys->isEmpty(), 'company.shared.empty', [
        					'heading' => __('Create your first survey '),
        					'description' => 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print.',
						])

						@if(!$surveys->isEmpty())
							<table class="table table-hover">
								<thead>
									<tr>
										<th width="50%">{{ __('Title') }}</th>
										<th width="10%">{{ __('Visibility') }}</th>
										<th width="10%">{{ __('Anonymous') }}</th>
										<th width="10%">{{ __('Questions') }}</th>
										<th width="10%">{{ __('Responses') }}</th>
										<th width="20%">{{ __('Created At') }}</th>
									</tr>
								</thead>
								<tbody>
									@foreach($surveys as $survey)
										<tr>
											<td><a href="{{ route('company.surveys.edit', $survey) }}">{{ $survey->title }}</a></td>
											<td><span class="badge @if($survey->visibility) bg-success @else bg-warning @endif">@if($survey->visibility) Visible @else Not Visible @endif</span></td>
											<td><span class="badge @if($survey->annomous) bg-info @else bg-info @endif">@if($survey->annomous) Anonymous @else Not Anonymous @endif</span></td>
											<td>{{ $survey->questions_count }}</td>
											<td>{{ $survey->responses_count }}</td>
											<td>{{ $survey->created_at }}</td>
											<td>
                                            <form method="POST" action="{{ route('company.surveys.destroy',$survey) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        </td>
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
</div>
@endsection
