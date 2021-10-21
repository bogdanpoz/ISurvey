<?php

use App\User;
use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedAdminUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // seed admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@demo.com',
            'password' => Hash::make('password'),
            'plan_id' => null,
        ]);

        $admin->assignRole(['administrator', 'company']);

        $plan = Plan::find(1);
        Subscription::create([
            'user_id' => 1,
            'plan_id' => $plan->id,
            'starts_at' => Carbon::now(),
            'ends_at' => $plan->interval == 'monthly' ? Carbon::now()->addMonth() : Carbon::now()->addMonths(12),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
