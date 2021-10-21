@if($subscription && !$subscription->canceled() && !$subscription->isFree())
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Cancel Subscription Plan') }}</h3>
        </div>
        <div class="card-body">
            <p>{{ __('You may cancel your subscription at any time. Once your subscription has been cancelled,
                you will have the option to resume the subscription until the end of your current billing cycle.') }}
            </p>

            <form action="{{ route('company.billing.cancel') }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-danger">{{ __('Cancel Subscription') }}</button>
            </form>
        </div>
    </div>
@endif