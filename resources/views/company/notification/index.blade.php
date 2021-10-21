@extends('layouts.company')

@section('content')
<div class="content-header">
	<div class="container">
		
		<div class="row mt-3">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title m-0"><strong>{{ __('Notifications') }}</strong></h5>
                        <i class="fa fa-bell not-bell" aria-hidden="true"></i>
					</div>
					<div class="card-body table-responsive">
                        @if(!$notifications->isEmpty())
                            <div class="row survey-tab">
                                @foreach($notifications as $notification)

                                    @if(isset($notification->data['message']))
                                        <div class="col-sm-12">
                                            <div class="alert-not alert-success-not" role="alert">
                                                <a href="{{ route('company.notifications.show') }}?notification_id={{$notification->id}}" class="not-message">
      											{{ $notification->data['message']}}
                                                </a>
      											<a href="{{ route('company.notifications.read') }}?id={{$notification->id}}" class="not-mark-read">{{ __('Mark as read') }}</a>
    										</div>
                                        </div>
                                    @endif
                                    @if(isset($notification->data['title']))
                                        <div class="col-sm-12">
                                            <div class="alert-not alert-success-not" role="alert">
                                                <a href="{{ route('company.notifications.show') }}?id={{$notification->id}}" class="not-message">
                                                {{ $notification->data['title']}}
                                                </a>
                                                <a href="{{ route('company.notifications.read') }}?notification_id={{$notification->id}}" class="not-mark-read">{{ __('Mark as read') }}</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="col-sm-12">
                                    <a href="{{ route('company.notifications.all.read') }}" class="not-mark-all-read">{{ __('Mark all as read') }}</a>
                                </div>
                            </div>
                        @else
                            <div class="row survey-tab">
                                    <div class="col-sm-12">
                                        <div class="alert alert-light" role="alert">
                                            {{ __('No notification(s) found!') }}
 
                                        </div>
                                    </div>
                            </div>  
                        @endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
