<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'title',
        'description',
        'code',
        'price',
        'interval',
        'stripe_plan_id',
    ];

    public static $paymentMethods = [
        'stripe',
        'offline',
        'paypal',
    ];

    public function planOptions()
    {
        return $this->hasMany('App\Models\PlanOption');
    }

    public function subscriptions()
    {
        return $this->hasMany('App\Models\Subscription');
    }

    public function isFree()
    {
        return 0 == $this->price;
    }
}
