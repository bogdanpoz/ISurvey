<?php

namespace App\Http\Controllers\Company;

use Modules\OfflineSubscription\Services\OfflinePayment;
use Modules\PaypalSubscription\Services\PaypalPayment;
use Modules\StripeSubscription\Services\StripePayment;
use App\Http\Controllers\Controller;
use App\Models\Plan;

class BillingController extends Controller
{
    public function index()
    {
        $subscription = auth()->user()->subscription()->first();

        if (empty($subscription)) {
            return redirect()->route('company.billing.plans');
        }

        return view('company.billing.index', [
            'subscription' => $subscription,
        ]);
    }

    public function plans()
    {
        return view('company.billing.pricing-plans', [
            'plans' => Plan::all(),
            'subscription' => auth()->user()->subscription,
        ]);
    }

    public function cancel()
    {
        $subscription = auth()->user()->subscription()->first();

        $paymentMethods = [
            'stripe' => StripePayment::class,
            'offline' => OfflinePayment::class,
            'paypal' => PaypalPayment::class,
        ];

        (new $paymentMethods[$subscription->payment_method]())->cancel($subscription);

        return redirect()->route('company.billing.index');
    }
}
