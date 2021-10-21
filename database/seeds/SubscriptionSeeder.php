<?php

use Illuminate\Database\Seeder;
use App\Models\Subscription;
use App\User;
use App\Models\Plan;
use Carbon\Carbon;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $users = User::where('role', 'company')->get();
        $plan = Plan::find(1);

        foreach($users as $user) {
            $user->subscription()->create([
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'payment_method' => 'stripe',
                'starts_at' => Carbon::now(),
                'ends_at' => 'monthly' == $plan->interval ? Carbon::now()->addMonth() : Carbon::now()->addMonths(12),
            ]);
        }
    }
}
