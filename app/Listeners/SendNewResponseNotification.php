<?php

namespace App\Listeners;

use App\Notifications\SurveyHasNewResponse;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendNewResponseNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        try {
            $survey = $event->survey;
            if ($survey->shouldNotify()) {
                $survey->user->notify(new SurveyHasNewResponse($survey));
            }
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
        }
    }
}
