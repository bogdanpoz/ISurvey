<?php

namespace App\Console\Commands;

use App\Models\Subscription;
use App\Notifications\SubscriptionExpiredEmail;
use Illuminate\Console\Command;
use Notification;

class SubscriptionExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:subscription-expired';

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
        $subscriptions = Subscription::remainingExpiredNotification()
            ->get();

        foreach ($subscriptions as $key => $subscription) {
            if ($subscription->ended()) {
                Notification::route('mail', $subscription->user->email)->notify(new SubscriptionExpiredEmail($subscription));

                $subscription->notifiedSubscriptionExpiry();
            }
        }

        return true;
    }
}
