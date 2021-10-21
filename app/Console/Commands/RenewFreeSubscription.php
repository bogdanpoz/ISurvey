<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Console\Command;

class RenewFreeSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'renew:free-subscription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes your local testing easier';

    protected $stripePayment;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $subscriptions = Subscription::withFreePlans()
            ->get();

        foreach ($subscriptions as $subscription) {
            if($subscription->ended()) {
                $subscription->renew();
            }
        }

        return true;
    }
}