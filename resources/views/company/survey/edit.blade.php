@extends('layouts.company')

@section('content')
<div class="content-header">
	<div class="container">
		<div class="row mt-3">
			<div class="col-lg-12">
				<h4 class="mb-3">{{ $survey->title }}</h4>
				<div class="card template">
					<div class="tab-nav">
						@include('company.survey.tab', ['activeTab' => 'general', 'survey' => $survey])
						<div class="tab-content mt-3" id="myTabContent">
							<div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
								<div class="card shadow-none">
									<form class="form-horizontal" method="POST" action="{{ route('company.surveys.update', $survey) }}">
										@csrf
										@method('PUT')
										<div class="card-body">
											<div class="form-group row">
												<label for="title" class="col-sm-3 text-sm-right col-form-label">{{ __('Title') }}</label>
												<div class="col-sm-6">
													<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $survey->title) }}">
													@error('title')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
											<div class="form-group row">
												<label for="goodbye_text" class="col-sm-3 text-sm-right col-form-label">{{ __('Goodbye text') }}</label>
												<div class="col-sm-6">
													<textarea name="goodbye_text" rows="3" class="form-control @error('goodbye_text') is-invalid @enderror">{{ old('goodbye_text', $survey->goodbye_text) }}</textarea>
													@error('goodbye_text')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
											<div class="form-group row">
												<label for="welcome_message" class="col-sm-3 text-sm-right col-form-label">{{ __('Welcome Message') }}</label>
												<div class="col-sm-6">
													<textarea name="welcome_message" rows="3" class="form-control @error('welcome_message') is-invalid @enderror">{{ old('welcome_message', $survey->welcome_message) }}</textarea>
													@error('welcome_message')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
											<div class="form-group row">
												<label for="redirect_url" class="col-sm-3 text-sm-right col-form-label">{{ __('Redirect URL') }}</label>
												<div class="col-sm-6">
													<input type="text" class="form-control @error('redirect_url') is-invalid @enderror" name="redirect_url" value="{{ old('redirect_url', $survey->redirect_url) }}">
													<small class="form-text text-muted">{{ __('Redirect on completion') }}</small>
													@error('redirect_url')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
											<div class="form-group row">
												<label for="password" class="col-sm-3 text-sm-right col-form-label">{{ __('Password') }}</label>
												<div class="col-sm-6">
													<input type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password', $survey->password) }}">
													@error('password')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>

											<div class="form-group row">
												<label for="redirect_url" class="col-sm-3 text-sm-right col-form-label">{{ __('Max Survey for Results') }}</label>
												<div class="col-sm-6">
													<input type="number" class="form-control @error('max_results') is-invalid @enderror" name="max_results" value="{{ old('max_results', $survey->max_results) }}">
													<small class="form-text text-muted">{{ __('Max Survey for Results') }}</small>
													@error('max_results')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 text-sm-right col-form-label">{{ __('Turn On Password') }}</label>
												<div class="col-sm-6">
													<input type="checkbox" name="require_password" @if($survey->require_password) checked @endif value="1" data-bootstrap-switch>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 text-sm-right col-form-label">{{ __('Get email for new responses') }}</label>
												<div class="col-sm-6">
													<input type="checkbox" name="notify_new_responses" @if($survey->notify_new_responses) checked @endif value="1" data-bootstrap-switch>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 text-sm-right col-form-label">{{ __('Visibility') }}</label>
												<div class="col-sm-6">
													<input type="checkbox" name="visibility" @if($survey->visibility) checked @endif value="1" data-bootstrap-switch>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-3 text-sm-right col-form-label">{{ __('Anonymous') }}</label>
												<div class="col-sm-6">
													<input type="checkbox" name="annomous" @if($survey->annomous) checked @endif value="0" data-bootstrap-switch>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-3 text-sm-right col-form-label"></label>
												<div class="col-sm-6">
													<button type="submit" class="btn btn-info">{{ __('Save Changes') }}</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
