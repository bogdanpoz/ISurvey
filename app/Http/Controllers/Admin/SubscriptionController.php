<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionForm;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $query = Subscription::query();

        if ($request->input('status') && 'active' === $request->input('status')) {
            $query = $query->active();
        }

        if ($request->input('status') && 'ended' === $request->input('status')) {
            $query= $query->ended();
        }
        if ($request->input('status') && 'canceled' === $request->input('status')) {
            $query= $query->canceled();
        }

        $subscriptions = $query->get();

        return view('admin.subscription.index', compact('subscriptions'));
    }

    public function create()
    {
        $users = User::role('company')->get();

        $plans = Plan::all();

        return view('admin.subscription.create', compact('plans', 'users'));
    }

    public function store(SubscriptionForm $request)
    {
        $plan = Plan::findOrFail($request->plan_id);
        $user = User::findOrFail($request->user_id);

        if ($user->subscribed()) {
            $user->subscription->changePlan($plan);
        } else {
            Subscription::create([
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'starts_at' => $request->starts_at,
                'ends_at' => $request->ends_at,
            ]);
        }

        flash(__('Subscription added successfully.'), 'success');

        return redirect()->route('admin.subscriptions.index');
    }

    public function edit(Subscription $subscription)
    {
        $users = User::role('company')->get();

        $plans = Plan::all();

        return view('admin.subscription.edit', compact('subscription', 'plans', 'users'));
    }

    public function update(SubscriptionForm $request, Subscription $subscription)
    {
        $subscription->update($request->validated());

        flash(__('Subscription updated successfully.'), 'success');

        return redirect()->route('admin.subscriptions.index');
    }
}
