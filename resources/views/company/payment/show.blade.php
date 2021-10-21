@extends('layouts.company')

@section('content')
<div class="content-header">
	<div class="container">

		<div class="row mt-3">
			<div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Payment method') }}</h3>
                    </div>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('company.payment.store') }}" method="POST">
                            @csrf

                            <table class="table table-bordered">
                                <tbody>
                                    @if(settings()->get('stripesubscription_status'))
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment_method" value="stripe">
                                                    <label class="form-check-label" for="payment_method">{{ settings()->get('stripesubscription_title') }}</label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif

                                    @if(settings()->get('paypalsubscription_status'))
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment_method" value="paypal">
                                                    <label class="form-check-label" for="payment_method">{{ settings()->get('paypalsubscription_title') }}</label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif

                                    @if(settings()->get('offlinesubscription_status'))
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment_method" value="offline">
                                                    <label class="form-check-label" for="payment_method">{{ settings()->get('offlinesubscription_title') }}</label>
                                                </div>
                                                <p class="mt-3">{{ settings()->get('offlinesubscription_instructions') }}</p>
                                                <textarea name="payment_note" rows="2" class="form-control" placeholder="Add your note."></textarea>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            <input type="hidden" name="plan_id" value="{{ $plan->id }}">

                            <button class="btn btn-primary mt-3 btn-block" type="submit">{{ __('Pay Now') }}</button>
                        </form>
                    </div>
                </div>
			</div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Plan Summary') }}</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="border-0" width="30%">{{ __('Plan') }}</td>
                                    <td class="border-0" width="70%"><strong>{{ $plan->title }}</strong></td>
                                </tr>
                                <tr>
                                    <td>{{ __('Price') }}</td>
                                    <td><strong>{{ $plan->price }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection
