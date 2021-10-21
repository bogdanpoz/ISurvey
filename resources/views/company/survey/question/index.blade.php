@extends('layouts.company')

@section('content')
<div class="content-header">
	<div class="container">
		<div class="row mt-3">
			<div class="col-lg-12">
				<h4 class="mb-3">{{ $survey->title }}</h4>
				<div class="card template">
					<div class="tab-nav">
						@include('company.survey.tab', ['activeTab' => 'questions', 'survey' => $survey])
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
								<div class="card shadow-none">
									@livewire('company.show-question-builder', ['survey' => $survey,])
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