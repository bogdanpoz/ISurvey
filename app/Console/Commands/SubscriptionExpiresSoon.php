<?php

namespace App\Console\Commands;

use App\Models\Subscription;
use App\Notifications\SubscriptionEndingSoonEmail;
use Illuminate\Console\Command;
use Notification;

class SubscriptionExpiresSoon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:subscription-expires-soon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes your local testing easier';

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
        $subscriptions = Subscription::subscriptionExpiresSoon()
            ->get();

        foreach ($subscriptions as $key => $subscription) {
            if($subscription->hoursRemainingForExpiry() <= 48) {
                Notification::route('mail', $subscription->user->email)->notify(new SubscriptionEndingSoonEmail($subscription));

                $subscription->notifiedSubscriptionEndingSoon();
            }
        }

        return true;
    }
}