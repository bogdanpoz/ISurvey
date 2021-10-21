@extends('layouts.company')

@section('content')
<div class="content-header">
	<div class="container">
		
		<div class="row mt-3">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">


						<h5 class="card-title m-0">
                        @if(isset($notification->data['message']))
                            {{ $notification->data['message'] }}
                        @endif
                        @if(isset($notification->data['title']))
                            {{ $notification->data['title'] }}
                        @endif                  
                       </h5>
                        
					</div>
					<div class="card-body table-responsive">

                            <div class="row survey-tab">
                                @if(isset($notification->data['body']))
                                    <div class="col-sm-12">
                                        <div >
                                            {{ $notification->data['body']}}
                                        </div>
                                    </div>
                                 @endif
                            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
