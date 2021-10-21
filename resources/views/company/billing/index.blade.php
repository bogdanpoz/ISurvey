@extends('layouts.company')

@section('content')
<div class="content-header">
	<div class="container">

		<div class="row mt-3">
			<div class="col-lg-12">
                @include('company.billing.current-subscription')

                @include('company.billing.cancel-subscription')
			</div>
		</div>
	</div>
</div>
@endsection