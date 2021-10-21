@extends('layouts.company')

@section('content')
<div class="content-header">
	<div class="container">
		<div class="row mt-3">
			<div class="col-lg-12">
				<h4 class="mb-3">{{ $survey->title }}</h4>
				<div class="card template">
					<div class="tab-nav">
						@include('company.survey.tab', ['activeTab' => 'design', 'survey' => $survey])
						<div class="tab-content mt-3" id="myTabContent">
							<div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
								<div class="card shadow-none">
									<form class="form-horizontal" method="POST" action="{{ route('company.surveys.design.update', $survey) }}">
										@csrf
										@method('PUT')
										<div class="card-body">
											<div class="form-group row">
												<label for="question_color" class="col-sm-3 text-sm-right col-form-label">{{ __('Font') }}</label>
												<div class="col-sm-3">
                                                    <div class="input-group survey-colorpicker">
                                                        <select class="form-control input-lg" name="font_style" id="font_style_val">
															@if($survey->font_style)
															<option value="{{ $survey->font_style }}" selected>{{ $survey->font_style }}</option>
															@else
															<option value="Arial" selected>Arial</option>
															@endif
															<option value="Comic Sans MS">Comic Sans MS</option>
															<option value="Times New Roman">Times New Roman</option>
															<option value="Courier New">Courier New</option>
															<option value="Verdana">Verdana</option>
															<option value="Sans Serif">Sans Serif</option>
															<option value="Arial">Arial</option>
															<option value="Trebuchet MS">Trebuchet MS</option>
															<option value="Arial Black">Arial Black</option>
															<option value="Impact">Impact</option>
															<option value="Bookman">Bookman</option>
															<option value="Garamond">Garamond</option>
															<option value="Palatino">Palatino</option>
															<option value="Georgia">Georgia</option>
														</select>
                                                    </div>
													<div contenteditable="true" id="show_font" class="form-control input-lg" style="margin-top:5px;height:100px">
														This is survey font style.
													</div>
												</div>
											</div>
                                            <div class="form-group row">
												<label for="question_color" class="col-sm-3 text-sm-right col-form-label">{{ __('Question') }}</label>
												<div class="col-sm-3">
                                                    <div class="input-group survey-colorpicker">
                                                        <input type="text" class="form-control input-lg" value="{{ $survey->question_color }}" name="question_color" />
                                                        <span class="input-group-append">
                                                            <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                                        </span>
                                                    </div>
												</div>
											</div>
                                            <div class="form-group row">
												<label for="answer_color" class="col-sm-3 text-sm-right col-form-label">{{ __('Answer') }}</label>
												<div class="col-sm-3">
                                                    <div class="input-group survey-colorpicker">
                                                        <input type="text" class="form-control input-lg" value="{{ $survey->answer_color }}" name="answer_color" />
                                                        <span class="input-group-append">
                                                            <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                                        </span>
                                                    </div>
												</div>
											</div>
                                            <div class="form-group row">
												<label for="button_color" class="col-sm-3 text-sm-right col-form-label">{{ __('Button') }}</label>
												<div class="col-sm-3">
                                                    <div class="input-group survey-colorpicker">
                                                        <input type="text" class="form-control input-lg" value="{{ $survey->button_color }}" name="button_color" />
                                                        <span class="input-group-append">
                                                            <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                                        </span>
                                                    </div>
												</div>
											</div>
                                            <div class="form-group row">
												<label for="button_text_color" class="col-sm-3 text-sm-right col-form-label">{{ __('Button Text') }}</label>
												<div class="col-sm-3">
                                                    <div class="input-group survey-colorpicker">
                                                        <input type="text" class="form-control input-lg" value="{{ $survey->button_text_color }}" name="button_text_color" />
                                                        <span class="input-group-append">
                                                            <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                                        </span>
                                                    </div>
												</div>
											</div>
                                            <div class="form-group row">
												<label for="background_color" class="col-sm-3 text-sm-right col-form-label">{{ __('Background') }}</label>
												<div class="col-sm-3">
                                                    <div class="input-group survey-colorpicker">
                                                        <input type="text" class="form-control input-lg" value="{{ $survey->background_color }}" name="background_color" />
                                                        <span class="input-group-append">
                                                            <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                                        </span>
                                                    </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		var style = $('#font_style_val').val()
		$('#show_font').css('font-family',style)
		$('#font_style_val').change(function(){
			var style = $(this).val()
			$('#show_font').css('font-family',style)
		})
	})
</script>
@endsection
