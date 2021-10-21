<?php

namespace App\Models;

use App\Traits\Billable;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use Billable;

    protected $fillable = [
        'user_id',
        'plan_id',
        'payment_method',
        'stripe_id',
        'stripe_subscription_id',
        'starts_at',
        'ends_at',
        'canceled_at',
        'metadata',
        'notified_subscription_ended',
        'notified_subscription_ending_soon',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'starts_at',
        'ends_at',
        'canceled_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function plan()
    {
        return $this->belongsTo('App\Models\Plan');
    }

    public function scopeRemainingExpiredNotification($query)
    {
        return $query->where('notified_subscription_ended', '=', 0)
            ->whereNotNull('ends_at');
    }

    public function scopeSubscriptionExpiresSoon($query)
    {
        return $query->where('notified_subscription_ending_soon', '=', 0)
            ->whereNotNull('ends_at');
    }

    public function notifiedSubscriptionExpiry()
    {
        $this->notified_subscription_ended = 1;
        $this->save();
    }

    public function notifiedSubscriptionEndingSoon()
    {
        $this->notified_subscription_ending_soon = 1;
        $this->save();
    }

    public function scopeStripe($query)
    {
        return $query->where('payment_method', '=','stripe')
            ->whereNotNull('stripe_subscription_id')
            ->whereNull('canceled_at');
    }

    public function markAsCancelled()
    {
        $this->canceled_at = Carbon::now();
        $this->save();
    }

    public function scopeWithFreePlans($query)
    {
        $plans = Plan::where('price', 0)->pluck('id')->toArray();

        return $query->whereIn('plan_id', $plans);
    }
}