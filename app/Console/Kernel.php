<?php

namespace App\Console;

use App\Console\Commands\RenewFreeSubscription;
use App\Console\Commands\SubscriptionExpired;
use App\Console\Commands\SubscriptionExpiresSoon;
use Modules\StripeSubscription\Console\CheckStripeSubscription;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
    ];

    /**
     * Define the application's command schedule.
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(SubscriptionExpired::class)->hourly();
        $schedule->command(SubscriptionExpiresSoon::class)->hourly();

        $schedule->command(RenewFreeSubscription::class)->hourly();

        if(class_exists('Modules\StripeSubscription\Console\CheckStripeSubscription')) {
            $schedule->command(CheckStripeSubscription::class)->hourly();
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
