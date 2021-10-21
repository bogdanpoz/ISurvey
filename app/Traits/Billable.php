<?php

namespace App\Traits;

use App\Models\Plan;
use Carbon\Carbon;

trait Billable
{
    public function plan()
    {
        return $this->belongsTo('App\Models\Plan');
    }

    public function active()
    {
        return ! $this->ended();
    }

    public function canceled()
    {
        return $this->canceled_at ? Carbon::now()->gte($this->canceled_at) : false;
    }

    public function ended()
    {
        return $this->ends_at ? Carbon::now()->gte($this->ends_at) : false;
    }

    public function cancel()
    {
        $this->canceled_at = Carbon::now();

        $this->save();
    }

    public function changePlan($plan, $metadata = [])
    {
        $this->setNewPeriod($plan);
        $this->setMetadata($metadata);

        $this->plan_id = $plan->id;
        $this->canceled_at = null;

        $this->save();
    }

    public function renew()
    {
        $this->setNewPeriod();
        $this->canceled_at = null;
        $this->notified_subscription_ended = 0;
        $this->notified_subscription_ending_soon = 0;
        $this->save();
    }

    protected function setNewPeriod($plan = '')
    {
        if (empty($plan)) {
            $plan = $this->plan;
        }

        $this->starts_at = Carbon::now();
        $this->ends_at = 'monthly' == $plan->interval ? Carbon::now()->addMonth() : Carbon::now()->addMonths(12);

        return $this;
    }

    public function newSubscription($plan, $metadata = [])
    {
        $data = [
            'user_id' => auth()->user()->id,
            'plan_id' => $plan->id,
            'starts_at' => Carbon::now(),
            'ends_at' => 'monthly' == $plan->interval ? Carbon::now()->addMonth() : Carbon::now()->addMonths(12),
        ];

        $data = $data + $metadata;

        return $this->create($data);
    }

    public function isFree()
    {
        return 0 == $this->plan->price;
    }

    private function setMetadata($metadata)
    {
        if (array_key_exists('payment_method', $metadata)) {
            $this->payment_method = $metadata['payment_method'];
        }

        if (array_key_exists('stripe_id', $metadata)) {
            $this->stripe_id = $metadata['stripe_id'];
        }

        if (array_key_exists('stripe_subscription_id', $metadata)) {
            $this->stripe_subscription_id = $metadata['stripe_subscription_id'];
        }
    }

    public function hoursRemainingForExpiry()
    {
        if (Carbon::parse($this->ends_at)->lte(Carbon::now())) {
            return 0;
        }

        return Carbon::parse($this->ends_at)->diffInHours(Carbon::now());
    }

    public function scopeEnded($query)
    {
        return $query->where('ends_at', '<', now());
    }

    public function scopeCanceled($query)
    {
      return  $query->whereNotNull('canceled_at');
    }

    public function scopeActive($query)
    {
        return $query->where('ends_at', '>', now());
    }
}
